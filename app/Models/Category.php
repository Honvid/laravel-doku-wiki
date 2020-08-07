<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasDateTimeFormatter;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories');
    }
}
