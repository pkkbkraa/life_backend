<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Dcat\Admin\Traits\HasDateTimeFormatter;

class Category extends Model implements Sortable
{
	use HasDateTimeFormatter;
    use SortableTrait;

    protected $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
}
