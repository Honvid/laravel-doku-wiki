<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasDateTimeFormatter;

    protected $hidden = ['created_at', 'updated_at', 'level', 'deleted_at', 'parent_id'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories');
    }
}
