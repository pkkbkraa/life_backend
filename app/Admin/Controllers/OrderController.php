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
            $grid->column('amount');
            $grid->column('user.name', '購買會員');
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
            $grid->column('status')->select([0 => '未付款', 1 => '已付款', 2 => '已完成', 3 => '已取消']);
            $grid->column('deliver_type')->select([0 => '未出貨', 1 => '出貨中', 2 => '已完成']);
            $grid->column('deliver_date');
        
            $grid->disableCreateButton();
            $grid->disableActions();
            $grid->disableToolbar();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->expand();
                $filter->panel();
                
                $filter->equal('number')->width(3);
                $filter->equal('user_id')->select(Models\User::all()->sortByDesc('id')->pluck('email', 'id'))->width(3);
                $filter->equal('status')->select([0 => '未付款', 1 => '已付款', 2 => '已完成', 3 => '已取消'])->width(2);
                $filter->equal('deliver_type')->select([0 => '未出貨', 1 => '出貨中', 2 => '已完成'])->width(2);
        
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
            $form->display('id');
            $form->text('number');
            $form->text('product_id');
            $form->text('product_name');
            $form->text('qty');
            $form->text('amount');
            $form->text('vendor_id');
            $form->text('vendor_name');
            $form->text('user_id');
            $form->text('bank_name');
            $form->text('bank_code');
            $form->text('status');
            $form->text('deliver_type');
            $form->text('receiver');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
