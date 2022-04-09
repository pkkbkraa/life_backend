<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Product;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models;

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
            $grid->column('category_name')->sortable();
            $grid->column('number');
            $grid->column('name');
            $grid->column('spec');
            $grid->column('detail');
            $grid->column('price');
            $grid->column('images');
            $grid->column('vendor_id');
            $grid->column('status');;
        
            $grid->setDialogFormDimensions('80%', '95%');
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                
                $filter->equal('category_id')->select(Models\Category::all()->sortByDesc('id')->pluck('name', 'id'))->width(3);
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
        $number = $this->generateRandomString();
        return Form::make(new Product(), function (Form $form) use ($number) {
            $form->select('category_id')->options(Models\Category::all()->sortByDesc('id')->pluck('name', 'id'));
            $form->select('vendor_id')->options(Models\Vendor::all()->sortByDesc('id')->pluck('name', 'id'))->required();
            $form->text('name')->required();
            $form->multipleImage('images', '圖片上傳')->autoUpload()->retainable()->rules('image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=1920,max_height=1000')->saving(function($v){
                return json_encode($v);
            });
            $form->editor('spec')->required();
            $form->editor('detail')->required();
            $form->decimal('price')->required();

            $form->saving(function (Form $form) use ($number) {
                $category = Models\Category::find($form->category_id);
                $vendor = Models\Vendor::find($form->vendor_id);
                $form->category_name = $category->name;
                $form->number = $vendor->code.$number;
            });
        });
    }

    private function generateRandomString($length = 5) {
        $characters = '23456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
