<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Product;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProductController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Product(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('number');
            $grid->column('name');
            $grid->column('spec');
            $grid->column('detail');
            $grid->column('price');
            $grid->column('images');
            $grid->column('vendor_id');
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
        return Show::make($id, new Product(), function (Show $show) {
            $show->field('id');
            $show->field('number');
            $show->field('name');
            $show->field('spec');
            $show->field('detail');
            $show->field('price');
            $show->field('images');
            $show->field('vendor_id');
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
        return Form::make(new Product(), function (Form $form) {
            $form->display('id');
            $form->text('number');
            $form->text('name');
            $form->text('spec');
            $form->text('detail');
            $form->text('price');
            $form->text('images');
            $form->text('vendor_id');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
