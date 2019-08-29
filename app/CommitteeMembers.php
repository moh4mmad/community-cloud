<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommitteeMembers extends Model
{
    protected $table = 'committee_members';
    protected $guarded = [];

	
	public function Committee()
	{
		return $this->belongsTo('App\Committee', 'committee_id','id');
	}
	
	
	
	
}
