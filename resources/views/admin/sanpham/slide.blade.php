@extends('admin.layouts.hihi')
@section('scripthead')

@endsection
 @section('noidung')
 <div class="card-content table-responsive">
 {{-- basic --}}
   <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="sanpham/dssanpham.html">Trang chủ</a>
                          </li>
                          <li>/slide</li>
 					</ul>
 			<div class="row">
                    {{-- ds san pham --}}
                        <div class="col-md-5">
                
                            <div class="portlet light">
                           
                                     {{-- <div class="portlet light bordered" style = "padding-bottom: 0px;"> --}}
            <div class="portlet-title">

                <div class="caption">
                    <span class="caption-subject bold uppercase">thông tin sản phẩm </span>
                </div>

                <div class="inputs">
                    <div class="portlet-input input-inline input-small">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input type="text" class="form-control form-control-solid input-circle" onkeyup="Search(this)" placeholder="Tìm...">
                        </div>
                    </div>
                </div>
                <div class="inputs" style="margin-right:0px;">
                    <a href="/MCC/Merchant_Product/Create" target="newwindow" class="btn btn-default btn-circle btn-outline btn-sm">Tạo</a>
                </div>
            </div>
            {{--  </div> --}}
                    {{-- nội dung1 --}}
                     @foreach($sanphamnoibat as $value)  
                      <div class="portlet-body">
                      <div class="alert alert-block alert-info fade in">         
                      <div class="todo-tasklist-item-title" style="padding-bottom:2px;">
                      <div class = 'row'>
                        <div class = 'col-md-3'>
                               @if($value->AnhDaiDien != "")
                                <img src="img/sanphamnoibat/{{$value->AnhDaiDien}}" width="400px" class="img-responsive" alt=""> 
                                @else
                                  <img src="{{asset('img/rong.jpg')}}" width="400px" class="img-responsive" alt="">
                              @endif
                        </div>
                       <div class = 'col-md-8' style="padding: 0; margin:0;"> 
                      <div class="btn blue btn-outline btn-circle btn-sm pull-right ct" value='{{$value->id}}'>chi tiết <span class="fa fa-angle-right"></span></div>
                        {{-- <div class="btn blue btn-outline btn-circle btn-sm pull-right ct" value='{{$value->id_sanpham}}'>ct sản phẩm<span class="fa fa-angle-right"></span></div> --}}

                         <div class = 'key' style = "color: black">

                         <a><span style ="color: blue; font-size: 15px" class="ct_sanpham" value="{{$value->id_sanpham}}"><b>id sản phẩm: {{$value->id_sanpham}}</b></span> <br></a>
                         Tên Sản phẩm: <span class="ten_san_pham"></span><br>
                         Loại nổi bật: <span class="loainoibat" value="{{$value->id_loainoibat}}"></span><br>
                         Ngày đăng: {{$value->ngaydang}} <br>
                         Tiêu đề: {{$value->tieude}}<br>
                         Mô tả: {{$value->mota}}<br>
                         </div>
             </div>
                         </div>
                    </div>
                      </div>
                    
                            </div>
                    @endforeach
                    {{-- end nội dung 1 --}}


              {!! $sanphamnoibat-> links()!!}
                    
                        {{-- </div> --}}
                    </div>
            </div>
                   <div class="col-md-7">
                   <div class="portlet light bordered">
                           
            <div class="portlet-title">
               <div class="pull-right">
              <div class = "btn btn-circle btn-icon-only btn-default" onclick="removeform()">
              <i class = "glyphicon glyphicon-plus"></i></div>
                   <a id = 'picture' class = "btn btn-circle btn-icon-only btn-default"><i class = "glyphicon glyphicon-picture"></i></a>
                   </div>
                <div class="caption">
                <i class = icon-pencil></i> <span class="caption-subject bold uppercase">Chỉnh sửa thông tin sản phẩm</span>

                </div>
                </div>
                      @include('admin.check.error')
                @if(session('thongbao'))
                  <div class="alert alert-danger" id="fail">{{session('thongbao')}}<button class="close" data-close="alert"></button></div>
                @endif
                      @if (session('thanhcong'))
                        <div class="alert alert-success" id='success'>{{session('thanhcong')}}<button class="close" data-close="alert"></button></div>
                        @endif
<div class = "row">
                <form action="admin/sanphamnoibat/postthemsuaxoa" method= "post" id="formsp" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> sai thông tin rồi! xem lại nào! </div>
                            <div class="row">
                            {{-- thông tin --}}
                              <div class= "col-md-7">
                               
                             <div class="form-group margin-top-20">
                                       <label class="control-label col-md-4">sản phẩm
                                         <span class="required"> * </span>
                                       </label>
                            <div class="col-md-8">
                                        <select class="form-control select2" id="id_sanpham" name="id_sanpham" style="width:70%;">
                                                 @foreach($sanpham as $tl)
                                               <option value="{{$tl->id}}" id="id_sp">{{$tl->TenSanPham}}</option>
                                                   @endforeach
                                        </select>
                                        <span id="errmasp" style="color:red"></span>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                            <label class="control-label col-md-4">Ngày đăng
                                <span class="required"> * </span>
                            </label>
                          <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type='date' class='form-control'  name='ngaydang' id='ngaydang' value= '<?php echo date('Y-m-d'); ?>' />
                                    </div>
                            
                            </div>
            
                        </div>
                                   
                                      <div class="form-group margin-top-20">
                                       <label class="control-label col-md-4">Tiêu đề </label>
                                    <div class="col-md-8">
                                       <textarea name="tieude" id="tieude" rows='3' style="width: 100%;"></textarea>
                                    </div>
                                  </div>
                                 <div class="form-group margin-top-20">
                                       <label class="control-label col-md-4">Mô tả </label>
                                    <div class="col-md-8">
                                       <textarea name="mota" id="mota" rows='5' style="width: 100%;"></textarea>
                                    </div>
                                  </div>
                                 
                              </div>
                              {{-- end thông tin --}}
                              {{-- hình --}}

  <div class="col-md-5">
  <div class="form-group">
          <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail" style="width:200px;height:150px">
                  <img src="img/cat.jpg" id="img" alt="Chưa có hình" /> </div>
              <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height:150px;"> </div>
              <div>
                  <span class="btn default btn-file">
                      <span class="fileinput-new"> Select image </span>
                      <span class="fileinput-exists" > Change </span>
                      <input type="file" name="image" id="image"> </span>
                  <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
              </div>
          </div>
        </div>
        <input type="hidden" name="id" id="id"/>
        </div>
                            </div>
                    
        </div>

                     <div class="form-actions">
          <div class="row">
              <div class="col-md-offset-3 col-md-9">
                   <button type="submit" id="sua" class="btn blue">Sửa</button>
                  <button type="submit" id="them" class="btn green">Lưu mới</button>
                  <button type="submit" class="btn red" id="xoa">Xóa</button>
                  <input type="hidden" name="submit" id="submit"/>
                  <input type="hidden" name="slide" id="slide" value="slide"/>
                  <input type="hidden"  id="id_loainoibat" name="id_loainoibat" value="4" />
              </div>
          </div>
          </div>


<?php 
  if(isset($_GET['page']))
    echo "<input type='hidden' name='page' value='".$_GET['page']."'/>";?>   
            
            </form>
          
                </div>
                {{-- modal --}}
                 <div class="modal fade" id="myModal">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title" id="myModalLabel"> Chi tiết sản phẩm</h4>
                   </div>
                    <div class="modal-body">
                      Tên Sản Phẩm: <span id="tensanpham" class="font-15-blue"></span><br>
                     Mã Sản Phẩm: <span id="masanpham" class="font-15-blue"></span><br>
                      Loại sản phẩm: <span id="loaisp" class="font-15-blue"></span> <br>
                      Ngày nhập:<span id="ngaynhap" class="font-15-blue"></span><br>
                       Giá Bán: <span id="giaban" class="font-15-blue"></span><br>
                       Giá Mua:<span id="giamua" class="font-15-blue"></span><br>
                       Tình Trạng:<span id="tinhtrang" class="font-15-blue"></span> <br>
                     Số lượng hiện có: <span id="slhienco" class="font-15-blue"></span><br>
                      Nước sản xuất:<span id="nuocsx" class="font-15-blue"></span><br>
                    Xếp hạng:<span id="xephang" class="font-15-blue"></span><br>
                  </div>
</div>
        </div>
        </div>
        {{-- end modal --}}
   </div>
 </div>
 </div>
</div>
</div>
</div>
@endsection
@section('script')
 <script>
  $(window).load(function() {
        $('.ct_sanpham').each(function(value){
       $.get(('admin/sanphamnoibat/showname/'+$(this).attr('value')), function(data){
             var js1 = JSON.parse(data);
            $('.ten_san_pham').eq(value).html(js1.TenSanPham)
             // alert( classes);
      });
     });
         $('.loainoibat').each(function(value){
       $.get(('admin/sanphamnoibat/shownameloainoibat/'+$(this).attr('value')), function(data){
             var js1 = JSON.parse(data);
          $('.loainoibat').eq(value).html(js1.ten)
    });
     });
       });
      
   $(document).ready(function() {

      $('#them').click(function() {
        $('#submit').attr({"value":"them"}) ;
      });
      $('#sua').click(function() {
        $('#submit').attr({"value":"sua"});
      });
      $('#xoa').click(function() {
        $('#submit').attr({"value":"xoa"});
      });
      // hiện modal
      $('.ct_sanpham').click(function(){
        var id = $(this).attr('value'); 
         $.get(('admin/sanphamnoibat/xemchitiet/'+id), function(data){
             var js = data;
             var js1 = JSON.parse(js);
          $('#tensanpham').html(js1.TenSanPham);
            $('#masanpham').html(js1.MaSanPham);
              $('#giavon').html(js1.GiaVon);
              $('#giaban').html(js1.GiaBan);
              $('#loaisp').html(js1.loaisp);
              $('#tinhtrang').html(js1.id_TinhTrang);
              $('#ngaynhap').html(js1.NgayNhap);
              $('#slhienco').html(js1.SoLuongHienCo);
               $('#nuocsx').html(js1.id_nuocsx);
               $('#xephang').html(js1.xephang);
               $('#myModal').modal();
         });
      });
      $('.ct').click(function()
      {
        var b = $(this).attr('value');
        $('#errmasp').html('');
      $.get(('admin/sanphamnoibat/chitietsanpham/'+ b), function(data)
      {
         var js1 = JSON.parse(data);
          $('#id_sanpham').val(js1.id_sanpham);
          $('#id_loainoibat').val(js1.id_loainoibat);
          $('#mota').val(js1.mota);
           $('#tieude').val(js1.tieude);
            $('#ngaydang').val(js1.ngaydang);
                if(js1.AnhDaiDien != null)
                   $('#img').attr('src', 'img/sanphamnoibat/'+js1.AnhDaiDien);
            if(js1.AnhDaiDien == null || js1.AnhDaiDien == "")
                   $('#img').attr('src', 'img/cat.jpg');
            $('#id').val(js1.id)
            $('#picture').attr('href', 'admin/sanpham/hinhanh/'+js1.id_sanpham);
          // chạy về đầu trang:
      });
    });
      $("html, body").animate({
            scrollTop: 0,
           }, 600);
          return false;

      });

 </script>
   <script>
   // kiểm tra sp tồn tại:
   //  $('#id_sanpham').change(function(){
   //        var name = $(this).val();
   //        $.get(('admin/sanphamnoibat/checkmasanpham/'+ name), function(data)
   //        {
   //          if(data != "")
   //          {
   //            $('#errmasp').html("");
   //            $('#errmasp').html('sản phẩm đã tồn tại')
   //          }
   //          else
   //             $('#errmasp').html("");

   //        });
   // });

   function removeform()
   {
     $('#id_sanpham').val(null);
          $('#id_loainoibat').val(null);
          $('#mota').val(null);
           $('#tieude').val(null);
            $('#ngaydang').val('<?php echo date('Y-m-d');?>');
            $('#img').attr('src', 'img/profile/noimg.jpg');
          $('#id').val(null);
           $('#errmasp').html('');
   }

 </script>
 @endsection
