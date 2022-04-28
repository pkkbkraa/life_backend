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
            $grid->column('name')->sortable();
            $grid->column('email')->sortable();
            $grid->column('status')->switch();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->disableDeleteButton();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                
                $filter->equal('name')->width(3);
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
        $code = $this->generateRandomString();
        return Form::make(new Vendor(), function (Form $form) use ($code) {
            $form->text('name')->required();
            $form->text('email')->required();
            $form->text('bank_name');
            $form->text('bank_code');
            $form->text('bank_account');
            $form->text('shop_no');
            $form->text('hash');
            $form->text('key');
            $form->switch('status')->default(1);
            $form->hidden('code');
        
            $form->saving(function (Form $form) use ($code) {
                $form->code = $code;
            });
        });
    }

    private function generateRandomString($length = 2) {
        $characters = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
