<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\PromotionLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class PromotionLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new PromotionLog(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('promotion_id');
            $grid->column('code');
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
        return Show::make($id, new PromotionLog(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('promotion_id');
            $show->field('code');
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
        return Form::make(new PromotionLog(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('promotion_id');
            $form->text('code');
            $form->text('order_id');
            $form->text('order_number');
            $form->text('product_name');
            $form->text('amount');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
