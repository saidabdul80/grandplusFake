<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_states extends Model
{
    //
     public function tbl_lga()
    {        

         $this->hasMany('App\tbl_lga');
    }
}