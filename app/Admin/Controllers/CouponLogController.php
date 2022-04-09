<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\CouponLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class CouponLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new CouponLog(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('coupon_id');
            $grid->column('coupon_name');
            $grid->column('order_id');
            $grid->column('order_number');
            $grid->column('product_name');
            $grid->column('amount');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new CouponLog(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('coupon_id');
            $show->field('coupon_name');
            $show->field('order_id');
            $show->field('order_number');
            $show->field('product_name');
            $show->field('amount');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new CouponLog(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('coupon_id');
            $form->text('coupon_name');
            $form->text('order_id');
            $form->text('order_number');
            $form->text('product_name');
            $form->text('amount');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
