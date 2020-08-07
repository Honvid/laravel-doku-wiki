<?php

namespace App\Repositories;

use App\Models\Book as Model;
use Dcat\Admin\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookRepository extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function fetch(Request $request)
    {
        $category = $request->input('category_id', 0);
        $author   = $request->input('author', 0);

        $books = Model::with(['authors']);
        if (!empty($author)) {
            $books->whereHas('authors', function (Builder $query) use ($author) {
                $query->where('author_id', $author);

                return $query->select('author_id', 'name');
            });
        }
        if (!empty($category)) {
            $books->whereHas('categories', function (Builder $query) use ($category) {
                if (!empty($category)) {
                    $query->where('category_id', $category);
                }

                return $query->select('category_id', 'name');
            });
        }
        return $books->paginate(null, ['id', 'name', 'created_at']);
    }
}
