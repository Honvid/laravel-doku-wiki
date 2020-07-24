<?php

namespace App\Repositories;

use App\Models\Page as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class PageRepository extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
