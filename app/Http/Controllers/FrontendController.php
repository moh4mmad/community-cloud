<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Support\Facades\Crypt;
use Session;
use App\Sliders;
use App\News;
use App\Events;
use App\Members;
use App\Testimonial;
use App\CommitteeMembers;
use App\Committee;
use App\Achievements;
use App\GallaryFolders;
use App\Images;
use App\Frontend;

use App\TeamInfo;
use App\TeamMembers;
use App\IndividualMembers;



use Carbon\Carbon;
use Mail;


class FrontendController extends Controller
{
	
	public function index()
    {
		$sliders = Sliders::where('status', 1)->get();
		$news = News::where('status', 1)->orderBy('created_at', 'desc')->limit(10)->get();
		$events = Events::orderBy('created_at', 'desc')->limit(2)->get();
		$members = Members::where('type', 'faculty_members')->orderBy('created_at', 'asc')->get();
		$testimonials = Testimonial::orderBy('created_at', 'asc')->get();
		return view('front.index', compact('sliders', 'news', 'events', 'members', 'testimonials'));
    }

	
	public function News()
	{
		$news = News::where('status', 1)->orderBy('created_at', 'desc')->paginate(6);
		$events = Events::orderBy('created_at', 'desc')->limit(6)->get();
		return view('front.news', compact('news','events'));
		
	}
	
	public function NewsDetails($id)
	{
		
		$details = News::where('status', 1)->where('id', $id)->first();
		if($details){
		$news = News::where('status', 1)->orderBy('created_at', 'desc')->limit(6)->get();
		return view('front.newsdetails', compact('news','details'));
		}
		else
		{
			return abort('404');
		}
		
	}
	
	public function Events()
	{
		$news = News::where('status', 1)->orderBy('created_at', 'desc')->limit(6)->get();
		$events = Events::orderBy('created_at', 'desc')->paginate(4);
		return view('front.events', compact('news','events'));
		
	}
	
	public function EventsDetails($id)
	{
		$details = Events::where('id', $id)->first();
		if($details){
		$events = Events::orderBy('created_at', 'desc')->limit(6)->get();
		return view('front.eventdetails', compact('events','details'));
		}
		else
		{
			return abort(404);
		}
	}
	
	public function FacultyMembers()
	{
		$members = Members::where('type', 'faculty_members')->orderBy('created_at', 'asc')->paginate(6);
		return view('front.members', compact('members'));
	}
	
	public function FacultyMembersDetails($id)
	{
		$member = Members::where('type', 'faculty_members')->where('id', $id)->first();
		if($member){
		return view('front.memberdetails', compact('member'));
		}
		else
		{
			return abort(404);
		}
	}
	
	public function FacultyMembersContact(Request $request, $id)
	{
		$this->validate($request,
                [
					'name' => 'required',
					'email' => 'required|email',
					'message' => 'required',
                ]);
		$member = Members::where('type', 'faculty_members')->where('id', $id)->first();
		if($member)
		{
			$subject = "New message from ". $request->name;
			$data = [
			'subject' => $subject,
			'header' => "As-salamu alaykum, You have recived a new message from ". $request->name ." <br> sender email: ". $request->email,
			'msg' => $request->message,
			];
			
		     Mail::send('email', $data, function ($message) use ($member,$subject,$request) {
				$message->to($member->email)->replyTo($request->email, $request->name)->subject($subject);
				});
			
			return back()->with('success', 'Message has been sent successfully.');
			
		}
		
		
	}
	
	public function ExecutiveBody()
	{
		$committee = Committee::where('status', 1)->first();
		$members = CommitteeMembers::where('committee_id', $committee->id)->paginate(12);
		return view('front.committeemembers', compact('members'));
	}
	
	public function ExecutiveBodyDetails($id)
	{
		$member = CommitteeMembers::where('id', $id)->first();
		if($member){
		return view('front.executivebodydetails', compact('member'));
		}
		else
		{
			return abort(404);
		}
	}
	
	public function ExecutiveBodyContact(Request $request, $id)
	{
		$this->validate($request,
                [
					'name' => 'required',
					'email' => 'required|email',
					'message' => 'required',
                ]);
		$member = CommitteeMembers::where('id', $id)->first();
		if($member)
		{
			$subject = "New message from ". $request->name;
			$data = [
			'subject' => $subject,
			'header' => "As-salamu alaykum, You have recived a new message from ". $request->name ." <br> sender email: ". $request->email,
			'msg' => $request->message,
			];
			
		     Mail::send('email', $data, function ($message) use ($member,$subject,$request) {
				$message->to($member->email)->replyTo($request->email, $request->name)->subject($subject);
				});
			
			return back()->with('success', 'Your message has been send.');
			
		}
	}
	
	
	public function LabAssistance()
	{
		$members = Members::where('type', 'lab_assistance')->orderBy('created_at', 'asc')->paginate(12);
		return view('front.labassistance', compact('members'));
	}
	
	public function OfficeStuff()
	{
		$members = Members::where('type', 'office_stuff')->orderBy('created_at', 'asc')->paginate(12);
		return view('front.officestuff', compact('members'));
	}
	
	public function Achievements()
	{
		$achievements = Achievements::orderBy('created_at', 'desc')->paginate(6);
		$events = Events::orderBy('created_at', 'desc')->limit(6)->get();
		return view('front.achievements', compact('achievements','events'));
	}
	
	public function AchievementsDetails($id)
	{
		
		$details = Achievements::where('id', $id)->first();
		if($details){
		$achievements = Achievements::orderBy('created_at', 'desc')->limit(6)->get();
		return view('front.achievementdetails', compact('achievements','details'));
		}
		else
		{
			return abort('404');
		}
		
	}
	
	public function Committee()
	{
		$committee = Committee::where('status', 0)->paginate(8);
		return view('front.committee', compact('committee'));
	}
	
	
	public function CommitteeMembers($id)
	{
		$committee = Committee::where('id', $id)->first();
		if($committee){
		$members = CommitteeMembers::where('committee_id', $committee->id)->paginate(12);
		return view('front.committeemembers', compact('members', 'committee'));
		}
		else
		{
			return abort('404');
		}
	}
	
	public function CommitteeMembersDetails($id)
	{
		$member = CommitteeMembers::where('id', $id)->first();
		if($member){
		return view('front.executivebodydetails', compact('member'));
		}
		else
		{
			return abort(404);
		}
	}

	public function PhotoGallary()
	{
		$folders = GallaryFolders::paginate(12);
		return view('front.gallaryfolders', compact('folders'));
	}
	
	public function PhotoGallaryView($id)
	{
		$folder = GallaryFolders::where('id', $id)->first();
		if($folder)
		{
		$images = Images::where('folder_id', $id)->get();
		return view('front.images', compact('images', 'folder'));
		}
		else
		{
			return abort(404);
		}
	}
	
	public function Contact()
	{
		return view('front.contact');
	}
	
	public function ContactSubmit(Request $request)
	{
		
		$this->validate($request,
                [
					'name' => 'required',
					'email' => 'required|email',
					'message' => 'required',
                ]);
		$front = Frontend::first();
		$subject = "New message from ". $request->name;
			$data = [
			'subject' => $subject,
			'header' => "As-salamu alaykum, You have recived a new message from ". $request->name ." <br> sender email: ". $request->email,
			'msg' => $request->message,
			];
			
		Mail::send('email', $data, function ($message) use ($front,$subject,$request)
		{
			$message->to($front->email)->replyTo($request->email, $request->name)->subject($subject);
		});
				
		return back()->with('success', 'Message has been sent successfully.');
		
	}
	
	public function EventsReg($id)
	{
		$details = Events::where('id', $id)->first();
		if($details){
			if(Carbon::parse($details->deadline) < Carbon::now())
			{
				return view('front.regclosed', compact('details'));
			}
			else
			{
				if($details->type == "team"){
				    return view('front.eventreg', compact('details'));
				}
				else
				{
					return view('front.eventregindividual', compact('details'));
				}
			}
		}
		else
		{
			return abort(404);
		}
	}
	
	public function EventsRegSubmit(Request $request, $id)
	{
		$event = Events::where('id', $id)->first();
		
		if($event->type == "team")
		{
		$this->validate($request,
                [
					'team_name' => 'required',
					'email' => 'required|email',
					'gender' => 'required',
					'total_team_member' => 'required',
                    'transaction_id' => 'required',
					'sender' => 'required'
                ]);
		
		for ($i = 1; $i <= $request->total_team_member; $i++) {
        
        $this->validate($request,
                [
                    'team_member_'.$i.'_name' => 'required',
					'team_member_'.$i.'_student_id' => 'required',
					'team_member_'.$i.'_email' => 'required|email',
					'team_member_'.$i.'_phone' => 'required|numeric|digits:11',
					'team_member_'.$i.'_university' => 'required',
					'team_member_'.$i.'_department' => 'required',
					'team_member_'.$i.'_semester' => 'required'
                ]);
		}
		
		
		if(Carbon::parse($event->deadline) < Carbon::now())
		{
			return back()->with('alert', 'Registration closed!');
		}
		$team['team_name'] = $request->team_name;
		$team['team_email'] = $request->email;
		$team['team_gender'] = $request->gender;
		$team['total_team_member'] = $request->total_team_member;
		$team['event_id'] = $id;
		$team['transaction_id'] = $request->transaction_id;
		$team['sender'] = $request->sender;
		$team['reg_confirm'] = 0;
		$team_id = TeamInfo::create($team);
		for ($i = 1; $i <= $request->total_team_member; $i++) {
			
			$tshirt = $request['team_member_'.$i.'_tshirt_size'] == null ? null : $request['team_member_'.$i.'_tshirt_size'];

			$member['team_id'] = $team_id->id;
			$member['name'] = $request['team_member_'.$i.'_name'];
			$member['student_id'] = $request['team_member_'.$i.'_student_id'];
			$member['email'] = $request['team_member_'.$i.'_email'];
			$member['phone'] = $request['team_member_'.$i.'_phone'];
			$member['institute'] = $request['team_member_'.$i.'_university'];
			$member['department'] = $request['team_member_'.$i.'_department'];
			$member['semester'] = $request['team_member_'.$i.'_semester'];
			$member['tshirt_size'] = $tshirt;
			TeamMembers::create($member);
		}
		return back()->with('success', 'Submission recived.');
	}
	else
	{
		$this->validate($request,
                [
					'name' => 'required',
					'email' => 'email|required',
					'gender' => 'required',
					'phone' => 'required',
                    'university' => 'required',
					'department' => 'required',
					'student_id' => 'required',
                    'transaction_id' => 'required',
					'sender' => 'required',
					'semester' => 'required'
                ]);
				
		
		$member['event_id'] = $id;
		$member['name'] = $request->name;
		$member['email'] = $request->email;
		$member['phone'] = $request->phone;
		$member['gender'] = $request->gender;
		$member['institute'] = $request->university;
		$member['department'] = $request->department;
		$member['semester'] = $request->semester;
		$member['student_id'] = $request->student_id;
		$member['tshirt_size'] = $request['tshirt_size'] == null ? null : $request['tshirt_size'];
		$member['transaction_id'] = $request->transaction_id;
		$member['sender'] = $request->sender;
		$member['reg_confirm'] = 0;
		
		IndividualMembers::create($member);
			
		return back()->with('success', 'Submission recived.');
				
				
	}
	}
	
	
	
}