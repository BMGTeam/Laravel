 <?php $__env->startSection('noidung'); ?>
 <div class="card-content table-responsive">
 
   <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Trang chủ</a>
                          </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                    
                        <div class="col-md-6">
                
                            <div class="portlet light">
                           
                                     
            <div class="portlet-title">

                <div class="caption">
                    <span class="caption-subject bold uppercase">thông tin chi tiết đơn hàng </span>
                </div>

                
                <div class="inputs btn btn-default btn-circle btn-outline btn-sm view_all" style="padding: 5px;">Xem tất cả
                 
                </div>
            </div>
            
                    
                               <select class="form-control select2" id="xemdonhang" name="xemdonhang">
                                <option></option>
                                   <?php $__currentLoopData = $donhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tl->id); ?>"><?php echo e($tl->id); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </select>
              <div id="noidung">
                     <?php $__currentLoopData = $ctdh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                      <div class="portlet-body">
                          <div class="alert alert-block alert-info fade in">                  
                      <div class="todo-tasklist-item-title" style="padding-bottom:2px;">
                      <div class = 'row'>
                       <div class = 'col-md-8' style="padding: 0; margin:0;"> 
                      <div class="btn blue btn-outline btn-circle btn-sm pull-right ct" onclick="xemchitiet(<?php echo e($value->id_donhang); ?>,<?php echo e($value->id_SanPham); ?>)"> chi tiết <span class="fa fa-angle-right"></span> </div>
                     
                       <div class = 'key' style = "color: black">
                         <span style =" color: blue; font-size: 15px"><b>Số đơn hàng: <?php echo e($value->id_donhang); ?></b></span> <br>
                     <span style =" color: green; font-size: 17px">sản phẩm: <?php $tensanpham = App\sanpham::find($value->id_SanPham);
                      echo $tensanpham->TenSanPham; ?> <br> </span>
                     
                      Giá : <?php echo e($value->Gia); ?><br>
                       Số Lượng : <?php echo e($value->SoLuong); ?><br>
                      
                         </div>
                         </div>
             
                         </div>
                    </div>
                                    </div>
                    
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
              <?php echo $ctdh-> links(); ?>

                     </div>
                        
                    </div>
            </div>
                   <div class="col-md-6">
                   <div class="portlet light bordered">
                           
            <div class="portlet-title">
               <div class="pull-right">
              <div class = "btn btn-circle btn-icon-only btn-default" onclick="removeform()">
              <i class = "glyphicon glyphicon-plus"></i></div>
                   </div>
                <div class="caption">
                <i class = icon-pencil></i> <span class="caption-subject bold uppercase">Chi tiết đơn hàng</span>

                </div>
                </div>
                      <?php echo $__env->make('admin.check.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php if(session('thongbao')): ?>
                  <div class="alert alert-danger" id="fail"><?php echo e(session('thongbao')); ?><button class="close" data-close="alert"></button></div>
                <?php endif; ?>
                      <?php if(session('thanhcong')): ?>
                        <div class="alert alert-success" id='success'><?php echo e(session('thanhcong')); ?><button class="close" data-close="alert"></button></div>
                        <?php endif; ?>
      <div class = "row">
                <form action="admin/ctdh/postthemsuaxoa" method= "post" id="form" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>sai thông tin rồi! xem lại nào! </div>
                    
                     
                        <div class="form-group margin-top-20">
                                       <label class="control-label col-md-3">Số đơn hàng
                              <span class="required"> * </span>
                                       </label>
                            <div class="col-md-8">
                                        <select class="form-control select2" id="id_donhang" name="id_donhang" >
                                         
                                                 <?php $__currentLoopData = $donhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <option value="<?php echo e($dh->id); ?>"><?php echo e($dh->id); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                        </select>
                                    </div>
                                  </div>
              
                       
                             <div class="form-group margin-top-20">
                                       <label class="control-label col-md-3">Sản phẩm<span class="required"> * </span>
                                       </label>
                            <div class="col-md-8">
                                        <select class="form-control select2" id="id_sanpham" name="id_sanpham">
                                                 <?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <option value="<?php echo e($tl->id); ?>"><?php echo e($tl->TenSanPham); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                        </select>
                                    </div>
                                  </div>
              
                         <div class="form-group">
                            <label class="control-label col-md-3">Giá
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="gia" id="gia"/></div>
                            </div>
                        </div>
                      
                           <div class="form-group">
                            <label class="control-label col-md-3">Số lượng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                      <input type="text" class="form-control" name="soluong" id="soluong"/>
                                    </div>
                              <span id="errdate1" style="color:red"></span>
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
              </div>
          </div>
          </div>

<input type="hidden" name="id" id="id"/>
<?php 
  if(isset($_GET['page']))
    echo "<input type='hidden' name='page' value='".$_GET['page']."'/>";?>   
            
            </form>
          
                </div>

                    </div>
                   </div>

                   </div>     
                    </div> 
	                           
                              </div> 	

 
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
   // xem chi tiết:
$(document).ready(function() {
   // alert("hihi");
    
      // $('.ct').click(function()
      // {
      //   var b = $(this).attr('value');
      //   var a = $('.sp').attr('value');
      //   alert(b);
      //   alert(a);
      //
          
      //     // chạy về đầu trang:
      // });
      $("html, body").animate({
            scrollTop: 0,
           }, 600);
          return false;

      // });
   
 });
 </script>


 <script>
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

   });

 </script>

  <script>
// xem đơn hàng:
   $(document).ready(function() {
       $('#xemdonhang').change(function(){
        var b = $(this).val();
      $.get(('admin/ctdh/xemdonhang/'+ b), function(data)
      {
        $('#noidung').html(data);
      });
       });
      
  });

 </script>

  <script>
   function removeform()
   {
  
            $('#id_sanpham').val(null);
              $('#gia').val(null);
                 $('#tinhtrangctdh').val(null);
                  $('#ngaydathang').val('<?php echo date('Y-m-d'); ?>');
                 $('#ngaygiaohang').val('<?php echo date('Y-m-d'); ?>');
                  $('#id').val(0);
          $('#errdate').html('');
           $('#errdate1').html('');
   }
   var donhang, sanpham;
   function xemchitiet(donhang,sanpham)
   {
    var donhang, sanpham;
     // alert(donhang);
     // alert(sanpham);
      $.get(('admin/ctdh/chitiet/'+ donhang+"/"+sanpham), function(data)
      {
      
         var js = data;
         var js1 = JSON.parse(js);
          // $('#id_donhang').val(js1[0].id_donhang);
           $('#id_donhang').attr('value',js1[0].id_donhang);
            // $('#id_donhang').html('value',js1[0].id_donhang);
           $('#id').val(js1[0].id_donhang);
            $('#id_sanpham').val(js1[0].id_SanPham);
              $('#gia').val(js1[0].Gia);
                 $('#soluong').val(js1[0].SoLuong);
 
                });
   }  

 </script>

 
 <script>
    $(document).ready(function(){
    $('#form').validate({
        rules: {
          id_donhang: {
              required: true,
            
          },
          id_sanpham:{
             required: true,
           
          },
          gia:{
              required: true,
              number: true
          },
          soluong:{
             required: true,
              number: true
          },
        },
        messages: {
          // fullname: {
          //   required: 'Bạn phải nhập tên đầy đủ',
          //   maxlength: 'Tên không quá 100 kí tự',
          //   minlength: 'Tên ít nhất 4 kí tự',
          // },
        }
      });
  });
 </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.hihi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>