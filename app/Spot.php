<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function likes():BelongsToMany
    {
        return $this->belongsToMany('App\User','likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    public function comments():Hasmany
    {
        return $this->hasMany('App\Comment');
    }
}
