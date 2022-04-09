<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Coupon;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models;

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
            $grid->column('name')->sortable();
            $grid->column('discount')->sortable();
            $grid->column('amount')->sortable();
            $grid->column('使用期限')->display(function(){
                return $this->start.' - '.$this->end;
            });
            $grid->column('status')->switch();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                
                $filter->equal('name')->width(3);
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
        return Form::make(new Coupon(), function (Form $form) {
            $form->text('name')->required();
            $form->decimal('discount')->required();
            $form->decimal('amount')->required();
            $form->date('start')->required();
            $form->date('end')->required();
            $form->switch('status')->default(1);
        });
    }
}
