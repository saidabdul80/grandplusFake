<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_programmes extends Model
{
    //a
    public function departments()
    {
        return $this->belongsTo('App\tbl_departments');
    }
    public $timestamps = false;
}
