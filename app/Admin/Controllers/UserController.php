<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models;
use App\Admin\Renderable\MyCouponTable;

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
            $grid->column('auth');
            $grid->column('number')->sortable();
            $grid->column('email')->sortable();
            $grid->column('name')->sortable();
            $grid->column('gender');
            $grid->column('birthday');
            $grid->column('status')->switch();

            $grid->column('優惠券')->modal(function ($modal) {
                $modal->title('優惠券列表# - '.$this->number);
                return MyCouponTable::make();
            });
            $grid->column('created_at', '加入日期');
            
            $grid->disableCreateButton();
            $grid->disableActions();
            $grid->disableToolbar();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->expand();
                $filter->panel();
                
                $filter->equal('number')->width(3);
                $filter->equal('email')->width(3);
                $filter->equal('status')->select([0 => '停用', 1 => '啟用'])->width(2);
        
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
        return Form::make(new User(), function (Form $form) {
            $form->display('number');
            $form->text('name');
            $form->text('email');
            $form->radio('gender')->options(['男' => '男', '女' => '女']);
            $form->date('birthday');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
