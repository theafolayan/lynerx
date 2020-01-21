<?php

namespace Lynerx;
use Lynerx\Series;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model 
{
    protected $guared = [];
    protected $fillable = ['title', 'description', 'video_id', 'episode_number'];
    public function series()
    {
        return $this->belongsTo(\Lynerx\Series::class);
        # code...
    }
    
    public function getNextLesson()
    {
        // return dd($this->series);
           return $this->series->lessons()->where('episode_number', '>', $this->episode_number)
            ->orderBy('episode_number', 'asc')->first();
    }



    public function getPreviousLesson()
    {
        return $this->series->lessons()->where('episode_number', '<', $this->episode_number)
            ->orderBy('episode_number', 'desc')->first();
    }
}
