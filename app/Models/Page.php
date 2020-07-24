<?php

namespace App\Models;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasDateTimeFormatter;
    use ModelTree;
    use SoftDeletes;

    protected $orderColumn = 'order';

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
