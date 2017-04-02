<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanphamnoibat extends Model
{	
	protected $table = "sanphamnoibat";
        public function getsanpham()
    {
    	return $this->belongsTo('App\SanPham', 'id_sanpham', 'id');
    } 
}
