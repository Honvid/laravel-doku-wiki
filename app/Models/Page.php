<?php

namespace App\Models;

use App\Models\Traits\ClassNameTrait;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasDateTimeFormatter;
    use ModelTree;
    use SoftDeletes;
    use ClassNameTrait;

    protected $orderColumn = 'order';

    protected $guarded = ['id'];

    /**
     * this page belongs to book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Page's authors
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'page_authors');
    }
}
