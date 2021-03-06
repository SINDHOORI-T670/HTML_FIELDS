<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        // return $next($request);
        if (Auth::check() && Auth::user()->role == 'admin') {
            // dd("Admin");
            return $next($request);
        }
        // elseif (Auth::check() && Auth::user()->role == 'guest') {
        //     return redirect('/guestt');
        // }
        // else {
        //     return redirect('/customer');
        // }
    }
}
