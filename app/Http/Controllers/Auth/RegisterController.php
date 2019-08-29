<?php

namespace App\Http\Controllers\Auth;

use App\Students;
use Mail;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/signin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
	 
	 
	  public function EmailVerification($id,$code)
	  {
			$user = Students::where('student_id', $id)->where('email_verify',0)->where('admin_verify', 0)->first();
			
			if($user == !null){
			if($user->verify_secret == $code){
				$user['email_verify'] = 1;
				$user['verified'] = 1;
				$user['verify_secret'] = null; 
 				$user->save();
				return redirect()->route('signin')->with('success', 'You have successfully verified your email. Please wait for admin approval. You will be notified by email when admin approve your account.');
			}
		}
			return redirect()->route('signin')->with('alert', 'Invalid request');;
	  }
	 
	 
	 
    protected function validator(array $data)
    {
		
		 
        return Validator::make($data, [
            'student_id' => 'required|unique:students,student_id',
			'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|digits:11',
			'academic_year' => 'required|string',
			'gender' => 'required|string',
			]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
		$code = str_random(30);
		Session::put('verify_secret', $code);
        return Students::create([
            'student_id' => strtoupper($data['student_id']),
            'name' => $data['name'],
			'gender' => $data['gender'],
            'email' => $data['email'],
			'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'academic_year' => $data['academic_year'],
			'email_verify' => 0,
			'admin_verify' => 0,
			'active' => 0,
			'verified' => 0,
			'verify_secret' => $code
        ]);
    }
	
}
