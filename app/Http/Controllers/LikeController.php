<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Http\Requests\SpotRequest;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, Spot $spot)
    {
        $spot->likes()->detach($request->user()->id);
        $spot->likes()->attach($request->user()->id);

        return [
            'id' => $spot->id,
            'countLikes' => $spot->count_likes,
        ];
    }

    public function unlike(Request $request, Spot $spot)
    {
        $spot->likes()->detach($request->user()->id);

        return [
            'id' => $spot->id,
            'countLikes' => $spot->count_likes,
        ];
    }
}
