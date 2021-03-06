<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasDateTimeFormatter;
	
    protected $fillable = [
        'category_name',
        'vendor_name',
    ];
    public function getImagesAttribute($images)
    {
        return json_decode($images, true);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
