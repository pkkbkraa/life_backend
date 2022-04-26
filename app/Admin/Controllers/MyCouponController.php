<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\MyCoupon;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class MyCouponController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new MyCoupon(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('coupon_name');
            $grid->column('start');
            $grid->column('end');
            $grid->column('used');
            $grid->column('use_date');
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
        return Show::make($id, new MyCoupon(), function (Show $show) {
            $show->field('id');
            $show->field('coupon_id');
            $show->field('coupon_name');
            $show->field('user_id');
            $show->field('start');
            $show->field('end');
            $show->field('used');
            $show->field('use_date');
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
        return Form::make(new MyCoupon(), function (Form $form) {
            $form->display('id');
            $form->text('coupon_id');
            $form->text('coupon_name');
            $form->text('user_id');
            $form->text('start');
            $form->text('end');
            $form->text('used');
            $form->text('use_date');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
