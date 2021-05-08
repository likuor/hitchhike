<?php

namespace App\Http\Controllers;

use App\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index()
    {
        $spots = Spot::all()->sortByDesc('created_at');


        return view('spots.index', ['spots' => $spots]);
    }
}
