<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Spot;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $comment->fill($request->validated());
        if(request('image')){
            $filePath = $request->image->store('comments_images','public');
            $comment->image = str_replace('comments_images/public/',time(), $filePath);
        }
        $comment->user_id = $request->user()->id;
        $comment->spot_id = $request->spot_id;

        $comment->save();
        return redirect()->route('spots.show' , ['spot' => $request->spot_id]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        if ( $comment->image ) {
            Storage::delete('public/' . $comment->image );
        }

        return redirect()->route('spots.show' , ['spot' => $comment->spot_id]);
    }
}
