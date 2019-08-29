<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Support\Facades\Crypt;
use Session;
use App\Resources;
use App\ResourceSettings;
use Carbon\Carbon;
use Mail;
use Auth;


class StudentsController extends Controller
{
	
	public function __construct()
    {
		$this->middleware(['auth','ckstatus']);
    }
	
	public function Resources()
	{
		
		$resources = Resources::orderBy('created_at', 'desc')->paginate(20);
		return view('front.students.resources', compact('resources'));
		
	}
	
	
	public function ResourceSearch(Request $request)
	{
		$this->validate($request,
            [
                'search' => 'required',
            ]);
		$resources = Resources::where('description', 'like', '%' . $request->search . '%')->orWhere('created_by', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(20);
		return view('front.students.resources', compact('resources'));
		
	}
	
	public function ResourceDownload($secret)
	{
		
		$attachment = Resources::where("secret", $secret)->first();
		$folder = ResourceSettings::first();
		if($attachment){
			
			$folder = "/files/".$folder->secure_folder ."/". $attachment->secret;
			$file = public_path($folder);
			if(file_exists($file)){
			return \Response::download($file, $attachment->filename);
			}
			else{
				return back()->with('alert', 'File doesn\'t exists.');
			}
		}
		else
		{
			return abort('404');
		}
		
	}
	
	
	public function Profile(Request $request)
	{
		$user = Auth::user();
		return view('front.students.profile',compact('user'));
	}
	
	public function ProfileUP(Request $req)
    {
		$this->validate($req,
                [
					'name' => 'required|string|max:255',
					'email' => 'required',
					'phone' => 'required|numeric|digits:11',
					'academic_year' => 'required|string',
					
                ]);
      
	  
	  $user = Auth::user();
	  if($req->password != "")
	  {
		  $this->validate($req,
                [
                    'password' => 'required|string|min:6',
                ]);
			  $user['password'] = bcrypt(Input::get('password'));

	  }
	  
	  
	  if($req->hasFile('image'))
        {
			$this->validate($req,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:300',
                ]);
			$imgrand = str_random(8);
            $req->image->move('assets/img/students', $imgrand.'.jpeg');
			$user['image'] = $imgrand.'.jpeg';
        }
	  
	  $user['name'] = $req->name;
	  $user['email'] = $req->email;
	  $user['phone'] = $req->phone;
	  $user['academic_year'] = $req->academic_year;
	  
	  $user->save();
	  return back()->with('success', 'Your profile has been updated.');	
    } 
	
	
	
	
	
	
	
	
	
}