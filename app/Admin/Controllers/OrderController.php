<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models;
use Dcat\Admin\Widgets\Table;

class OrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Order(['user']), function (Grid $grid) {
            $grid->column('number')->sortable();
            $grid->column('vendor_name')->sortable();
            $grid->column('product_name')->sortable();
            $grid->column('qty');
            $grid->column('total');
            $grid->column('user.name', '購買會員');
            $grid->column('last_5');
            $grid->column('upload', '匯款照片')->image('https://leisure-area-tw.s3-ap-northeast-1.amazonaws.com', 60);
            $grid->column('paid_at')->display(function(){
                return $this->paid_at ? date('Y-m-d H:i:s', strtotime($this->paid_at)): null;
            });
            $grid->column('receiver')->display(function(){
                return '展開';
            })->expand(function(){
                $table = ['收件人', 'email', '手機號碼', '地址'];
                $data = json_decode($this->receiver);

                $receiver[] = [
                    'name' => $data->name,
                    'email' => $data->email,
                    'phone' => substr_replace(decrypt($data->phone), '***', 4, 3),
                    'address' => $data->zip.' '.$data->country.$data->district.$data->address,
                ];
                return new Table($table, $receiver);
            });
            $grid->column('status')->select([0 => '未付款', 1 => '待確認', 2 => '已付款', 3 => '已完成', 4 => '已取消']);
            $grid->column('deliver_type')->select([0 => '未出貨', 1 => '出貨中', 2 => '已完成', 3 => '已取消']);
            $grid->column('deliver_date');
        
            $grid->disableCreateButton();
            $grid->disableActions();
            $grid->disableToolbar();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->expand();
                $filter->panel();
                
                $filter->equal('number')->width(3);
                $filter->equal('user_id')->select(Models\User::all()->sortByDesc('id')->pluck('email', 'id'))->width(3);
                $filter->equal('status')->select([0 => '未付款', 1 => '待確認', 2 => '已付款', 3 => '已完成', 4 => '已取消'])->width(2);
                $filter->equal('deliver_type')->select([0 => '未出貨', 1 => '出貨中', 2 => '已完成', 3 => '已取消'])->width(2);
        
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Order(), function (Form $form) {
            $form->hidden('status');
            $form->hidden('deliver_type');
            $form->hidden('deliver_date');
            $form->hidden('coupon_id');
            $form->hidden('number');
            $form->hidden('promotion_id');
            $form->hidden('id');

            $form->saving(function (Form $form){
                
                if($form->status == 4)
                {
                    $form->deliver_type = 3;
                    if($form->coupon_id)
                    {
                        $my_coupon = Models\MyCoupon::where('order_number', $form->number)->first();
                        $my_coupon->used = 0;
                        $my_coupon->use_date = null;
                        $my_coupon->order_number = null;
                        $my_coupon->save();
                    }
                    if($form->promotion_id)
                    {
                        Models\PromotionLog::where('order_id', $form->id)->delete();
                    }
                }
                    
                if($form->deliver_type == 1 || $form->deliver_type == 2)
                    $form->deliver_date = date('Y-m-d H:i:s');
            });
        });
    }
}
