<?php

namespace App\Admin\Repositories;

use App\Models\Promotion as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Promotion extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
