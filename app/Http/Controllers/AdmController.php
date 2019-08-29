<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;


use Auth;
use App\Sliders;
use App\Mailer;
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
use App\Students;
use App\TeamInfo;
use App\TeamMembers;
use App\ResourceSettings;
use App\IndividualMembers;
use Hash;
use Carbon\Carbon;
use Session;
use DB;
use PDF;
use Illuminate\Support\Facades\Redirect;
use App\Exports\RegisteredMemberExport;
use Maatwebsite\Excel\Facades\Excel;

class AdmController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('admin');
    }
	
	public function Dashboard(){
		
		$user = Auth::guard('admin')->user();
		$news_count = News::count();
		$events_count = Events::count();
		$faculty_count = Members::where('type', 'faculty_members')->count();
		$news = News::where('status', 1)->orderBy('created_at', 'desc')->limit(6)->get();
		$events = Events::orderBy('created_at', 'desc')->limit(6)->get();
		return view('admin.dashboard', compact('user', 'news_count', 'events_count', 'faculty_count', 'news', 'events'));
		
	}

	public function Profile()
	{
		
		$admin = Auth::guard('admin')->user();
		return view('admin.profile', compact('admin'));
		
	}
	
	public function ProfileUP(request $request)
	{
		
		$admin = Auth::guard('admin')->user();
		$this->validate($request,
                [
                    'name' => 'required',
					'email' => 'required|email',
                ]);
		if($request->password != "")
		{
		  $this->validate($request,
                [
                    'password' => 'required|string|min:6',
                ]);
			  $admin['password'] = bcrypt(Input::get('password'));

		  }
		
		$admin['name'] = $request->name;
		$admin['email'] = $request->email;
		$admin->save();
		$data = "{\"request\":\"success.\",\"message\":{\"content\":[\"done\"]}}";
		 $content = json_decode($data, true);
	     return response()->json($content, 200);
		
	}
	
	public function News()
	{
		$news = News::orderBy('created_at', 'desc')->paginate(10);
		return view('admin.news', compact('news'));
	}
	
	public function NewsRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		News::where('id', $request->id)->delete();
		return back()->with('success', 'News removed.');
		
	}
	
	public function NewsPublish(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		$news = News::where('id', $request->id)->first();
		$news['status'] = 1;
		$news->save();
		return back()->with('success', 'News published.');
		
	}
	
	
	public function NewsUnpublish(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		$news = News::where('id', $request->id)->first();
		$news['status'] = 0;
		$news->save();
		return back()->with('success', 'News unpublished.');
		
	}
	
	public function NewsAdd(Request $request)
	{
		$this->validate($request,
                [
					'title' => 'required',
					'content' => 'required',
					'type' => 'required',
                ]);
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/news', $imgrand.'.jpeg');
			$news['image'] = $imgrand.'.jpeg';
        }
		
		$news['title'] = $request->title;
		$news['content'] = $request->content;
		$news['type'] = $request->type;
		$news['created_by'] = Auth::guard('admin')->user()->username;
		
		News::create($news);
		
		return back()->with('success', 'News Published.');
		
	}
	
	
	public function NewsEdit(Request $request)
	{
		$this->validate($request,
                [
				    'id' => 'required',
					'title' => 'required',
					'content' => 'required',
					'type' => 'required',
                ]);
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/news', $imgrand.'.jpeg');
			$news['image'] = $imgrand.'.jpeg';
        }
		$news = News::where('id', $request->id)->first();
		$news['title'] = $request->title;
		$news['content'] = $request->content;
		$news['type'] = $request->type;
		
		$news->save();
		
		return back()->with('success', 'News Updated.');
		
	}
		
	public function EventsAdd(Request $request)
	{
		foreach ($request->except('_token') as $data => $value) {
				$valids[$data] = "required";
				}
		$request->validate($valids);
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/event', $imgrand.'.jpeg');
			$event['image'] = $imgrand.'.jpeg';
        }
		
		$event['title'] = $request->title;
		$event['content'] = $request->content;
		$event['date'] = Carbon::createFromFormat('Y-m-d', $request->date);
		$event['location'] = $request->location;
		$event['start_time'] = $request->start_time;
		$event['end_time'] = $request->end_time;
		$event['reg_fee'] = $request->reg_fee;
		$event['payment_method'] = $request->payment_method;
		$event['payment_number'] = $request->payment_number;
		$event['deadline'] = Carbon::createFromFormat('Y-m-d\TH:i', $request->deadline);
		$event['type'] = $request->type;
		$event['max_member'] = $request->type == "team" ? $request->max_member : 0;
		$event['created_by'] = Auth::guard('admin')->user()->username;
		
		Events::create($event);
		
		return back()->with('success', 'Event Published.');
		
	}
	
		
	public function EventsEdit(Request $request)
	{
		foreach ($request->except('_token') as $data => $value) {
				$valids[$data] = "required";
				}
		$request->validate($valids);
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/event', $imgrand.'.jpeg');
			$event['image'] = $imgrand.'.jpeg';
        }
		$event = Events::where('id', $request->id)->first();
		$event['title'] = $request->title;
		$event['content'] = $request->content;
		$event['date'] = Carbon::createFromFormat('Y-m-d', $request->date);
		$event['location'] = $request->location;
		$event['start_time'] = $request->start_time;
		$event['end_time'] = $request->end_time;
		$event['reg_fee'] = $request->reg_fee;
		$event['payment_method'] = $request->payment_method;
		$event['payment_number'] = $request->payment_number;
		$event['deadline'] = Carbon::createFromFormat('Y-m-d\TH:i', $request->deadline);
		$event['type'] = $request->type;
		$event['max_member'] = $request->type == "team" ? $request->max_member : 0;

		
		$event->save();
		
		return back()->with('success', 'Event Updated.');
		
	}
	
	
	public function Events()
	{
		$events = Events::orderBy('created_at', 'desc')->paginate(10);
		return view('admin.events', compact('events'));
	}
	
	public function EventsRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		TeamInfo::where('event_id', $request->id)->update(['event_id' => null]);
		IndividualMembers::where('event_id', $request->id)->update(['event_id' => null]);
		Events::where('id', $request->id)->delete();
		return back()->with('success', 'Event removed.');
		
	}
	
	
	public function EventsRegPending($id)
	{
		
		$event = Events::where('id', $id)->first();
		if($event)
		{
			if($event->type == "team")
			{
				$teams = TeamInfo::where('event_id', $event->id)->where('reg_confirm', 0)->paginate(20);
				return view('admin.reg.teampending', compact('event', 'teams'));
			}
			else
			{
				$members = IndividualMembers::where('event_id', $event->id)->where('reg_confirm', 0)->paginate(20);
				return view('admin.reg.individualpending', compact('event', 'members'));
			}
		}
		else
		{
			return abort(404);
		}
	
	}
	
	public function EventsRegConfirm(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required',
					'type' => 'required',
                ]);				
		
		if($request->type == "team")
		{
			$team = TeamInfo::where('id', $request->id)->first();
			$team['reg_confirm'] = 1;
			$team->save();
			return back()->with('success', 'Team registration approved.');
		}
		else
		{
			$team = IndividualMembers::where('id', $request->id)->first();
			$team['reg_confirm'] = 1;
			$team->save();
			return back()->with('success', 'Member registration approved.');
		}
		
	}
	
	
	public function EventsRegRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required',
					'type' => 'required',
                ]);
		if($request->type == "team")
		{
		TeamMembers::where('team_id', $request->id)->delete();
		TeamInfo::where('id', $request->id)->delete();
		return back()->with('success', 'Team & members removed.');
		}
		else
		{
			IndividualMembers::where('id', $request->id)->delete();
			return back()->with('success', 'Member removed.');
		}
		
	}
	
	
	public function EventsRegistered($id)
	{
		
		$event = Events::where('id', $id)->first();
		if($event)
		{
			if($event->type == "team")
			{
				$teams = TeamInfo::where('event_id', $event->id)->where('reg_confirm', 1)->paginate(20);
				return view('admin.reg.teamconfirmed', compact('event', 'teams'));
			}
			else
			{
				$members = IndividualMembers::where('event_id', $event->id)->where('reg_confirm', 1)->paginate(20);
				return view('admin.reg.individualconfirmed', compact('event', 'members'));
			}
		}
		else
		{
			return abort(404);
		}
	
	}
	
	public function EventsExportPDF($id)
	{
		$event = Events::where('id', $id)->first();
		if($event)
		{
			if($event->type == "team")
			{
				$teams = TeamInfo::where('event_id', $event->id)->where('reg_confirm', 1)->get();
				
				$members = TeamMembers::whereHas('team', function($q) use ($event) {
			  $q->where('event_id', $event->id)->where('reg_confirm', 1);
			  })->orderBy('created_at', 'ASC')->get();

				if( sizeof($teams) == 0 ) 
				{
					return back()->with('alert', 'No data found.');
				}
				$pdf = PDF::loadView('admin.reg.exportpdf', compact('teams','event','members'));
				return $pdf->download($event->title .'.pdf');
			}
			else
			{
				$members = IndividualMembers::where('event_id', $event->id)->where('reg_confirm', 1)->get();
				if( sizeof($members) == 0 ) 
				{
					return back()->with('alert', 'No data found.');
				}
				$pdf = PDF::loadView('admin.reg.individualexport', compact('event', 'members'));
				return $pdf->download($event->title .'.pdf');
			}
		}
		else
		{
			return abort(404);
		}
		
	}
	
	public function EventsExportXLSX($id)
	{
		$event = Events::where('id', $id)->first();
		if($event)
		{
			if($event->type == "team")
			{
				$members = TeamMembers::whereHas('team', function($q) use ($event) {
					$q->where('event_id', $event->id)->where('reg_confirm', 1);
					})->orderBy('created_at', 'ASC')->get();
				if( sizeof($members) == 0 ) 
				{
					return back()->with('alert', 'No data found.');
				}
				$file = $event->title . " - Registered Team.xlsx";
				return (new RegisteredMemberExport)->Id($id)->download($file);
			}
			else
			{
				$members = IndividualMembers::where('event_id', $event->id)->where('reg_confirm', 1)->get();
				if( sizeof($members) == 0 ) 
				{
					return back()->with('alert', 'No data found.');
				}
				$file = $event->title . " - Registered Members.xlsx";
				return (new RegisteredMemberExport)->Id($id)->download($file);
			}
		}
		else
		{
			return abort(404);
		}
		
	}
	
	
	public function FacultyMembers()
	{
		$members = Members::where('type', 'faculty_members')->orderBy('created_at', 'desc')->paginate(20);
		$member1 = "Faculty Members";
		$type = "faculty_members";
		return view('admin.members.members', compact('members', 'member1', 'type'));
	}
	
	public function MembersRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		Members::where('id', $request->id)->delete();
		return back()->with('success', 'Member removed.');
		
	}
	
	public function MembersAdd(Request $request)
	{
		$this->validate($request,
                [
					'type' => 'required',
					'position' => 'required',
					'name' => 'required',
					'phone' => 'required',
					'email' => 'required',
					
                ]);
		if($request->type == "faculty_members")
		{
			$this->validate($request,
                [
					'password' => 'required',
                ]);
		}
			
		
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/members', $imgrand.'.jpeg');
			$member['image'] = $imgrand.'.jpeg';
        }
		
		
		
		$member['type'] = $request->type;
		$member['name'] = $request->name;
		$member['position'] = $request->position;
		$member['phone'] = $request->phone;
		$member['email'] = $request->email;
		$member['content'] = $request->content == null ? null : $request->content;
		$member['fb_url'] = $request->fb_url == null ? null : $request->fb_url;
		$member['password'] = $request->password == null ? null : bcrypt($request->password);
		$member['status'] = $request->type == "faculty_members" ? 1 : 0;
		
		
		Members::create($member);
		
		return back()->with('success', 'Member added.');
		
	}
	 
	public function MembersUpdate(Request $request)
	{
		$this->validate($request,
                [
				    'id' => 'required',
					'position' => 'required',
					'name' => 'required',
					'phone' => 'required',
					'email' => 'required',
					
                ]);
		
		$member = Members::where('id', $request->id)->first();
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/members', $imgrand.'.jpeg');
			$member['image'] = $imgrand.'.jpeg';
        }
		if($request->password != "")
		{
		  $this->validate($request,
                [
                    'password' => 'required|string|min:6',
                ]);
			  $member['password'] = bcrypt($request->password);

		  }
		  
		$member['name'] = $request->name;
		$member['position'] = $request->position;
		$member['phone'] = $request->phone;
		$member['email'] = $request->email;
		$member['content'] = $request->content == null ? null : $request->content;
		$member['fb_url'] = $request->fb_url == null ? null : $request->fb_url;
		$member->save();
		
		return back()->with('success', 'Member updated.');
		
	}
	 
	
	public function LabAssistance()
	{
		$members = Members::where('type', 'lab_assistance')->orderBy('created_at', 'desc')->paginate(20);
		$member1 = "Lab Assistance";
		$type = "lab_assistance";
		return view('admin.members.members', compact('members', 'member1', 'type'));
	}
	
	public function OfficeStuff()
	{
		$members = Members::where('type', 'office_stuff')->orderBy('created_at', 'desc')->paginate(20);
		$member1 = "Office Stuff";
		$type = "office_stuff";
		return view('admin.members.members', compact('members', 'member1', 'type'));
	}
	
	
	public function ExecutiveBody()
	{
		$committee = Committee::where('status', 1)->first();
		$members = CommitteeMembers::where('committee_id', $committee->id)->paginate(20);
		return view('admin.members.executivebody', compact('members', 'committee'));
	}
	public function ExecutiveBodyRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		CommitteeMembers::where('id', $request->id)->delete();
		return back()->with('success', 'Member removed.');
		
	}
	
	public function ExecutiveBodyAdd(Request $request)
	{
		$this->validate($request,
                [
					'committee_id' => 'required',
					'position' => 'required',
					'name' => 'required',
					'phone' => 'required',
					'email' => 'required',
					
                ]);		
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/executivebody', $imgrand.'.jpeg');
			$member['image'] = $imgrand.'.jpeg';
        }
		
		
		
		$member['committee_id'] = $request->committee_id;
		$member['name'] = $request->name;
		$member['position'] = $request->position;
		$member['phone'] = $request->phone;
		$member['email'] = $request->email;
		$member['content'] = $request->content == null ? null : $request->content;
		$member['fb_url'] = $request->fb_url == null ? null : $request->fb_url;
		$member['linkedin_url'] = $request->linkedin_url == null ? null : $request->linkedin_url;
		
		
		CommitteeMembers::create($member);
		
		return back()->with('success', 'Member added.');
		
	}
	
	
	public function ExecutiveBodyUpdate(Request $request)
	{
		$this->validate($request,
                [
				    'id' => 'required',
					'position' => 'required',
					'name' => 'required',
					'phone' => 'required',
					'email' => 'required',
					
                ]);
		
		$member = CommitteeMembers::where('id', $request->id)->first();
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/executivebody', $imgrand.'.jpeg');
			$member['image'] = $imgrand.'.jpeg';
        }

		  
		$member['name'] = $request->name;
		$member['position'] = $request->position;
		$member['phone'] = $request->phone;
		$member['email'] = $request->email;
		$member['content'] = $request->content == null ? null : $request->content;
		$member['fb_url'] = $request->fb_url == null ? null : $request->fb_url;
		$member['linkedin_url'] = $request->linkedin_url == null ? null : $request->linkedin_url;
		$member->save();
		
		return back()->with('success', 'Member updated.');
		
	}
	
	
	public function Achievements()
	{
		$achievements = Achievements::orderBy('created_at', 'desc')->paginate(12);
		return view('admin.achievements', compact('achievements'));
	}
	
	
	public function AchievementsRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		Achievements::where('id', $request->id)->delete();
		return back()->with('success', 'Achievement removed.');
		
	}
	
	public function AchievementsAdd(Request $request)
	{
		$this->validate($request,
                [
					'title' => 'required',
					'content' => 'required',
					'image' => 'required',
					
                ]);		
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/achievements', $imgrand.'.jpeg');
			$achievement['image'] = $imgrand.'.jpeg';
        }
		
		
		
		$achievement['title'] = $request->title;
		$achievement['content'] = $request->content;

		
		Achievements::create($achievement);
		
		return back()->with('success', 'achievement added.');
		
	}
	
	
	public function AchievementsUpdate(Request $request)
	{
		$this->validate($request,
                [
				    'id' => 'required',
					'title' => 'required',
					'content' => 'required',
					
                ]);
		
		$achievement = Achievements::where('id', $request->id)->first();
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/achievements', $imgrand.'.jpeg');
			$achievement['image'] = $imgrand.'.jpeg';
        }

		  
		$achievement['title'] = $request->title;
		$achievement['content'] = $request->content;
		$achievement->save();
		
		return back()->with('success', 'achievement updated.');
		
	}
	
	
	
	public function Committee()
	{
		$committees = Committee::orderBy('created_at', 'desc')->paginate(12);
		return view('admin.committee.committee', compact('committees'));
	}
	
	
	public function CommitteeRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		CommitteeMembers::where('committee_id', $request->id)->delete();
		Committee::where('id', $request->id)->delete();
		return back()->with('success', 'Achievement removed.');
		
	}
	
		
	public function CommitteeAdd(Request $request)
	{
		$this->validate($request,
                [
					'name' => 'required',
					'session' => 'required',
                ]);		
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/committee', $imgrand.'.jpeg');
			$committee['image'] = $imgrand.'.jpeg';
        }
		
		
		
		$committee['name'] = $request->name;
		$committee['session'] = $request->session;

		
		Committee::create($committee);
		
		return back()->with('success', 'committee added.');
		
	}	
	
	public function CommitteeUpdate(Request $request)
	{
		$this->validate($request,
                [
				    'id' => 'required',
					'name' => 'required',
					'session' => 'required',
                ]);		
		
		$committee = Committee::where('id', $request->id)->first();
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/committee', $imgrand.'.jpeg');
			$committee['image'] = $imgrand.'.jpeg';
        }
		
		
		
		$committee['name'] = $request->name;
		$committee['session'] = $request->session;

		
		$committee->save();
		
		return back()->with('success', 'committee updated.');
		
	}
	
	public function CommitteeStatus($id, $value)
	{
		$committee = Committee::where('id', $id)->first();
		if($committee){
		if($value == 0)
		{
     		$committee['status'] = 0;
			$committee->save();
			return back()->with('success', 'Committee deactivated.');
		}
		elseif($value == 1)
		{
			Committee::where('status', 1)->update(['status' => 0]);
			$committee['status'] = 1;
			$committee->save();
			return back()->with('success', 'Committee activated.');
		}
		else
		{
			return abort('404');
		}
		}
		else
		{
			return abort('404');
		}
	}
	
	public function CommitteeMembers($id)
	{
		$committee = Committee::where('id', $id)->first();
		$members = CommitteeMembers::where('committee_id', $id)->paginate(20);
		if($committee)
		{
			return view('admin.members.executivebody', compact('members', 'committee'));
		}
		else
		{
			return abort('404');
		}
	}
	
	public function Gallery()
	{
		$gallerys = GallaryFolders::paginate(12);
		return view('admin.gallerys', compact('gallerys'));
	}
	
	
	public function GalleryAdd(Request $request)
	{
		$this->validate($request,
                [
					'name' => 'required',
                ]);		
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/gallery', $imgrand.'.jpeg');
			$gallery['image'] = $imgrand.'.jpeg';
        }
		
		
		
		$gallery['name'] = $request->name;

		
		GallaryFolders::create($gallery);
		
		return back()->with('success', 'gallery added.');
	}
	
	public function GalleryUpdate(Request $request)
	{
		$this->validate($request,
                [
				    'id' => 'required',
					'name' => 'required',
                ]);		
		
		$gallery = GallaryFolders::where('id', $request->id)->first();
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/gallery', $imgrand.'.jpeg');
			$gallery['image'] = $imgrand.'.jpeg';
        }
		
		
		
		$gallery['name'] = $request->name;

		$gallery->save();
		
		return back()->with('success', 'gallery updated.');
	}
	
	public function GalleryRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		Images::where('folder_id', $request->id)->delete();
		GallaryFolders::where('id', $request->id)->delete();
		return back()->with('success', 'Images & folder removed.');
		
	}
	
	
	public function Photo($id)
	{
		
		$folder = GallaryFolders::where('id', $id)->first();
		
		if($folder)
		{
			$photos = Images::where('folder_id', $folder->id)->paginate(10);
			return view('admin.photo', compact('photos', 'folder'));
		}
		else
		{
			abort('404');
		}
		
		
	}
	
	public function PhotoAdd(Request $request)
	{
		
		$this->validate($request,
                [
					'folder_id' => 'required',
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);

		$imgrand = str_random(10);
        $request->image->move('assets/img/gallery', $imgrand.'.jpeg');
		$gallery['img_url'] = $imgrand.'.jpeg';
		$gallery['folder_id'] = $request->folder_id;
        
		Images::create($gallery);
		
		return back()->with('success', 'gallery added.');
		
	}
	
	public function PhotoRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required'
                ]);
		Images::where('id', $request->id)->delete();
		return back()->with('success', 'Images removed.');
		
	}
	
	public function Students()
	{
		$students = Students::where('email_verify', 1)->where('admin_verify', 1)->orderBy('created_at', 'desc')->paginate(20);
		return view('admin.students.data', compact('students'));
	}
	
	public function StudentPending()
	{
		$students = Students::where('email_verify', 1)->where('admin_verify', 0)->where('active', 0)->orderBy('created_at', 'desc')->paginate(20);
		return view('admin.students.pending', compact('students'));
	}
	
	public function StudentUpdate(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required',
					'name' => 'required',
					'gender' => 'required',
					'email' => 'required',
					'phone' => 'required',
					'academic_year' => 'required',
                ]);
		
		$student = Students::where('student_id', $request->id)->first();
		$student['name'] = $request->name;
		$student['gender'] = $request->gender;
		$student['email'] = $request->email;
		$student['phone'] = $request->phone;
		$student['academic_year'] = $request->academic_year;
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/students', $imgrand.'.jpeg');
			$student['image'] = $imgrand.'.jpeg';
        }
		$student->save();
		return back()->with('success', 'Student updated.');
		
	}
	
	public function StudentStatus(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required',
					'active' => 'required',
                ]);
		$student = Students::where('student_id', $request->id)->first();
		if($request->active == 0)
		{
     		$student['active'] = 0;
			$student->save();
			return back()->with('success', 'Student deactivated.');
		}
		elseif($request->active == 1)
		{
			$student['active'] = 1;
			$student->save();
			return back()->with('success', 'Student Activated.');
		}
	}
	
	public function StudentApprove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required',
                ]);
		$student = Students::where('student_id', $request->id)->first();
		$student['active'] = 1;
		$student['admin_verify'] = 1;
		$student->save();
		return back()->with('success', 'Student approved.');
	}
	public function StudentRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required',
                ]);
		$student = Students::where('student_id', $request->id)->where('admin_verify', 0)->where('active', 0)->delete();
		return back()->with('success', 'Student removed.');
	}
	
	public function Sliders()
	{
		$sliders = Sliders::orderBy('created_at', 'desc')->paginate(10);
		return view('admin.settings.sliders', compact('sliders'));		
	}
	
	public function SlidersAdd(Request $request)
	{
		$this->validate($request,
                [
					'title' => 'required',
					'description' => 'required',
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
		
		$slider['title'] = $request->title;
		$slider['description'] = $request->description;
		if($request->hasFile('image'))
        {
			$imgrand = str_random(10);
            $request->image->move('assets/img/slider', $imgrand.'.jpeg');
			$slider['image'] = $imgrand.'.jpeg';
        }
		$slider['status'] = 1;
		Sliders::create($slider);
		return back()->with('success', 'Slider updated.');
		
	}
	
	public function SlidersEdit(Request $request)
	{
		$this->validate($request,
                [
					'title' => 'required',
					'description' => 'required',
					'id' => 'required'
                ]);
		$slider = Sliders::where('id', $request->id)->first();
		
		$slider['title'] = $request->title;
		$slider['description'] = $request->description;
		
		if($request->hasFile('image'))
        {
			$this->validate($request,
                [
					'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:400',
                ]);
			$imgrand = str_random(10);
            $request->image->move('assets/img/slider', $imgrand.'.jpeg');
			$slider['image'] = $imgrand.'.jpeg';
        }
		$slider->save();
		return back()->with('success', 'Slider updated.');
	}
	
	public function SlidersStatus(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required',
					'status' => 'required',
                ]);
		$slider = Sliders::where('id', $request->id)->first();
		if($request->status == 0)
		{
     		$slider['status'] = 0;
			$slider->save();
			return back()->with('success', 'Slider deactivated.');
		}
		elseif($request->status == 1)
		{
			$slider['status'] = 1;
			$slider->save();
			return back()->with('success', 'Slider Activated.');
		}
	}
	
	public function SlidersRemove(Request $request)
	{
		$this->validate($request,
                [
					'id' => 'required',
                ]);
		$student = Sliders::where('id', $request->id)->delete();
		return back()->with('success', 'Slider removed.');
	}
	
	
	public function FrontEND()
	{
		$front = Frontend::first();
		return view('admin.settings.frontend', compact('front'));		
	}
	
	public function Resources()
	{
		$data = ResourceSettings::first();
		return view('admin.settings.resource', compact('data'));		
	}
	
	
	public function Mailer()
	{
		$data = Mailer::first();
		return view('admin.settings.mail', compact('data'));
	}
	
	public function Mailsender()
	{
		return view('admin.mailer');
	}
	
	public function FrontendUP(Request $request)
	{
		foreach ($request->except('_token', 'about_img', 'fb_url', 'twitter_url', 'linkedin_url', 'rss_url', 'pinterest_url', 'google_plus_url', 'main_logo', 'mobile_logo') as $data => $value) {
				$valids[$data] = "required";
				}
		$request->validate($valids);
	   
	   if($request->hasFile('about_img'))
	   {
			 $this->validate($request, [
			 'about_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:512',
			 ]);
			 $request->about_img->move('assets/img/about', 'about.jpeg');
		}
		
		$front = Frontend::first();
		foreach ($request->except('_token','about_img', 'main_logo', 'mobile_logo') as $data => $value) {
			$front[$data] = $value;
		}
		$front['about_img'] = "about.jpeg";
		$front->save();
		return back()->with('success', 'data updated.');
		
	}
	
	
	
	
}
	