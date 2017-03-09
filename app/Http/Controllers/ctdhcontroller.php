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
    	// $ctdh = ctdh::paginate(4);
    	
    	return view('admin.ctdh.danhsach', ['sanpham' => $sanpham,'ctdh' => $ctdh]);
    }
    public function chitiet($id)
    {
    	$ctdh = ctdh::where('id_donhang', $id)->get()->toJson();
    	echo $ctdh;
    }
    public function postthemsuaxoa(Request $rs)
    {
      if($rs->has('submit'))
      {
        if($rs['submit'] == "them")
        {
         $this->validate($rs, [ 
          'id_sanpham' => 'numeric|required', 
 			'tonggiatri' => 'numeric',
 			'tinhtrangctdh'=>'required'
        ],
        [
       	 'id_sanpham.required'=>'phải có khách hàng',
          'id_sanpham.numeric'=>'id khách hàng phải là một số',
           'id_sanpham.required'=>'phải có tình trạng đơn hàng',
          'tonggiatri.numeric'=>'tổng giá trị phải là một số',
        ]);
        $ctdh= new ctdh();

        $ctdh->id_sanpham= $rs['id_sanpham'];
   		$ctdh->tinhtrangctdh= $rs['tinhtrangctdh'];
       $ctdh->ngaydathang = $rs['ngaydathang'];
       $ctdh->ngaygiaohang = $rs['ngaygiaohang'];
        $ctdh->tonggiatri = $rs['tonggiatri'];
       $ctdh->save();
         return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thanhcong', 'Thêm thành công');
          
        }
      else if($rs['submit'] == "sua")
      {
      	echo "sua";
           $this->validate($rs, [ 
          'id_sanpham' => 'numeric', 
          'tonggiatri' => 'numeric',
           'soluong' => 'numeric',
        ],
        [
          'id_sanpham.numeric'=>'id khách hàng phải là một số',
          'soluong.numeric'=>'Số lượng phải là một số',
           'tonggiatri.numeric'=>'tổng giá trị phải là một số',
        ]);
           if($rs->has['id'])
           {
       $ctdh= ctdh::find($rs->id);
        $ctdh->id_sanpham= $rs['id_sanpham'];
   		$ctdh->tinhtrangctdh= $rs['tinhtrangctdh'];
       $ctdh->ngaydathang = $rs['ngaydathang'];
       $ctdh->ngaygiaohang = $rs['ngaygiaohang'];
        $ctdh->tonggiatri = $rs['tonggiatri'];
       $ctdh->save();
   
      return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thanhcong', 'Sửa thành công');
  }
  else {
  	    return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thongbao', 'chưa chọn đơn hàng');
  }
      }
       else if($rs['submit'] ==  "xoa")
       {
      		if($rs->has['id'])
           {
         $ctdh= ctdh::destroy($rs->id);
          return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thanhcong', 'Xóa thành công');
      }
            else {
  	    return redirect('admin/ctdh/danhsach?page='.$rs['page'])->with('thongbao', 'chưa chọn đơn hàng');
       }
    }
  }
}
public function chitietctdh($id)
    {
        $dh = ctdh::find($id)->toJson();
        echo $dh;
       
}
}
