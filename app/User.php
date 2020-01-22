<?php

namespace Lynerx;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redis;
use Lynerx\Series;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'confirm_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isConfirmed()
    {
        return $this->confirm_token == null;
    }
    public function confirm()
    {
        # code...
        $this->confirm_token = null;
        $this->save();
    }
    public function isAdmin(){
      return in_array($this->email, config('Lynerx.administrators'));
    }
    public function completeLesson($lesson){
        // dd("user:{$this->id}:series:{$lesson->series->id}");
        Redis::sadd("user:{$this->id}:series:{$lesson->series->id}", $lesson->id);
        //  dd("user:{$this->id}:series:{$lesson->series->id}");
        // dd(Redis::smembers("user"));
    }
    public function percentageCompletedForSeries($series){
        $numberOfLessonsInSeries = $series->lessons->count();
        $numberOfCompletedLessons = $this->getNumberOfCompletedLessonsForASeries;
        return ($numberOfLessonsInSeries / $numberOfLessonsInSeries) *100;
    }
    public function getNumberOfCompletedLessonsForASeries($series){
       return count($this->getCompletedLessonsForASeries($series));
    }
    public function getCompletedLessonsForASeries($series){
       return Redis::smembers("user:{$this->id}: series:{$series->id}");
    }
    public function hasStartedSeries($series){
        return $this->getNumberOfCompletedLessonsForASeries($series) > 0;
    } 
    public function getCompletedLessons($series){
        $completedLessons = $this->getCompletedLessonsForASeries($series);

        return collect($completedLessons)->map(function($lessonId){
            return Lesson::find($lessonId);
        });
    }
    public function hasCompletedLesson($lesson){
         return in_array($lesson->id, $this->getCompletedLessonsForASeries($lesson->series));
    }

    public function seriesBeingWatchedIds()
    {
        $keys = Redis::keys("user:{$this->id}:series:*");
        $seriesIds = [];
        foreach ($keys as $key) {
            # code...
            $seriesId =  explode(':', $key);
            array_push($seriesIds, $seriesId);
        }

        return $seriesIds;
    }
    public function seriesBeingWatched(){
        # code...
      

        return collect($this->seriesBeingWatchedIds())->map(function($id){
            return Series::find($id);
        });

    }
    public function getTotalNumberOfCompletedLessons()
    {
        $keys = Redis::keys("user:{$this->id}:series:*");
        $result = 0;
        foreach ($keys as $key ) {
            # code...
            $result += count(Redis::smembers($key));
        }
        return $result;
    
    }
}