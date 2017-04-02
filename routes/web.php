<?php

use App\sanpham;
use App\loaisanpham;
Route::get('chitietsp/{id}', "trangchucontroller@chitiet");
Route::get('testhihi', function () {
    return view('admin.test');
});
Route::get('testHinh', 'sanphamcontroller@getHinh');
Route::get('fc', 'usercontroller@getFile');
Route::get('testform', function () {
    return view('admin.user.test');
});
Route::get('test', 'sanphamcontroller@test');
Route::get('tenkhongdau/{ten}','sanphamcontroller@tenkhongdau');
Route::get('admin/login', 'usercontroller@getloginadmin');
Route::post('admin/login', 'usercontroller@postloginadmin');
Route::get('admin/logout', 'usercontroller@logout');
Route::group(['prefix'=>'admin', 'middleware'=>'adminlogin'], function(){
	Route::group(['prefix'=>'sanpham'], function(){
		Route::get('danhsach', 'sanphamcontroller@xuat');
		Route::get('them', 'sanphamcontroller@themsuaxoa');
		Route::post('postthemsuaxoa', 'sanphamcontroller@postthemsuaxoa');
		Route::post('changeavatar', 'sanphamcontroller@changeavatar');
		Route::get('checksanpham/{name}', 'sanphamcontroller@checksanpham');
		Route::get('checkmasanpham/{masp}', 'sanphamcontroller@checkmasanpham');
		Route::get('chitietsanpham/{id}', 'sanphamcontroller@chitietsanpham');
		Route::get('hinhanh/{id}', 'sanphamcontroller@viewHinh');
		Route::post('themhinh', 'sanphamcontroller@themhinh');
		Route::get('xoanhieumuc', 'sanphamcontroller@xoanhieumuc');
		Route::get('xoatatca', 'sanphamcontroller@xoatatca');
		Route::get('xoahinh/{id}/{id_img}', 'sanphamcontroller@xoahinh');
		
	});
	Route::group(['prefix'=>'sanphamnoibat'], function(){
		Route::get('sanphamnoibat','sanphamnoibatcontroller@sanphamnoibat');
		Route::get('slide','sanphamnoibatcontroller@slide');
		Route::get('news','sanphamnoibatcontroller@news');
		Route::get('xemchitiet/{id}', 'sanphamnoibatcontroller@xemchitiet');
		Route::get('chitietsanpham/{id}', 'sanphamnoibatcontroller@chitietsanpham');
		Route::get('showname/{id}', 'sanphamnoibatcontroller@showname');
		Route::get('shownameloainoibat/{id}', 'sanphamnoibatcontroller@shownameloainoibat');
		Route::get('checkmasanpham/{masp}', 'sanphamnoibatcontroller@checkmasanpham');
		// Route::post('themhinh', 'sanphamnoibatcontroller@themhinh');
		// Route::get('xoahinh/{id}', 'sanphamnoibatcontroller@xoahinh');
		Route::get('themsuaxoa', 'sanphamnoibatcontroller@themsuaxoa');
		Route::post('postthemsuaxoa', 'sanphamnoibatcontroller@postthemsuaxoa');
	});
		Route::group(['prefix'=>'loaisanpham'], function(){
		Route::get('danhsach', 'loaisanphamcontroller@xuat');
		Route::post('postthemsua', 'loaisanphamcontroller@postthemsua');
		Route::get('chitiet', 'loaisanphamcontroller@chitiet');
		
	});
		Route::group(['prefix'=>'donhang'], function(){
		Route::get('danhsach', 'donhangcontroller@xuat');
		Route::get('ctdh/{id}', 'donhangcontroller@ctdh');
		Route::get('them', 'donhangcontroller@themsuaxoa');
		Route::post('postthemsuaxoa', 'donhangcontroller@postthemsuaxoa');
		Route::get('checkngay/{ngaybatdau}/{ngayketthuc}', 'donhangcontroller@checkngay');
		Route::get('chitietdonhang/{id}', 'donhangcontroller@chitietdonhang');
		Route::get('xoanhieumuc', 'donhangcontroller@xoanhieumuc');
		Route::get('xoatatca', 'donhangcontroller@xoatatca');

	});
		Route::group(['prefix'=>'ctdh'], function(){
		Route::get('danhsach', 'ctdhcontroller@xuat');
		Route::get('xemdonhang/{id_donhang}', 'ctdhcontroller@xemdonhang');
		Route::get('them', 'ctdhgcontroller@themsuaxoa');
		Route::post('postthemsuaxoa', 'ctdhcontroller@postthemsuaxoa');
		Route::get('chitiet/{dh}/{sp}', 'ctdhcontroller@chitiet');
		Route::get('xoanhieumuc', 'donhangcontroller@xoanhieumuc');
		Route::get('xoatatca', 'donhangcontroller@xoatatca');

	});
		Route::group(['prefix'=>'khachhang'], function(){
		Route::get('danhsach', 'khachhangcontroller@xuat');
		Route::get('them', 'khachhangcontroller@them');
		Route::get('xoa', 'khachhangcontroller@xoa');

	});
	Route::group(['prefix'=>'khuyenmai'], function(){
		Route::get('danhsach', 'khuyenmaicontroller@xuat');
		Route::get('them', 'khuyenmaicontroller@them');
		Route::get('xoa', 'khuyenmaicontroller@xoa');
	});
	Route::group(['prefix'=>'user'], function(){
		Route::get('danhsach', 'usercontroller@xuat');
		Route::get('them', 'usercontroller@them');
		Route::post('postthemsua', 'usercontroller@postthemsua');
		Route::get('chitiet', 'usercontroller@chitiet');
		Route::get('profile', 'usercontroller@profile');
		Route::post('changeavatar', 'usercontroller@changeavatar');
		Route::post('changepass', 'usercontroller@changepass');
		 Route::get('checkuser', 'usercontroller@checkuser');
		Route::get('checkuser/{name}', 'usercontroller@checkuser');
		Route::get('chitietuser/{id}', 'usercontroller@chitietuser');
		Route::post('editprofile', 'usercontroller@editprofile');
		Route::get('xoatatca', 'usercontroller@xoatatca');
	
	});
});
Route::group(['prefix'=>'home'], function(){
Route::get('home', "trangchucontroller@xuat");
Route::get('chitietsp/{id}', "trangchucontroller@chitietsp");
});






