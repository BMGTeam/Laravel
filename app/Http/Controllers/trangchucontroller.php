<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\tinhtrang;
use App\loaisanpham;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Rule;
use File;
use Illuminate\Support\Fluent;
use DB;
class trangchucontroller extends Controller
{
    public function xuat()
    {	$sanpham = sanpham::paginate(8);
    	$tinhtrang = tinhtrang::all();
    	$loaisanpham = loaisanpham::all();
    	return view('frontend.customer.home', ['sanpham' => $sanpham, 'tinhtrang'=>$tinhtrang, 'loaisanpham'=>$loaisanpham]);
	}
	public function chitietsp($id)
{
  return view('frontend.sanpham.chitietsp');
}
}
