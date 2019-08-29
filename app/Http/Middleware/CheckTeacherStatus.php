<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Teachers;

class CheckTeacherStatus
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
        if (Auth::guard($guard)->check())
              {
                  if(Auth::guard($guard)->user()->type=="faculty_members" && Auth::guard($guard)->user()->status == 1)
                  {
                       return $next($request);
                  }
                  else
                  {
					  auth::guard($guard)->logout();
					  return redirect()->route('teacher.signin')->with('alert', 'Something went wrong.');
                  }
              }
    }
}
