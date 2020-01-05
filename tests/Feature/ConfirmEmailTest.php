<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Lynerx\User;
use Tests\TestCase;

class ConfirmEmailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     *
     * @return void
     */

     use RefreshDatabase; 
    public function test_a_user_can_confirm_email()
    {
        //create user
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        // dd($user);
        // $this->get("/register/confirm/?token={$user->confirm_token}")->assertRedirect('/');
        //send the email 
        //make get request to endpoint
        $this->get("/register/confirm/?token={$user->confirm_token}")->assertRedirect('/')
        ->assertSessionHas('success', 'Great! Your Email has been confirmed');
        //assert that t\he user is confirmed
        // dd($user);
        $this->assertTrue($user->fresh()->isConfirmed());
        // dd($user);

    }
    public function test_user_confirmation_has_errors()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->get("/register/confirm/?token=WRONG_TOKEN")->assertRedirect('/')
            ->assertSessionHas('error', 'Oops! Your Email Confirmation token was not recognised');
    }
       
}
