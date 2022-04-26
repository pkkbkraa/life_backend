<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Banner;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models;

class BannerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Banner(), function (Grid $grid) {

            $cateogry = Models\Category::all()->sortByDesc('id')->pluck('name', 'id')->toArray();
            $cateogry[0] = '首頁';
            ksort($cateogry);
            $grid->column('圖片')->display(function () {

                return $this->images ?: $this->image;
            
            })->image('https://leisure-area-tw.s3-ap-northeast-1.amazonaws.com', 60);
            $grid->column('link')->using($cateogry);
            $grid->column('status')->switch();
            $grid->column('created_at')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Banner(), function (Form $form) {

            $cateogry = Models\Category::all()->sortByDesc('id')->pluck('name', 'id')->toArray();
            $cateogry[0] = '首頁';
            ksort($cateogry);
            $form->select('link')->options($cateogry);
            $form->multipleImage('images', '圖片上傳')->autoUpload()->retainable()->sortable()->rules('image|mimes:jpg,png,jpeg,gif,svg,webp')->compress([
                'width' => 1920,
                'height' => 837,
                'quality' => 90,
                'allowMagnify' => true, // 是否允許放大.
                'crop' => true, // 是否允許裁切
                'preserveHeaders' => true, // 是否保留頭部meta資訊。
                'noCompressIfLarger' => false, // 如果發現壓縮後文件大小比原來還大，則使用原來圖片 此屬性可能會影響圖片自動糾正功能
                'compressSize' => 0 // 單位字節，如果圖片大小小於此值，不會採用壓縮。
            ])->saving(function($v){
                return json_encode($v);
            })
            ->help('圖片尺寸為 1920 X 837 像素，系統會自動裁切，如有失真請先將圖片尺寸調整好後再上傳');
            $form->switch('status')->default(1);
        });
    }
}
