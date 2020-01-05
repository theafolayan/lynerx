<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Support\Str;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSeriesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_create_series()
    {
       
        Storage::fake(config('filesystem.default'));
        $this->post('admin/series/', [
            'title'=> 'example series',
            // 'slug' => Str::slug('')
            'description' => 'Example description',
            'image' => UploadedFile::fake()->image('test.png')
            
        ])->assertRedirect();

        Storage::disk(config('filesystem.default'))->assertExists('series/'.Str::slug('example series'). '.png');
        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('example series')
        ]);
    }
}
