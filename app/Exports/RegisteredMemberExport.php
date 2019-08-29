<?php

namespace App\Exports;
use App\Events;
use App\TeamInfo;
use App\TeamMembers;
use App\IndividualMembers;
use DB;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegisteredMemberExport implements FromCollection, WithHeadings
{
    use Exportable;

	public function Id(int $id)
    {
        $this->id = $id;
        
        return $this;
    }
	
	
    public function collection()
    {
		
	$event = Events::where('id', $this->id)->first();
	if($event)
	{
		if($event->type == "team")
			{
				$members = TeamMembers::whereHas('team', function($q) use ($event)
				{
					$q->where('event_id', $event->id)->where('reg_confirm', 1);
				})->orderBy('created_at', 'ASC')->get();
				foreach($members as $member)
				{
					$members_array[] = array(
					'Team name'  => $member->Team->team_name,
					'ID'  => $member->student_id,
					'Name'  => $member->name,
					'Email'  => $member->email,
					'Phone'  => $member->phone,
					'University'  => $member->institute,
					'Department'  => $member->department,
					'Semester' => $member->semester,
					'Tshirt Size'  => $member->tshirt_size
					);			 
				}
				
				return collect($members_array);
				
			}
			else
			{
				$members = IndividualMembers::where('event_id', $event->id)->where('reg_confirm', 1)->get();
				
				foreach($members as $member)
				{
					$members_array[] = array(
					'ID'  => $member->student_id,
					'Name'  => $member->name,
					'Email'  => $member->email,
					'Phone'  => $member->phone,
					'University'  => $member->institute,
					'Department'  => $member->department,
					'Semester' => $member->semester,
					'Tshirt Size'  => $member->tshirt_size
					);			 
				}
				
				return collect($members_array);
				
			}
	}
	else
	{
		return abort(404);
	}

    }

    public function headings(): array
    {
		
		$event = Events::where('id', $this->id)->first();
		if($event->type == "team")
			{
				return [
				'Team name', 'ID', 'Name', 'Email', 'Phone', 'University', 'Department', 'Semester', 'Tshirt Size'
				];
			}
			else
			{
				return [
				'ID', 'Name', 'Email', 'Phone', 'University', 'Department', 'Semester', 'Tshirt Size'
				];
			}
			
    }

}