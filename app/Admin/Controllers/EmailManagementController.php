<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\EmailManagement;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class EmailManagementController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new EmailManagement);
        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->select('type', '類別', [1 => '給會員', 2 => '給管理者']);
        });

        $grid->type('類別')->using([1 => '給會員', 2 => '給管理者']);
        $grid->template_name('樣版名稱');
        $grid->subject('主旨');
        $grid->body('內容')->display(function(){
            return '展開';
        })
        ->expand(function(){
            return nl2br($this->body);
        })->width(600);
        $grid->sms('簡訊內容')->display(function($sms){
            return nl2br($sms);
        })->width(300);
        
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
        });
        $grid->filter(function($filter){

            $filter->disableIdFilter();
        
            $filter->like('subject', '主旨');
            $filter->like('template_name', '樣版名稱');
        
        });
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new EmailManagement(), function (Form $form) {
            $form->hidden('id');
            $form->radio('type', '類別')->options([1 => '給會員', 2 => '給管理者'])->required()->when(2, function(Form $form){
    
                $form->text('manager_mail', '管理者Email');
            });
            $form->text('template_name', '樣版名稱')->required();
            $form->text('subject', '主旨')->required();
            $form->editor('body', '內容')->required();
            $form->textarea('sms', '簡訊內容');
        });
    }
}
