<?php

namespace Lynerx;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded =[];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $with = ['lessons'];
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function getOrderedLessons()
    {
        return $this->lessons()->orderBy('episode_number', 'asc')->get();
    }
    // public function getNextLesson()
    // {
    //    return $this->series->lessons()->where('episode_number', '>' , $this->episode_number )
    //    ->orderBy('episode_number', 'asc')->first();
    // }
    // public function getPreviousLesson($lesson)
    // {
    //     return $this->series->lessons()->where('episode_number', '<', $this->episode_number)
    //         ->orderBy('episode_number', 'desc')->first();
    // }

}

