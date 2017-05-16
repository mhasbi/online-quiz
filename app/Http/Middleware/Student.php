<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Student
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
        if(Auth::check() && Auth::user()->role == '0')
          return $next($request);
        else
          return view('notification')->with('condition','This page only accessible by an authorized student account')->with('link','')->with('message','Access Not Allowed');
    }
}
