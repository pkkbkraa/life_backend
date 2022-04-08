<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('auth');
            $grid->column('auth_id');
            $grid->column('email');
            $grid->column('name');
            $grid->column('number');
            $grid->column('gender');
            $grid->column('birthday');
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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('auth');
            $show->field('auth_id');
            $show->field('email');
            $show->field('name');
            $show->field('number');
            $show->field('gender');
            $show->field('birthday');
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
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('auth');
            $form->text('auth_id');
            $form->text('email');
            $form->text('name');
            $form->text('number');
            $form->text('gender');
            $form->text('birthday');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
