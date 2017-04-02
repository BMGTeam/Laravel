<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanphamnoibat extends Model
{
    protected $table = "loaisanphamnoibat";
    public function getsanphamnoibat()
    {
    	return $this->hasMany('App\sanphamnoibat');
    }
}
