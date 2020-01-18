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

use Lynerx\Series;

Route::get('/', function (\Lynerx\Series $series) {
        $series = Series::all();
     return view('welcome')->withSeries($series);
 })->name('homepage');
Route::get('/series', function (\Lynerx\Series $series ) {
    $series = Series::all();
    return view('series')->withSeries($series);
})->name('series');
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register/confirm', 'ConfirmEmailController@index')->name('confirm-email');

Route::get('{series_by_id}', function (\Lynerx\Series $series) {
    dd($series);
});

Route::middleware('admin')->prefix('admin') ->group(function () {
    Route::resource('series', 'SeriesController');
    Route::resource('{series_by_id}/lessons', 'LessonsController');
});

// Route::prefix