<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teachers extends Authenticatable
{
    protected $table = 'members';
    protected $guarded = [];

}