<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'object_id',
        'object_type',
        'comment_id',
        'user_id',
        'status'
    ];

    /**
     * Comment author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
