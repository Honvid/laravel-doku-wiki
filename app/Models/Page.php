<?php

namespace App\Models;

use App\Models\Traits\ClassNameTrait;
use App\Models\Traits\UpdateBy;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Base
{
    use HasDateTimeFormatter, ModelTree, SoftDeletes, ClassNameTrait, UpdateBy;

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

    /**
     * Page's authors
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'last_modify_by');
    }
}
