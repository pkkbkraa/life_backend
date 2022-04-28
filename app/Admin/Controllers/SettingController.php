<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Setting;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Admin\Forms\SettingForm;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Content;

class SettingController extends AdminController
{
    public function index(Content $content)
    {
        return $content
            ->header('系統參數設定')
            ->body(new Card(new SettingForm()));
    }
}
