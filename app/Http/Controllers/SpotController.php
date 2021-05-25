<?php

namespace App\Http\Controllers;

use InterventionImage;
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
        if(request('image_file_name')){
            $filePath = $request->file('image_file_name');
            // $name = $filePath->getClientOriginalName();
            //アスペクト比を維持、画像サイズを横幅1080pxにして保存する。
            InterventionImage::make($filePath)->resize(1080, null, function ($constraint) {$constraint->aspectRatio();})->save(public_path('/spots_images/public/' . $filePath ) );
        }

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
        $spot->fill($request->all());
        if(request('image_file_name')){
            $filePath = $request->image_file_name->store('spots_images','public');
            $spot->image_file_name = str_replace('spots_images/public/',time(), $filePath);
        }
        $spot->save();
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
}
