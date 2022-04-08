<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Vendor;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class VendorController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Vendor(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('email');
            $grid->column('shop_no');
            $grid->column('hash');
            $grid->column('key');
            $grid->column('bank_name');
            $grid->column('bank_code');
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
        return Show::make($id, new Vendor(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('email');
            $show->field('shop_no');
            $show->field('hash');
            $show->field('key');
            $show->field('bank_name');
            $show->field('bank_code');
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
        return Form::make(new Vendor(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('email');
            $form->text('shop_no');
            $form->text('hash');
            $form->text('key');
            $form->text('bank_name');
            $form->text('bank_code');
            $form->text('status');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
