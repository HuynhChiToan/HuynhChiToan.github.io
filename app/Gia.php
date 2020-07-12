<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gia extends Model
{
    protected $table = "Gia";

    public function chitiethoadon(){
    	return $this->hasMany('App\chitiethoadon','id_gia','id');
    }

    public function Customer(){
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
}
