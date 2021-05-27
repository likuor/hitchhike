<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function spots():BelongsTo
    {
        return $this->belongsTo('App\Spot');
    }
}
