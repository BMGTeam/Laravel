<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khuyenmai extends Model
{
   	protected $table = "khuyenmai";
      public function getdoituong()
    {
    	return $this->belongsTo('App\doituong', 'id_doituong', 'id');
    }
    
}
