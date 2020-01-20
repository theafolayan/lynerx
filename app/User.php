<?php

namespace Lynerx;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redis;

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
    public function isAdmin()
    {
      return in_array($this->email, config('Lynerx.administrators'));
    }
    public function completeLesson($lesson)
    {
        Redis::sadd("user:{$this->id}: series:{$lesson->series_id}", $lesson->id);
    }
    public function percentageCompletedForSeries($series){
        $numberOfLessonsInSeries = $series->lessons->count();
        $numberOfCompletedLessons = $this->getNumberOfCompletedLessonsForASeries;
        return ($numberOfLessonsInSeries / $numberOfLessonsInSeries) *100;
    }
    public function getNumberOfCompletedLessonsForASeries($series)
    {
       return count($this->getCompletedLessonsForASeries($series));
    }

    public function getCompletedLessonsForASeries($series)
    {
       return Redis::smembers("user:{$this->id}: series:{$series->id}");
    }
    public function hasStartedSeries($series)
    {
        return $this->getNumberOfCompletedLessonsForASeries($series) > 0;
    }
    public function getCompletedLessons($series)
    {
        $completedLessons = $this->getCompletedLessonsForASeries($series);

        return collect($completedLessons)->map(function($lessonId){
            return Lesson::find($lessonId);
        });
    }
}
