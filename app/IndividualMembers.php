<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualMembers extends Model
{
    protected $table = 'individual_members';
    protected $guarded = [];
	
	
	public function Event()
	{
		return $this->belongsTo('App\Events', 'event_id','id');
	}
	

}
