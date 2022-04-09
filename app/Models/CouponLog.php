<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class CouponLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'coupon_logs';
    
}
