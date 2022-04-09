<?php

use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Form;
use Dcat\Admin\Grid\Filter;
use Dcat\Admin\Show;

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Admin::script(
    <<<JS

    $(document).ready(function () {
        const timeout = 1800000;  // 900000 ms = 15 minutes
        var idleTimer = null;
        $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
            clearTimeout(idleTimer);

            idleTimer = setTimeout(function () {
                $('.icon-power').trigger('click');
            }, timeout);
        });
        $("body").trigger("mousemove");
    });
JS            
);

Grid::resolving(function (Grid $grid) {
    if(!Request()->is('admin/category'))
    {
        $grid->showQuickEditButton();
    }
    $grid->enableDialogCreate();
    $grid->disableEditButton();
    $grid->disableViewButton();
    $grid->disableRowSelector();
    $grid->disableBatchActions();
    $grid->setDialogFormDimensions('60%', '95%');
    $grid->toolsWithOutline(false);
});

Form::resolving(function (Form $form) {
    $form->disableEditingCheck();
    $form->disableCreatingCheck();
    $form->disableViewCheck();

    $form->tools(function (Form\Tools $tools) {
         $tools->disableDelete();
         $tools->disableView();
    });

});
