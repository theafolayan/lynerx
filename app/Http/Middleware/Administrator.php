<?php

namespace Lynerx\Http\Middleware;

use Closure;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
           if (auth()->user()->isAdmin()) {
                # code...
                return $next($request);
           }else{
               return redirect('/');
            }
        }else{
            return redirect('/');
        }
        
    }
}
