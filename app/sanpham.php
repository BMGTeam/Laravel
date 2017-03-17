<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table = "sanpham";
    public $timestamps = false;
    public function loaisp()
    {
    	return $this->belongsTo('App\LoaiSanPham', 'MaLoaiSP', 'id');
    }
        public function nuocsx()
    {
        return $this->belongsTo('App\quocgia');
    }
 
     public function getHinh()
    {
    	return $this->hasMany('App\SanPham_image', 'id_sanpham', 'id');
    }
     public function getkhuyenmai()
    {
        return $this->hasMany('App\ctkhuyenmai', 'id_sanpham', 'id');
    }
}
