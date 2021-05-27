<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Spot;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function create(Spot $spot)
    {
        $comment = new Comment();
        $spot = $spot;

        return view('comments.create', [
            'comment' => $comment,
            'spot' => $spot
        ]);
    }

    public function store(CommentRequest $request, Comment $comment , Spot $spot_id)
    {
        $comment->fill($request->all());
        $comment->user_id = $request->user()->id;
        $comment->spot_id = $request->spot_id;

        $comment->save();
        return redirect()->route('spots.show' , ['spot' => $request->spot_id]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('spots.show' , ['spot' => $comment->spot_id]);
    }
}
