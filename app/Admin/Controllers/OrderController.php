<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class OrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Order(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('number');
            $grid->column('product_id');
            $grid->column('product_name');
            $grid->column('qty');
            $grid->column('amount');
            $grid->column('vendor_id');
            $grid->column('vendor_name');
            $grid->column('user_id');
            $grid->column('bank_name');
            $grid->column('bank_code');
            $grid->column('status');
            $grid->column('deliver_type');
            $grid->column('receiver');
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
        return Show::make($id, new Order(), function (Show $show) {
            $show->field('id');
            $show->field('number');
            $show->field('product_id');
            $show->field('product_name');
            $show->field('qty');
            $show->field('amount');
            $show->field('vendor_id');
            $show->field('vendor_name');
            $show->field('user_id');
            $show->field('bank_name');
            $show->field('bank_code');
            $show->field('status');
            $show->field('deliver_type');
            $show->field('receiver');
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
