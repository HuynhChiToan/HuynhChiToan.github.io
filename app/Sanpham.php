<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = "products";

    public function loaisanpham(){
    	return $this->belongsTo('App\loaisanpham','id_type','id');
    }

   	public function chitiethoadon(){
   		return $this->hasMany('App\chitiethoadon','id_product','id');
   	}
}
