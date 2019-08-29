<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamInfo extends Model
{
    protected $table = 'team_info';
    protected $guarded = [];

	
	public function Event()
	{
		return $this->belongsTo('App\Events', 'event_id','id');
	}
	
	
}
