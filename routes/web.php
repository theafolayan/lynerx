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
use Illuminate\Support\Facades\Redis;

use Lynerx\Series;
Route::get('/redis', function () {
   dd(Redis::get('baba')); 

});

Route::get('/', 'FrontendController@showHomepage')->name('homepage');
Route::get('/series', 'FrontendController@listAllSeries' )->name('home');
    
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});

Route::get('series/{series}', 'FrontendController@showSingleSeries');

Auth::routes();

Route::post('/series/complete-lesson/{lesson}', 'WatchSeriesController@completeLesson');
// Route::get('/home', 'HomeController@index')->name('home');'

Route::get('/register/confirm', 'ConfirmEmailController@index')->name('confirm-email');

Route::get('watch/{series}', 'WatchSeriesController@index')->name('series.learningPage');
Route::get('series/{series}/lesson/{lesson}', 'WatchSeriesController@showLesson')->name('series.watch'); 

Route::middleware('admin')->prefix('admin') ->group(function () {
    Route::resource('series', 'SeriesController');
    Route::resource('{series_by_id}/lessons', 'LessonsController');
});

// Route::prefix