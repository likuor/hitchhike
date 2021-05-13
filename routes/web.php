<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/', 'SpotController@index')->name('spots.index');
Route::resource('/spots', 'SpotController')->except(['index' , 'show'])->middleware('auth');
Route::resource('/spots', 'SpotController')->only(['show']);
Route::prefix('spots')->name('spots.')->group(function () {
    Route::put('/{spot}/like', 'SpotController@like')->name('like')->middleware('auth');
    Route::delete('/{spot}/like', 'SpotController@unlike')->name('unlike')->middleware('auth');
});
