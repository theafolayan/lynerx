<?php
namespace Lynerx\Exceptions;
use Exception;

class AuthFailedException extends Exception{
     public function render()
     {
         # code...
         return response()->json([
             'message' => 'Sorry, these credentials do not seem to match our records'
         ], 422); 
     }
}

