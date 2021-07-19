<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpotImage extends Model
{
    protected $fillable = ['spot_id', 'path'];

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }
}
