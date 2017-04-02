<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanphamnoibat;
use App\sanpham;
use App\quocgia;
use App\loaisanpham;
 use App\loaisanphamnoibat;
use File;
class sanphamnoibatcontroller extends Controller
{
   public function sanphamnoibat()
{
    $sanphamnoibat= sanphamnoibat::paginate(4);
    $sanpham = sanpham::all();
    $loainoibat= loaisanphamnoibat::all();
   return view('admin.sanpham.sanphamnoibat',['sanpham' => $sanpham, 'sanphamnoibat'=>$sanphamnoibat,'loainoibat'=>$loainoibat]);
}
   public function slide()
{
    $sanphamnoibat= sanphamnoibat::where('id_loainoibat', 4)->paginate(4);
    $sanpham = sanpham::all();
    $loainoibat= loaisanphamnoibat::all();
   return view('admin.sanpham.slide',['sanpham' => $sanpham, 'sanphamnoibat'=>$sanphamnoibat,'loainoibat'=>$loainoibat]);
}   public function news()
{
    $sanphamnoibat= sanphamnoibat::where('id_loainoibat', 3)->paginate(4);
    $sanpham = sanpham::all();
    $loainoibat= loaisanphamnoibat::all();
   return view('admin.sanpham.news',['sanpham' => $sanpham, 'sanphamnoibat'=>$sanphamnoibat,'loainoibat'=>$loainoibat]);
}
  public function postthemsuaxoa(Request $rs)
    {
    	// echo 'hichic'
    	
      if($rs->has('submit'))
      {

        if($rs['submit'] == "them")
        {
        // 	echo 'them';
        // 	 $this->validate($rs, [
        // 'id_sanpham' => 'unique:sanphamnoibat'
        // ],
        // [
        // 'id_sanpham.unique'=>'sản phẩm đã tồn tại'
        // ]);
        $sanphamnoibat= new sanphamnoibat();
        $sanphamnoibat->id_sanpham = $rs['id_sanpham'];
        $sanphamnoibat->id_loainoibat = $rs['id_loainoibat'];
         $sanphamnoibat->mota = $rs['mota'];
          $sanphamnoibat->tieude = $rs['tieude'];
          $sanphamnoibat->ngaydang = $rs['ngaydang'];
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
                $filename =$rs->id.'-noibat-'.$file->getClientOriginalname('image');
                $file->move('img/sanphamnoibat/', $filename);
                 $sanphamnoibat->AnhDaiDien = $filename;
                 }
       }
		     $sanphamnoibat->save();
		         if(empty($err))
		         {
		         	if($rs->slide){
		         	
		       		return redirect('admin/sanphamnoibat/slide')->with('thanhcong', 'Thêm thành công');
		       		}
		       		else if($rs->news){
		       				 return redirect('admin/sanphamnoibat/news')->with('thanhcong', 'Thêm thành công');
		       		}
		       		else return redirect('admin/sanphamnoibat/sanphamnoibat?page='.$rs['page'])->with('thanhcong', 'Thêm thành công');
		         }
		       		
		          else
		          {
		          	if($rs->slide){
		       		 return redirect('admin/sanphamnoibat/slide')->with('thanhcong', 'Thêm thông tin thành công nhưng Hình ảnh không hợp lệ');
		       		}
		       		else if($rs->news){
		       				 return redirect('admin/sanphamnoibat/news')->with('thanhcong', 'Thêm thông tin thành công nhưng Hình ảnh không hợp lệ');
		       		}
		       		 return redirect('admin/sanphamnoibat/sanphamnoibat?page='.$rs['page'])->with('thanhcong', 'Thêm thông tin thành công nhưng Hình ảnh không hợp lệ');
		          }
		           
		        }
      else if($rs['submit'] == "sua")
      {     
      
      	  if($rs->id)
          {
      		 $sanphamnoibat= sanphamnoibat::find($rs->id);
       		$sanphamnoibat->id_sanpham = $rs['id_sanpham'];
       		 $sanphamnoibat->id_loainoibat = $rs['id_loainoibat'];
       		  $sanphamnoibat->tieude = $rs['tieude'];
       		  $sanphamnoibat->mota = $rs['mota'];
       		   $sanphamnoibat->ngaydang = $rs['ngaydang'];
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
                  $filename =$rs->id.'-noibat-'.$file->getClientOriginalname('image');
                  if(file_exists('img/sanphamnoibat/'.$filename))
                {
                  File::delete('img/sanphamnoibat/'.$filename);
                }
                 
                $sanphamnoibat->AnhDaiDien = $filename;
                $file->move('img/sanphamnoibat/', $filename);
                      }

      }
       $sanphamnoibat->save();
        if(empty($err))
		         {
		         	if($rs->slide){
		       		 return redirect('admin/sanphamnoibat/slide')->with('thanhcong', 'Thêm thành công');
		       		}
		       		else if($rs->news){
		       				 return redirect('admin/sanphamnoibat/news')->with('thanhcong', 'Thêm thành công');
		       		}
		       		else return redirect('admin/sanphamnoibat/sanphamnoibat?page='.$rs['page'])->with('thanhcong', 'Thêm thành công');
		         }
		       		
		          else
		          {
		          	if($rs->slide){
		       		 return redirect('admin/sanphamnoibat/slide')->with('thanhcong', 'Thêm thông tin thành công nhưng Hình ảnh không hợp lệ');
		       		}
		       		else if($rs->news){
		       				 return redirect('admin/sanphamnoibat/news')->with('thanhcong', 'Thêm thông tin thành công nhưng Hình ảnh không hợp lệ');
		       		}
		       		 return redirect('admin/sanphamnoibat/sanphamnoibat?page='.$rs['page'])->with('thanhcong', 'Thêm thông tin thành công nhưng Hình ảnh không hợp lệ');
		          }
		           
		        }
       
        else {
        	if($rs->slide){
		       		 return redirect('admin/sanphamnoibat/slide')->with('thongbao', 'Chưa chọn sản phẩm');
		       		}
		     else if($rs->news){
		       				 return redirect('admin/sanphamnoibat/news')->with('thongbao', 'Chưa chọn sản phẩm');
		       		}
		      else return redirect('admin/sanphamnoibat/sanphamnoibat?page='.$rs['page'])->with('thongbao', 'Chưa chọn sản phẩm');
 
        }  

      }
       else if($rs['submit'] ==  "xoa")
       {
           if($rs->id)
           {

              $hinhanh = sanphamnoibat::find($rs->id);
              File::delete("img/sanphamnoibat/".$hinhanh->AnhDaiDien);//xóa ảnh đại diện
              $hinhanh->destroy($rs->id);
              if($rs->slide){
		       		 return redirect('admin/sanphamnoibat/slide')->with('thanhcong', 'Xóa thành công');
          }
		     else if($rs->news)
		       			 return redirect('admin/sanphamnoibat/news')->with('thanhcong', 'Xóa thành công');
          
		    
            else return redirect('admin/sanphamnoibat/sanphamnoibat?page='.$rs['page'])->with('thanhcong', 'Xóa thành công');
          
        
 }
         else 
         {
         	  if($rs->slide)
		       		 return redirect('admin/sanphamnoibat/slide')->with('thongbao', 'Chưa chọn sản phẩm');
          
		     else if($rs->news)
		       			 return redirect('admin/sanphamnoibat/news')->wwith('thongbao', 'Chưa chọn sản phẩm');
          
		    
         return redirect('admin/sanphamnoibat/sanphamnoibat?page='.$rs['page'])->with('thongbao', 'Chưa chọn sản phẩm');
    	
         }
        }
   
 
  }  
  }
  public function xemchitiet($id)
  {
  	 $sanpham = sanpham::find($id)->toJson();
     echo $sanpham;
  }
   public function chitietsanpham($id)
  {
  	 $sanphamnoibat = sanphamnoibat::find($id)->toJson();
     echo $sanphamnoibat;
  }
  public function showname($id){
  	$sanpham = sanpham::find($id);
  	$nuocsx = quocgia::where('id', $sanpham->id_nuocsx)->select('tennuoc')->get()->toJson();
   //   echo $sanpham + $nuocsx ;
  	$tenloai = loaisanpham::where('id', $sanpham->MaLoaiSP)->select('TenLoai')->get()->toJson();
  	// echo $nuocsx;
  	// echo $tenloai;
  	echo $sanpham;
  }
  public function shownameloainoibat($id){
  	 $loainoibat = loaisanphamnoibat::find($id)->toJson();
  	 echo $loainoibat;
  }
   public function checkmasanpham($masp)
    {

  $masanpham = sanphamnoibat::where('id_sanpham', $masp)->value('id_sanpham');
  echo $masanpham;

}
}


