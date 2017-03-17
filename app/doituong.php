<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doituong extends Model
{
    	protected $table = "doituong";
        public function getkhuyenmai()
    {
    	return $this->hasMany('App\khuyenmai', 'id_doituong', 'id');
    } 
}
