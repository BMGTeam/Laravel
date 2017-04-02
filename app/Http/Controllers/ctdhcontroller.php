<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ctdh;
use App\donhang;
use App\sanpham;
class ctdhcontroller extends Controller
{
    public function xuat()
    {
    	$ctdh = ctdh::paginate(4);
    	$sanpham = sanpham::all();
      $donhang = donhang::all();
    	return view('admin.ctdh.danhsach', ['sanpham' => $sanpham,'ctdh' => $ctdh, 'donhang'=>$donhang]);
    }
    public function xemdonhang($id_donhang)
    {
      $ctdh = ctdh::where('id_donhang', $id_donhang)->paginate(4);
      $sanpham = sanpham::all();
      return view('admin.ctdh.xemdonhang', ['sanpham' => $sanpham,'ctdh' => $ctdh]);
    }
    public function chitiet($dh, $sp)
    {
    	$ctdh = ctdh::where(['id_donhang'=> $dh,'id_sanpham'=>$sp ])->get()->toJson();
    	echo $ctdh;
    }
    public function postthemsuaxoa(Request $rs)
    {
      if($rs->has('submit'))
      {
        if($rs['submit'] == "them")
        {
    //      $this->validate($rs, [ 
    //       'id_sanpham' => 'unique|required', 
 			// 'Gia' => 'required|numeric',
 			// 'SoLuong'=>'required|numeric'
    //     ],
    //     [
    //    	 'id_sanpham.required'=>'phải có khách hàng',
    //       'id_sanpham.numeric'=>'id khách hàng phải là một số',
    //        'id_sanpham.required'=>'phải có tình trạng đơn hàng',
    //       'tonggiatri.numeric'=>'tổng giá trị phải là một số',
    //     ]);
        $ctdh= new ctdh();
        $ctdh->id_sanpham= $rs['id_sanpham'];
        $ctdh->id_donhang= $rs['id_donhang'];
   		 $ctdh->Gia= $rs['gia'];
       $ctdh->SoLuong= $rs['soluong'];
    
       $ctdh->save();
         return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thanhcong', 'Thêm thành công');
          
        }
      else if($rs['submit'] == "sua")
      {
      
        //    $this->validate($rs, [ 
        //   'id_sanpham' => 'numeric', 
        //   'tonggiatri' => 'numeric',
        //    'soluong' => 'numeric',
        // ],
        // [
        //   'id_sanpham.numeric'=>'id khách hàng phải là một số',
        //   'soluong.numeric'=>'Số lượng phải là một số',
        //    'tonggiatri.numeric'=>'tổng giá trị phải là một số',
        // ]);
           if($rs->id)
           {
          $ctdh= ctdh::where(['id_donhang'=>$rs['id_donhang'], 'id_SanPham'=>$rs['id_sanpham']])->update(['Gia'=>$rs['gia'] , 'SoLuong'=>$rs['soluong']]);
     //    $ctdh->=;
   		// $ctdh->Gia= ;
     //   $ctdh->SoLuong= ;
     //   $ctdh->save();
   // echo  $rs['id_sanpham'];
      return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thanhcong', 'Sửa thành công');
  }
  else {
  	    return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thongbao', 'chưa chọn đơn hàng');
  }
      }
       else if($rs['submit'] ==  "xoa")
       {
      		if($rs->id)
           {
         $ctdh= ctdh::where(['id_donhang'=>$rs['id_donhang'], 'id_SanPham'=>$rs['id_sanpham']])->delete();
          return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thanhcong', 'Xóa thành công');
      }
            else {
  	    return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thongbao', 'chưa chọn đơn hàng');
       }
    }
  }
}

}
