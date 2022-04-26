<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class MyCoupon extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'my_coupons';
    
}
