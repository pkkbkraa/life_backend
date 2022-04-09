<?php

namespace App\Admin\Repositories;

use App\Models\CouponLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class CouponLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
