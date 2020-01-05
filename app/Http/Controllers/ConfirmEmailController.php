<?php

namespace Lynerx\Http\Controllers;

use Illuminate\Http\Request;
use Lynerx\User;

class ConfirmEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = request('token');
        $user = User::where('confirm_token', $token)->first();
        // $user->confirm();
        // dd($user->confirm_token);
       
        
        
        if($user){
            $user->confirm();
            session()->flash('success', 'Great! Your Email has been confirmed');
            return redirect('/');
            
        }else{
            session()->flash('error', 'Oops! Your Email Confirmation token was not recognised');
            return redirect('/');
        }
    }
}
