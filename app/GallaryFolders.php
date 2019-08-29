<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GallaryFolders extends Model
{
    protected $table = 'gallary_folders';
    protected $guarded = [];
	
	
	public function Images()
	{
		return $this->hasMany('App\Images', 'folder_id', 'id');
	}


}
