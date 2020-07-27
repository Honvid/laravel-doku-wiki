<?php

namespace App\Repositories;

use App\Models\Comment as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class CommentRepository extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
