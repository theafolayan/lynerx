<?php

namespace Lynerx\Http\Controllers;

use Lynerx\Series;
use Lynerx\Lesson;

class WatchSeriesController extends Controller
{
    public function index(Series $series)
    {
        $theLesson = $series->lessons->first()->id;
        if(count($series->lessons)>1){
         $lesson = 'No Lesson available';
        }
        else{

            return redirect()->route('series.watch', [
                'series' => $series->slug,
                'lesson' => $theLesson

            ]);
        }
       
    }

    public function showLesson(Series $series, Lesson $lesson)
    {
        return view('frontend.watchLesson', [
            'series' => $series,
            'lesson' => $lesson
        ]);
    }
}
