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


class TeacherController extends Controller
{
	
	public function __construct()
    {
		$this->middleware(['teacher','teacher.ckstatus']);
    }
	
	public function Resources()
	{
		
		$resources = Resources::orderBy('created_at', 'desc')->paginate(20);
		return view('front.teacher.resources', compact('resources'));
		
	}
	
	public function ResourceUp()
	{
		$folder = ResourceSettings::first();
		return view('front.teacher.resourceup', compact('folder'));
	}
	
	public function ResourceSearch(Request $request)
	{
		$this->validate($request,
            [
                'search' => 'required',
            ]);
		$resources = Resources::where('description', 'like', '%' . $request->search . '%')->orWhere('created_by', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(20);
		return view('front.teacher.resources', compact('resources'));
		
	}
	
	public function ResourceUpload(Request $request)
	{
		
		
		
		$folder = ResourceSettings::first();
		
		$this->validate($request,
                [
				    'description' => 'required',
                    'attachment' => 'required|max:'.$folder->max_size .''
                ]);
		
		if($request->hasFile('attachment'))
				{
					$ext = explode(",",$folder->allowed_file);
				    $extention = pathinfo($request->attachment->getClientOriginalName(), PATHINFO_EXTENSION);
					$file = pathinfo($request->attachment->getClientOriginalName(), PATHINFO_FILENAME);
					if (in_array($extention, $ext)) { 
					$secure_file = str_random(32);
					$request->attachment->move('main/public/files/'.$folder->secure_folder,$secure_file);
					} else {
						return back()->with('alert', "$extention is not allowed.");
					}
					
				}
		$resource['description'] = $request->description;
		$resource['secret'] = $secure_file;
		$resource['filename'] = $file.".".$extention;
		$resource['created_by'] = Auth::guard('teacher')->user()->name;
		Resources::create($resource);
		return back()->with('success', 'Resource has been uploaded successfully.');	
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
		$user = Auth::guard('teacher')->user();
		return view('front.teacher.profile',compact('user'));
	}
	
	public function ProfileUP(Request $req)
    {
		$this->validate($req,
                [
					'name' => 'required|string|max:255',
					'email' => 'required',
					'phone' => 'required|numeric|digits:11',
					'position' => 'required|string',
					'content' => 'required|string',
					'fb_url' => 'required|string',
                ]);
      
	  
	  $user = Auth::guard('teacher')->user();
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
            $req->image->move('assets/img/members', $imgrand.'.jpeg');
			$user['image'] = $imgrand.'.jpeg';
        }
	  
	  $user['name'] = $req->name;
	  $user['email'] = $req->email;
	  $user['phone'] = $req->phone;
	  $user['position'] = $req->position;
	  $user['content'] = $req->content;
	  $user['fb_url'] = $req->fb_url;
	  
	  $user->save();
	  return back()->with('success', 'Your profile has been updated.');	
    } 
	
	
	
	
	
	
	
	
	
}