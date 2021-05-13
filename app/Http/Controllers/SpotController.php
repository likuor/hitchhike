<?php

namespace App\Http\Controllers;

use App\Spot;
use App\Http\Requests\SpotRequest;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Spot::class, 'spot');
    }

    public function index()
    {
        $spots = Spot::orderBy('created_at', 'desc')->paginate(3);

        return view('spots.index', ['spots' => $spots]);
    }

    public function create()
    {
        // return view('spots.create');
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
        $spot->save();
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
        $spot->fill($request->all())->save();
        return redirect()->route('spots.index');
    }

    public function destroy(Spot $spot)
    {
        $spot->delete();
        return redirect()->route('spots.index');
    }

    public function show(Spot $spot)
    {
        return view('spots.show', ['spot' => $spot]);
    }

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
