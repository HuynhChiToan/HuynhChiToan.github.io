<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    protected $table = "type_products";

    public function sanpham(){
    	return $this->hasMany('App\sanpham','id_type','id');
    }

}
