<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spot extends Model
{
    protected $fillable = [
        'title',
        'body',
        'latitude',
        'longitude',
        'prefecture',
        'city',
        'street',
        'user_id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes():BelongsToMany
    {
        return $this->belongsToMany(User::class,'likes')->withTimestamps();
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

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getSpotImages()
    {
        return $this->hasMany(Spotimage::class);
    }
}
