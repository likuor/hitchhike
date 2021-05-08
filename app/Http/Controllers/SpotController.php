<?php

namespace App\Http\Controllers;

use App\Spot;
use App\Http\Requests\SpotRequest;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index()
    {
        $spots = Spot::all()->sortByDesc('created_at');


        return view('spots.index', ['spots' => $spots]);
    }

    public function create()
    {
        // return view('spots.create');
        $prefectures = config('prefecture');
        return view('spots.create')->with(['prefectures' => $prefectures]);
    }

    public function store(SpotRequest $request, Spot $spot)
    {
        $spot->title = $request->title;
        $spot->body = $request->body;
        $spot->prefecture = $request->prefecture;
        $spot->city = $request->city;
        $spot->street = $request->street;
        $spot->image_file_name = $request->image_file_name;
        $spot->user_id = $request->user()->id;
        $spot->save();
        return redirect()->route('spots.index');
    }
}
