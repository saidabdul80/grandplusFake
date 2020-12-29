<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_lga extends Model
{
    //
	public function tbl_states()
    {
        return $this->belongsTo('App\tbl_states', 'state_id');
    }
     protected $table = 'tbl_lga';
}
