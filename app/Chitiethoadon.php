<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitiethoadon extends Model
{
    protected $table = "Chitiethoadon";

    public function sanpham(){
    	return $this->belongsTo('App\sanpham','id_product','id');
    }

    public function gia(){
    	return $this->belongsTo('App\gia','id_gia','id');
    }
}
