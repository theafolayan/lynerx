<?php

namespace Lynerx;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model 
{
    protected $guared = [];
    protected $fillable = ['title', 'description', 'video_id', 'episode_number'];
    public function series()
    {
        return $this->hasMany(\Lynerx\Series::class);
        # code...
    }
}
