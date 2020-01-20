<?php

namespace Lynerx\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showSingleSeries(\Lynerx\Series $series)
    {
        return view('frontend.singleSeries')->withSeries($series);
    }

    public function listAllSeries(){
    $series = \Lynerx\Series::all();
    return view('frontend.series')->withSeries($series);   
    }

    public function showHomepage()
    {
        $series = \Lynerx\Series::orderBy('id', 'desc')->take(6)->get();
        return view('frontend.welcome')->withSeries($series);
    }
}
