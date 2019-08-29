<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    protected $table = 'team_members';
    protected $guarded = [];
	
	
	public function Team()
	{
		return $this->belongsTo('App\TeamInfo', 'team_id','id');
	}
	

}
