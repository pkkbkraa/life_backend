<?php

namespace App\Admin\Repositories;

use App\Models\MyCoupon as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class MyCoupon extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
