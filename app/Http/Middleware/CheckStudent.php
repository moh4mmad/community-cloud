<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	
    public function handle($request, Closure $next, $guard = 'student')
	{
	    if (Auth::guard($guard)->check()) {
	        return redirect('/resources');
	    }

	    return $next($request);
	}
}
