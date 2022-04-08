<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Coupon;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class CouponController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Coupon(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('code');
            $grid->column('discount');
            $grid->column('start');
            $grid->column('end');
            $grid->column('status');
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
        return Show::make($id, new Coupon(), function (Show $show) {
            $show->field('id');
            $show->field('code');
            $show->field('discount');
            $show->field('start');
            $show->field('end');
            $show->field('status');
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
        return Form::make(new Coupon(), function (Form $form) {
            $form->display('id');
            $form->text('code');
            $form->text('discount');
            $form->text('start');
            $form->text('end');
            $form->text('status');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
