<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use App\Admin;
use Mail;
use App\Front;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function passreset(Request $request)
	{
		$this->validate($request,
                [
                    'email' => 'email|required',
                ]);
					
				
        $admin = Admin::where('email', $request->email)->first();
            if ($admin == null) 
            {
				$data = "{\"message\":\"The given data was invalid.\",\"errors\":{\"email\":[\"We can't find a user with that e-mail address.\"]}}";
			    $content = json_decode($data, true);
				return response()->json($content, 422);
            }
            else
            {
				$to = $admin->email;
               // $name = $admin->name;
                $subject = 'Admin Password Reset';
                $code = str_random(38);
                $body = 'Use This Link to Reset Password: '.url('/').'/admin/password-reset/'.$code;
                DB::table('admin_password_resets')->insert(
                    ['email' => $to, 'token' => $code, 'status' => 0, 'created_at' => date("Y-m-d h:i:s")]
                );
				///send_email($to, $name, $subject, $message);
				Mail::send([], [], function ($message) use ($to,$subject,$body) {
					$message->to($to)->subject($subject)->setBody($body, 'text/html');
					});
				
				$data = "{\"message\":\"Success.\",\"data\":{\"content\":[\"Please check your email address. A password reset e-mail has been send.\"]}}";
				$content = json_decode($data, true);
				return response()->json($content, 200);
            }

        }
	
	public function resetLink($code)
	{
            $reset = DB::table('admin_password_resets')->where('token', $code)->orderBy('created_at', 'desc')->first();
            if($reset == null){
			return redirect()->route('admin.forget.pass')->withErrors(['alert' => ['The token is invalid.']]);
			}
			elseif ( $reset->status == 1) 
            {
             return redirect()->route('admin.forget.pass')->withErrors(['alert' => ['The token is expired.']]);
            }
            {
				return view('admin.auth.reset')->with(
				['token' => $code, 'email' => $reset->email]);
            }
    }
	
	
	public function passwordReset($code, Request $request)
	{
            $this->validate($request,
                [
                    'password' => 'required|min:8',
                ]);

            $reset = DB::table('admin_password_resets')->where('token', $code)->orderBy('created_at', 'desc')->first();
            
            if($reset == null){
			return redirect()->route('admin.forget.pass')->withErrors(['alert' => ['The token is invalid.']]);
			}
			elseif ( $reset->status == 1) 
            {
             return redirect()->route('admin.forget.pass')->withErrors(['alert' => ['The token is expired.']]);
            }
            else
            {
				$user = Admin::where('email', $reset->email)->first();
                    $user->password = bcrypt($request->password);
                    $user->save();
					
                    DB::table('admin_password_resets')->where('token', $code)->update(['status' => 1]);
					$data = "{\"message\":\"Success.\",\"data\":{\"content\":[\"You have successfully changed the password. Please sign in.\"]}}";
				$content = json_decode($data, true);
				return response()->json($content, 200);
            }
        }
		

	
    public function showLinkRequestForm()
    {
        return view('admin.auth.forgetpassword');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }
}
