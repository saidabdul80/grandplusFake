<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class tbl_applicants extends Authenticatable
{
    
    protected $guarded = ['id'];
    protected $hidden = [
     'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
     return $this->password;
    }
    public $timestamps = false;
}
