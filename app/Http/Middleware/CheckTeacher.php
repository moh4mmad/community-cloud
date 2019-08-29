<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	
    public function handle($request, Closure $next, $guard = 'teacher')
	{
	    if (Auth::guard($guard)->check()) {
	        return redirect('teacher/resources');
	    }

	    return $next($request);
	}
}
