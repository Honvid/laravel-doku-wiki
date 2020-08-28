<?php

namespace App\Models;

use App\Models\Traits\ClassNameTrait;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;
    use ClassNameTrait;

    protected $perPage = 1;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'deleted_at',
    ];

    /**
     * Book's pages
     *
     * @return void
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Book's authors
     *
     * @return void
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    /**
     * Book's categories
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }
}
