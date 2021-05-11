<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spot extends Model
{
    protected $fillable = [
        'title',
        'body',
        'prefecture',
        'city',
        'street',
        'image_file_name',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
