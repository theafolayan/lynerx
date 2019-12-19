<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_has_a_default_username_after_registeration()
    {
        $this->post('/register', [
            'name' => 'Oluwaseun Afolayan',
            'email' => 'theafolayan@gmail.com',
            'password' => 'secretive'
            ])->assertStatus(200);

            $this->assertDatabaseHas('users', [
                // 'username' => str_slug('Oluwaseun afolayan'),
                'username' => Str::slug('Oluwaseun afolayan')
            ]);
    }
}
