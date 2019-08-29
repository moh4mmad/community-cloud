<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Mail;
use Illuminate\Http\Request;
use App\Students;
use Redirect;
use DB;
//use DateTime;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function PwReset()
    {
        return view('front.students.passreset');
    }

	
	
	
	public function resetLink($code)
	{
		$reset = DB::table('password_resets')->where('token', $code)->orderBy('created_at', 'desc')->first();
		if($reset == null)
		{
			return redirect()->route('signin')->with('alert', 'Invalid request');
		}
		elseif ( $reset->status == 1) 
		{
			return redirect()->route('signin')->with('alert', 'Invalid request');
		}
		else
		{
			return view('front.students.newpassreset', compact('code'));
		}
     }
	
	public function passwordReset($code, Request $request)
    {
            $this->validate($request,
                [
                    'password' => 'required|string|min:6',
                ]);

            $reset = DB::table('password_resets')->where('token', $code)->orderBy('created_at', 'desc')->first();
            $user = Students::where('student_id', $reset->student_id)->first();
            if($reset == null){
			return redirect()->route('signin')->with('alert', 'Invalid request');
			}
			elseif ( $reset->status == 1) 
            {
                return redirect()->route('signin')->with('alert', 'Invalid request');
            }
            else
            {
                    $user->password = bcrypt($request->password);
                    $user->save();
                    DB::table('password_resets')->where('student_id', $user->student_id)->update(['status' => 1]);
                    return redirect()->route('signin')->with('success', 'You have been successfully changed the password.');
            }
        }
	
	
	public function PwResetReq(Request $request)
	{

		$this->validate($request,
                [
                    'email' => 'required',
                ]);
        $user = Students::where('email', $request->email)->first();
	
            if ($user == null) 
            {
                return back()->with('alert', 'No student was found.');
            }
            else
            {
				
				if($user->email_verify == 0)
				{
					  return redirect()->route('signin')->with('alert', 'Varify your email address to reset your password! ');
				}
				
				$query = DB::table('password_resets')->where('student_id', '=', $user->student_id)->orderBy('created_at', 'desc')->first();
				
				if ($query) 
				{
	
					if( Carbon::parse($query->created_at)->diffInMinutes() < 60 && Carbon::parse($query->created_at)->diffInHours() == 0 )
					{
						$wait = 60 - Carbon::parse($query->created_at)->diffInMinutes();
						return back()->with('alert', 'A email has already been send please try after '. $wait .' minutes.');
						
					}
					else {
						$subject = 'Password Reset';
						$code = str_random(30);
						$body = 'Use This url to Reset Password: '.url('/').'/password-reset/'.$code;
						DB::table('password_resets')->insert(
						['student_id' => $user->student_id, 'email' => $user->email, 'token' => $code, 'status' => 0, 'created_at' => date("Y-m-d H:i:s")]);
						
						$data = [
						'subject' => $subject,
						'header' => "As-salamu alaykum",
						'msg' => $body,
						];
						
						Mail::send('email', $data, function ($message) use ($request,$subject) {
							$message->to($request->email)->subject($subject);
							});
							
							if (Mail::failures()) {
								Session()->flash('alert', 'Email sending failed.');
								return redirect()->route('signin');
								}
								Session()->flash('success', 'A password reset url has been send to your email.');
								return redirect()->route('signin');
								}
				}
				else {
                $subject = 'Password Reset';
                $code = str_random(30);
                $body = 'Use This url to Reset Password: '.url('/').'/password-reset/'.$code;
                DB::table('password_resets')->insert(
                    ['student_id' => $user->student_id, 'email' => $user->email, 'token' => $code, 'status' => 0, 'created_at' => date("Y-m-d H:i:s")]
                );
				$data = [
						'subject' => $subject,
						'header' => "As-salamu alaykum",
						'msg' => $body,
						];
						
						Mail::send('email', $data, function ($message) use ($request,$subject) {
							$message->to($request->email)->subject($subject);
							});
				
				if (Mail::failures()) {
					Session()->flash('alert', 'Email sending failed.');
					return redirect()->route('signin');
				}
				
				Session()->flash('success', 'A password reset url has been send to your email.');
				return redirect()->route('signin');
				}
            }

        }
	
}
