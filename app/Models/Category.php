<?php

namespace App\Models;

use App\Models\Traits\ClassNameTrait;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasDateTimeFormatter;
    use ModelTree;
    use SoftDeletes;
    use ClassNameTrait;

    /**
     * books in this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories');
    }
}
