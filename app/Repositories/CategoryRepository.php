<?php

namespace App\Repositories;

use App\Models\Category as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class CategoryRepository extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
