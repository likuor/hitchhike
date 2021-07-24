<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function spots():BelongsTo
    {
        return $this->belongsTo(Spot::class);
    }
}
