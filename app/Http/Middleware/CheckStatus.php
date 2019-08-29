<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Students;

class CheckStatus
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
        if (Auth::check())
              {
                  if(Auth::user()->admin_verify == 1 && Auth::user()->email_verify == 1 && Auth::user()->active == 1)
                  {
                       return $next($request);
                  }

				  elseif(Auth::user()->email_verify == 0)
				  {
					  auth::guard()->logout();
					  return redirect()->route('signin')->with('alert', 'Please verify your email address to sign in!');
				  }
				  elseif(Auth::user()->admin_verify == 0)
				  {
					  auth::guard()->logout();
					  return redirect()->route('signin')->with('alert', 'Please wait for admin approval. You will be notified by email when admin approve your account.');
				  }
				  elseif(Auth::user()->admin_verify == 1 && Auth::user()->email_verify == 1 && Auth::user()->active == 0)
				  {
					  auth::guard()->logout();
					  return redirect()->route('signin')->with('alert', 'Your account has been deactivated.');
				  }
                  else
                  {
					  return redirect()->route('signin')->with('alert', 'Something went wrong.');
                  }
              }
    }
}
