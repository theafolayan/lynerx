<?php

namespace Lynerx\Http\Controllers;

use Lynerx\Series;
use Lynerx\Lesson;

class WatchSeriesController extends Controller
{
    public function index(Series $series)
    {
        
        if(count($series->lessons)<1){
        //  $theLesson = ['id'=> '1', 'episode_number' => '0'];
        return 'No lesson on this series Yet!';
        }
        else{
            $theLesson = $series->lessons->first()->id;

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
    public function completeLesson(Lesson $lesson)
    {
        auth()->user()->completeLesson($lesson);
        response()->json(['status' => 'ok']);
    }
}
