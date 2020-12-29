<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tbl_programme;
class tbl_departments extends Model
{
    //
    
    public function programmes()
    {        

         $this->hasMany('App\tbl_programmes', 'department_id');
    }
    public $timestamps = false;
}
