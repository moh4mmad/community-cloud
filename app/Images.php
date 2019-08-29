<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $guarded = [];

	
	public function GallaryFolder()
	{
		return $this->belongsTo('App\GallaryFolders', 'folder_id','id');
	}
	
	
}
