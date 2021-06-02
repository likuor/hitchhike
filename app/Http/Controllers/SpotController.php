<?php

namespace App\Http\Controllers;

use App\Spot;
use App\Comment;
use App\SpotImage;
use App\Http\Requests\SpotRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SpotController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Spot::class, 'spot');
    }

    public function index()
    {
        // $spot_images = SpotImage::orderBy('created_at', 'desc');
        // var_dump($spot_images);

        $spots = Spot::orderBy('created_at', 'desc')
        ->when(request('keyword') ?? null, function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('prefecture', 'LIKE', "%{$keyword}%")->orWhere('city','LIKE',"%{$keyword}%");
            });
        })
        ->paginate(10);

        return view('spots.index', ['spots' => $spots]);
    }

    public function create()
    {
        $spot = new spot();
        $prefectures = config('prefecture');
        return view('spots.create')->with([
            'prefectures' => $prefectures,
            'spot' => $spot,
        ]);
    }

    public function store(SpotRequest $request, Spot $spot)
    {
        $spot->fill($request->all());
        $spot->user_id = $request->user()->id;
        // if(request('image_file_name')){
        //     $filePath = $request->image_file_name->store('spots_images','public');
        //     $spot->image_file_name = str_replace('spots_images/public/',time(), $filePath);
        // }
        $spot = Spot::create([
            'title'=> $request->title,
            'body'=> $request->body ,
            'prefecture'=> $request->prefecture,
            'city'=> $request->city,
            'street'=> $request->street ,
            'user_id'=> $spot->user_id
        ]);

        // 商品画像の保存
        if(request('image_file_name')){
            foreach ($request->image_file_name as $index=> $e) {
                $ext = $e['photo']->guessExtension();
                $spot->spot_id = $request->id;

                $filePath = $request->image_file_name[$index]['photo']->store('spots_images','public');
                // $filename = str_replace('spots_images/',time(), "{$filePath}_{$index}.{$ext}");
                $path = $e['photo']->storeAs('', $filePath);
                $spot->getSpotImages()->create(['path'=> $path]);
            }
        } else {
            $spot->spot_id = $request->id;
            $spot->getSpotImages()->create();
        }
        // $spot->save();
        return redirect()->route('spots.index');
    }

    public function edit(Spot $spot)
    {
        $prefectures = config('prefecture');
        return view('spots.edit')->with([
            'prefectures' => $prefectures,
            'spot' => $spot,
        ]);
    }

    public function update(SpotRequest $request, Spot $spot)
    {
        if (request('image_file_name')) {

            if ( $spot->image_file_name !== 'spots_images/noimage.png' ) {
                Storage::delete('public/' . $spot->image_file_name );
            }
            $spot->fill($request->all());
            $filePath = $request->image_file_name->store('spots_images','public');
            $spot->image_file_name = str_replace('spots_images/public/',time(), $filePath);

        } else {
            $spot->fill($request->all());
        }

        $spot->save();
        return redirect()->route('spots.index');
    }

    public function destroy(Spot $spot)
    {
        $spot->delete();
        if ( $spot->image_file_name !== 'spots_images/noimage.png' ) {
            Storage::delete('public/' . $spot->image_file_name );
        }
        return redirect()->route('spots.index');
    }

    public function show(Spot $spot , Comment $comment)
    {
        $comments = Comment::all()->sortByDesc('created_at');
        $count_comments = '('.$comments->where('spot_id' , $spot->id)->count().'件)';
        return view('spots.show', [
            'spot' => $spot,
            'comments' => $comments,
            'count_comments' => $count_comments,
        ]);
    }
}
