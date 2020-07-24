<?php

namespace App\Repositories;

use App\Models\Book as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class BookRepository extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
