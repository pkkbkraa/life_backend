<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Promotion;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class PromotionController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Promotion(), function (Grid $grid) {
            $grid->column('code')->sortable();
            $grid->column('discount')->sortable();
            $grid->column('amount');
            $grid->column('使用期限')->display(function(){
                return $this->start.' - '.$this->end;
            });
            $grid->column('status')->switch();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                
                $filter->equal('code')->width(3);
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
        $code = $this->generateRandomString();
        return Form::make(new Promotion(), function (Form $form) use ($code) {
            $form->hidden('code');
            $form->decimal('discount');
            $form->decimal('amount');
            $form->date('start');
            $form->date('end');
            $form->switch('status');

            $form->saving(function (Form $form) use ($code) {
                $form->code = $code;
            });
        });
    }

    private function generateRandomString($length = 10) {
        $characters = '23456789ABCDEFGHJKMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
