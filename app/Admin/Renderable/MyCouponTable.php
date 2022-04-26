<?php

namespace App\Admin\Renderable;

use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;
use App\Admin\Repositories\MyCoupon;
use App\Models;

class MyCouponTable extends LazyRenderable
{
    public function grid(): Grid
    {
        $id = $this->key;

        return Grid::make(new MyCoupon(), function (Grid $grid) use ($id) {
            $grid->model()->where('user_id', $id);
            $grid->column('coupon_name', '優惠券名稱');
            $grid->column('discount', '折扣');
            $grid->column('amount', '金額限制');
            $grid->column('有效期限')->display(function(){
                return $this->start.' - '.$this->end;
            });
            $grid->column('used', '使用狀態')->using([0 => '未使用', 1 => '已使用']);
            $grid->column('use_date', '使用日期');
            $grid->column('order_number', '訂單編號');

            $grid->paginate(20);
            $grid->disableActions();
            $grid->disableBatchActions();
            $grid->disableBatchDelete();
            $grid->disableToolbar();
            $grid->disableRowSelector();
        });
    }
}
