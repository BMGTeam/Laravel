<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\sanpham;
use App\tinhtrang;
use App\loaisanpham;
use App\sanpham_image;
use App\quocgia;
use \Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Rule;
use File;
use Illuminate\Support\Fluent;
use Illuminate\Support\Facades\DB;
class sanphamcontroller extends Controller
{
	public function tenkhongdau($str)
	{
		echo changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER);
					
	}
    public function xuat()
    {
    	$sanpham = sanpham::paginate(4);
    	$tinhtrang = tinhtrang::all();
    	$loaisanpham = loaisanpham::all();
      $nuocsx= quocgia::all();
    	return view('admin.sanpham.dssanpham', ['sanpham' => $sanpham, 'tinhtrang'=>$tinhtrang, 'loaisanpham'=>$loaisanpham, 'nuocsx'=>$nuocsx]);
    }

    public function postthemsuaxoa(Request $rs)
    {
      if($rs->has('submit'))
      {
        
        if($rs['submit'] == "them")
        {
        $sanpham= new sanpham();
       $sanpham->TenSanPham = $rs['tensanpham'];
       $sanpham->TenKhongDau = changeTitle($rs['tensanpham'],$strSymbol='-',$case=MB_CASE_LOWER);
       $sanpham->MaSanPham = $rs['masanpham'];
        $sanpham->MaLoaiSP= $rs['loaisanpham'];
   		$sanpham->id_TinhTrang= $rs['tinhtrang'];
       $sanpham->GiaVon = $rs['giavon'];
       $sanpham->GiaBan = $rs['giaban'];
       $sanpham->NgayNhap = $rs->ngaynhap;
       $sanpham->SoLuongHienCo= $rs->soluong;
       $sanpham->id_nuocsx= $rs->xuatxu;
        $sanpham->xephang= $rs->xephang;
         if($rs->hasFile('image'))
         {
           $err=array();
           $file = $rs->file('image');
          if($file->getMimeType()!= 'image/jpeg' && $file->getMimeType()!='image/png' && $file->getMimeType()!="image/jpg"&& $file->getMimeType()!="image/gif")
                 $err[] = "loidinhdang";
           
              if( $file->getSize() > 8000000)
                   $err[] = "loisize";
              if(empty($err))
                {
                $filename =  $filename =$sanpham->TenKhongDau.'.'.$file->getClientOriginalExtension('image');
                $file->move('img/sanpham/anhdaidien/', $filename);
                 $sanpham->AnhDaiDien = $filename;
                 }
       }
       $sanpham->save();
         if(empty($err))
            return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Thêm thành công');
          else
            return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Thêm thông tin thành công nhưng Hình ảnh không hợp lệ');
        }
      else if($rs['submit'] == "sua")
      {     

      	  if($rs->id)
          {
       $sanpham= sanpham::find($rs->id);
     
      $sanpham->TenKhongDau = changeTitle($rs['tensanpham'],$strSymbol='-',$case=MB_CASE_LOWER);
       $sanpham->MaSanPham = $rs['masanpham'];
       $sanpham->MaLoaiSP= $rs['loaisanpham'];
        $sanpham->id_TinhTrang= $rs['tinhtrang'];
       $sanpham->GiaVon = $rs['giavon'];
       $sanpham->GiaBan = $rs['giaban'];
       $sanpham->NgayNhap = $rs->ngaynhap;
       $sanpham->SoLuongHienCo= $rs->soluong;
        $sanpham->id_nuocsx= $rs->xuatxu;
        $sanpham->xephang= $rs->xephang;
        if($rs->hasFile('image'))
         {
          $err=array();
           $file = $rs->file('image');
         if($file->getMimeType()!= 'image/jpeg' && $file->getMimeType()!='image/png' && $file->getMimeType()!="image/jpg"&& $file->getMimeType()!="image/gif")
                 $err[] = "loidinhdang";
           
              if( $file->getSize() > 8000000)
                   $err[] = "loisize";
              if(empty($err))
              { 
                  $filename =$sanpham->TenKhongDau.'.'.$file->getClientOriginalExtension('image');
                   if(file_exists('img/sanpham/anhdaidien'.$filename))
                {
                  File::delete('img/sanpham/anhdaidien'.$filename);
                }
                 
                $sanpham->AnhDaiDien = $filename;
                $file->move('img/sanpham/anhdaidien', $filename);
                      }

      }
       $sanpham->save();
        if(empty($err))
            return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Sửa thành công');
          else
            return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Sửa thông tin thành công nhưng Hình ảnh không hợp lệ');
       }
        else  return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thongbao', 'Chưa chọn sản phẩm');
 

      }
       else if($rs['submit'] ==  "xoa")
       {
           if($rs->id)
           {
         $sanpham= sanpham::destroy($rs->id);
          return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Xóa thành công');
           }
         else 
       return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thongbao', 'Chưa chọn sản phẩm');
     }
   
 
    }
  }
public function chitietsanpham($id)
    {
       
        $sanpham = sanpham::find($id)->toJson();
        echo $sanpham;
       
}
 public function checksanpham($name)
    {

  $sanpham = sanpham::where('TenSanPham', $name)->value('TenSanPham');
  echo $sanpham;

}
 public function checkmasanpham($masp)
    {

  $masanpham = sanpham::where('MaSanPham', $masp)->value('MaSanPham');
  echo $masanpham;

}
public function xoanhieumuc()
{
    $loaisanpham = loaisanpham::all();
    $sanpham = sanpham::all();
  return view('admin.sanpham.xoanhieumuc',['loaisanpham'=>$loaisanpham, 'sanpham'=>$sanpham]);
}
public function viewHinh($id)
{
   $sanpham = sanpham::all();
   $tensanpham = sanpham::where('id', $id)->select('TenSanPham')->get();
   $hinh = sanpham_image::where('id_sanpham', $id)->get();
  return view('admin.sanpham.hinhanh', ['sanpham'=>$sanpham,'tensanpham'=>$tensanpham,'id_sanpham'=>$id, 'hinh'=>$hinh]);
}
public function themhinh(Request $rs )
{           
           $file = $rs->file('image_detail');
           $filename = $file->getClientOriginalName('image_detail');
        //    $rules = ['file' => 'mimes:jpg,png,gif,jpeg'];
        //    $validator = Validator::make($file,
        //     $rules
        // );
        // if ($validator->fails())
        //     return redirect('admin/sanpham/hinhanh/'. $rs->id_sanpham)->with('thongbao', 'Hình ảnh không hợp lệ');
        // else{
          $err=array();
          if($file->getMimeType()!= 'image/jpeg' && $file->getMimeType()!='image/png' && $file->getMimeType()!="image/jpg"&& $file->getMimeType()!="image/gif")
                 $err[] = "loidinhdang";
           
              if( $file->getSize() > 8000000)
                   $err[] = "loisize";
              if(file_exists('img/sanpham/anh/'.$filename))
                 $err[] = "trungten";
              if(empty($err))
                {
           
              $file->move('img/sanpham/anh/', $filename);
              $sanpham_img = new sanpham_image();
             $sanpham_img->anh = $filename;
              $sanpham_img->id_sanpham = $rs['id_sanpham'];
              $sanpham_img->save();
              echo $filename;
               return redirect('admin/sanpham/hinhanh/'. $rs->id_sanpham)->with('thanhcong','Thêm thành công');
             }
             else 
               return redirect('admin/sanpham/hinhanh/'. $rs->id_sanpham)->with('err',$err);
      
        // } 
        // return view('admin.sanpham.jcrop',  ['image' => $filename]);
          // echo '<script type="text/javascript">window.top.window.show_popup_crop("'.$photo_dest.'")</script>';
          
       // } 
          // else
            
  
}

public function cropImage(request $rs)
{
   $quality = 90;
   echo $rs['image'];
    $src  = $rs['image'];
    $img  = imagecreatefromjpeg($src);
    $dest = ImageCreateTrueColor($rs['w'],$rs['w']);
    imagecopyresampled($dest, $img, 0, 0, $rs['x'],
       $rs['y'],$rs['w'], $rs['h'],
        $rs['w'], $rs['h']);
    imagejpeg($dest, $src, $quality);
    return "<img src='img/sanpham/anh/".$src."'>";
}
public function DeleteDetailImage($id, $idImg)
{
         $hinhanh = sanpham_image::find($idImg);
         File::delete("img/sanpham/anh/".$hinhanh->anh);
          $hinhanh->destroy($idImg);
          return redirect('admin/sanpham/hinhanh/'.$id)->with('thanhcong', 'Xóa thành công');
}
public function test()
{
   $sanpham = sanpham::all();

   $id = $sanpham->find('1');
   echo $id->TenSanPham;

}
public function getHinh()
{
   $sanpham_img = sanpham::find('1')->getHinh->toJson();
   echo "<pre>";
   var_dump($sanpham_img);
      echo "</pre>";
}
public function xoatatca()
{
   DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    $sanpham = sanpham::truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
}
// ----------------------------------------------------------------------------------------------frontend------------------
}
