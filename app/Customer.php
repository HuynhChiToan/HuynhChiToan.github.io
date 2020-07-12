<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "Customer";

    public function gia(){
    	return $this->hasMany('App\gia','id_customer','id');
    }
}
