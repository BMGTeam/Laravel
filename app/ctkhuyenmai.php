<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctkhuyenmai extends Model
{
   protected $table = "chitietkhuyenmai";
    public function getkhuyenmai()
    {
    	return $this->belongsTo('App\khuyenmai', 'id_khuyenmai', 'id');
    }
    public function getsanpham()
    {
    	return $this->belongsTo('App\sanpham', 'id_sanpham', 'id');
    }
}
