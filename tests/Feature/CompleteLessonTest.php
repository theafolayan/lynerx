<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Lynerx\Lesson;
use Lynerx\Series;
use Tests\TestCase;
use Illuminate\Support\Facades\Redis;
use Lynerx\User;
class CompleteLessonTest extends TestCase

{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it()
    {
     $user = factory(User::class)->create();
     $series = factory(Series::class)->create(); 
     $lesson = factory(Lesson::class)->create([
         'series_id' =>$series->id
     ]);
     $user->completeLesson($lesson);
     $this->assertEquals(
         Redis::smembers('user:1:series:1'),
         [1]
     );

    }
}
