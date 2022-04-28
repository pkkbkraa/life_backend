<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use App\Models\Setting;

class SettingForm extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        foreach($input as $k => $v)
        {
            Setting::where('slug', $k)->update(['value' => $v]);
        }
        return $this
            ->response()
            ->success('系統參數更新成功！')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $setting = Setting::all()->pluck('value', 'slug');
        $this->text('site_title', '網站標題')
            ->default($setting['site_title']);
        $this->image('site_logo', 'LOGO')
            ->autoUpload()
            ->uniqueName()
            ->default($setting['site_logo']);
        $this->image('site_logo_mini', 'LOGO縮圖')
            ->autoUpload()
            ->uniqueName()
            ->default($setting['site_logo_mini']);
        $this->table('meta', 'SEO meta', function ($table) {
            $table->text('tag');
            $table->text('value');
        })->saving(function ($v) {
            return json_encode($v);
        })->default($setting['meta']);
    }
}
