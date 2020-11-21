<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class adminMiddleware
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
        if(Auth::user()->usertype == 'Admin') 
        {
            
             return $next($request);
        }
        else 
        {
            return redirect('/home')->with('status','You are not allowed to Admin Dashboard');
        }
       
    }
}
