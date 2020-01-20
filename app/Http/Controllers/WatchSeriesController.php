<?php

namespace Lynerx\Http\Controllers;

use Lynerx\Series;
use Lynerx\Lesson;

class WatchSeriesController extends Controller
{
    public function index(Series $series)
    {
       return redirect()->route('series.watch', [
            'series' => $series->slug,
            'lesson' => $series->lessons->first()->id
       ]);
    }

    public function showLesson(Series $series, Lesson $lesson)
    {
        return view('frontend.watchLesson', [
            'series' => $series,
            'lesson' => $lesson
        ]);
    }
}
