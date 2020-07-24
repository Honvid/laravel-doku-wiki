<?php

namespace App\Repositories;

use App\Models\Author as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class AuthorRepository extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
