<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class QHSEMiddleware
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
        if (Auth::check()  //if it is authenticated
        && Auth::user()->role->id==5 //if its the QHSE
            ){
                return $next($request);
            } else{
                return redirect()->route('login');
            }    
    }
}
