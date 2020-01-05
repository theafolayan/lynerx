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

}

