<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function getAuthorAttribute($value)
    {
        return explode(',', $value);
    }

    public function setAuthorAttribute($value)
    {
        $this->attributes['author'] = join(',', $value);
    }

    public function getAuthorsAttribute($value)
    {
        return $value;
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
