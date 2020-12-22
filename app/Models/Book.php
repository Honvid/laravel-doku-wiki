<?php

namespace App\Models;

use App\Models\Traits\ClassNameTrait;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Base
{
    use HasDateTimeFormatter, ClassNameTrait, SoftDeletes;

    protected $perPage = 1;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'deleted_at',
    ];

    /**
     * Book's pages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Book's authors
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    /**
     * Book's categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }
}
