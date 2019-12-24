<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
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
    public function test_an_email_is_sent_on_register()
    {
        Mail::fake();
        # Register a new user
        $this->post('/register', [
            'name' => 'Oluwaseun Afolayan',
            'email' => 'theafolayan@gmail.com',
            'password' => 'secretive'
        ]);
      
        # Assert that a particular email was sent
        
    }
}
