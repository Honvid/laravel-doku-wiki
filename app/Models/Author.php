<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'birthday', 'deleted_at'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors');
    }
}
