<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\sanphamnoibat;
use App\sanpham_image;
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
    	$news = sanphamnoibat::where('id_loainoibat', 3)->limit(3)->get();
        $slide = sanphamnoibat::where('id_loainoibat', 4)->limit(4)->get();
    	$noibatthang = sanphamnoibat::where('id_loainoibat', 1)->limit(3)->get();
    	return view('frontend.customer.home', ['sanpham' => $sanpham, 'tinhtrang'=>$tinhtrang, 'loaisanpham'=>$loaisanpham,'noibatthang'=>$noibatthang, 'news'=>$news, 'slide'=>$slide]);
	}
	public function chitietsp($id)
		{
			$img = sanpham_image::where('id_sanpham', $id)->get();
			$sanpham = sanpham::find($id);
			$topsanpham = sanpham::where('xephang','<','5')->get();
  			return view('frontend.product.chitietsp',['sanpham'=>$sanpham, 'img' => $img, 'topsanpham'=>$topsanpham]);
		}

}
