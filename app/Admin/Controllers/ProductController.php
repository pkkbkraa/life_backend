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
            $grid->model()->orderBy('id','desc');
            $grid->column('background')->image('https://leisure-area-tw.s3-ap-northeast-1.amazonaws.com', 60);
            $grid->column('vendor_name')->sortable();
            $grid->column('category_name')->sortable();
            $grid->column('name');
            $grid->column('price');
            $grid->column('offer');
            $grid->column('delivery_fee');
            $grid->column('status')->switch();
            $grid->column('hightlight')->switch();
        
            $grid->setDialogFormDimensions('80%', '95%');
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                
                $filter->equal('category_id')->select(Models\Category::all()->sortByDesc('id')->pluck('name', 'id'))->width(3);
                $filter->equal('name')->width(3);
                $filter->equal('status')->select([0 => '下架', 1 => '上架'])->width(2);
        
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
            $form->decimal('price')->required();
            $form->decimal('offer');
            $form->decimal('delivery_fee')->required();
            $form->decimal('free_delivery')->help('此欄位設定為0時，即為此商品一律免運費');
            $form->image('background', '背景圖上傳')->autoUpload()->retainable()->required()->rules('image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=2048,max_height=2048')->compress([
                'width' => 870,
                'height' => 952,
                'quality' => 90,
                'allowMagnify' => true, // 是否允許放大.
                'crop' => true, // 是否允許裁切
                'preserveHeaders' => true, // 是否保留頭部meta資訊。
                'noCompressIfLarger' => false, // 如果發現壓縮後文件大小比原來還大，則使用原來圖片 此屬性可能會影響圖片自動糾正功能
                'compressSize' => 0 // 單位字節，如果圖片大小小於此值，不會採用壓縮。
            ])
            ->help('圖片尺寸為 870 X 952 像素，系統會自動裁切，如有失真請先將圖片尺寸調整好後再上傳');
            $form->multipleImage('images', '商品圖片上傳')->autoUpload()->retainable()->sortable()->required()->rules('image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=2048,max_height=2048')->compress([
                'width' => 750,
                'height' => 673,
                'quality' => 90,
                'allowMagnify' => true, // 是否允許放大.
                'crop' => true, // 是否允許裁切
                'preserveHeaders' => true, // 是否保留頭部meta資訊。
                'noCompressIfLarger' => false, // 如果發現壓縮後文件大小比原來還大，則使用原來圖片 此屬性可能會影響圖片自動糾正功能
                'compressSize' => 0 // 單位字節，如果圖片大小小於此值，不會採用壓縮。
            ])->saving(function($v){
                return json_encode($v);
            })
            ->help('圖片尺寸為 750 X 673 像素，系統會自動裁切，如有失真請先將圖片尺寸調整好後再上傳');
            $form->textarea('compendium')->required();
            $form->textarea('spec')->required();
            $form->editor('detail')->required();
            $form->table('meta', 'SEO meta', function ($table) {
                $table->text('tag');
                $table->text('value', '值');
            })->saving(function ($v) {
                return json_encode($v);
            });
            $form->hidden('number');
            $form->hidden('category_name');
            $form->hidden('vendor_name');
            $form->hidden('status');
            $form->hidden('hightlight');

            $form->saving(function (Form $form) use ($number) {
                
                if($form->category_id)
                {
                    $category = Models\Category::find($form->category_id);
                    $form->category_name = $category->name;
                }
                
                if($form->vendor_id)
                {
                    $vendor = Models\Vendor::find($form->vendor_id);
                    $form->vendor_name = $vendor->name;
                    if ($form->isCreating())
                    {
                        $form->number = $vendor->code.$number;
                    }
                }
            });

            $form->saved(function (Form $form, $result) {
                $category = Models\Category::find($form->model()->category_id);
                $category_name = $category->name ?? null;
                $vendor = Models\Vendor::find($form->model()->vendor_id);
                $vendor_name = $vendor->name ?? null;

                $form->model()->update([
                    'category_name' => $category_name,
                    'vendor_name' => $vendor_name,
                ]);
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
