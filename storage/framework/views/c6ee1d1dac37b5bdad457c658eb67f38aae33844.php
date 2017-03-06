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
                    
                        <div class="col-md-5">
                
                            <div class="portlet light">
                           
                                     
            <div class="portlet-title">

                <div class="caption">
                    <span class="caption-subject bold uppercase">thông tin đơn hàng </span>
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
            
                    

                     <?php $__currentLoopData = $donhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                      <div class="portlet-body">
                               <div class="alert alert-block alert-info fade in">
                                            
                      <div class="todo-tasklist-item-title" style="padding-bottom:2px;">
                      <div class = 'row'>
                       <div class = 'col-md-8' style="padding: 0; margin:0;"> 
                      <div class="btn blue btn-outline btn-circle btn-sm pull-right ct" value='<?php echo e($value->id); ?>'>chi tiết <span class="fa fa-angle-right"></span></div>
                       <div class = 'key' style = "color: black">
                    
                              
                         <span style =" color: blue; font-size: 15px"><b>Số đơn hàng: <?php echo e($value->id); ?></b></span> <br>
                     <span style =" color: green; font-size: 17px"> Mã khách hàng:  <?php echo e($value->id_khachhang); ?> <br></span>
                      Tên khách hàng:  <?php $tenkhachhang = App\khachhang::find($value->id_khachhang);
                        echo $tenkhachhang->TenKH; ?> <br>
                      Ngày đặt:<?php echo e($value->ngaydathang); ?> <br>
                      Ngày giao:<?php echo e($value->ngaygiaohang); ?> <br>
                      Tổng giá trị : <?php echo e($value->tonggiatri); ?><br>
                       Tình Trạng:<?php
                      $ten_tinh_trang = App\tinhtrangdonhang::find($value->tinhtrangdonhang);
                       echo $ten_tinh_trang->TenTinhTrang;
                    ?><br>
                         </div>
                         </div>
             
                         </div>
                    </div>
                                    </div>
                    
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    


              <?php echo $donhang-> links(); ?>

                    
                        
                    </div>
            </div>
                   <div class="col-md-7">
                   <div class="portlet light bordered">
                           
            <div class="portlet-title">
               <div class="pull-right">
              <div class = "btn btn-circle btn-icon-only btn-default" onclick="removeform()">
              <i class = "glyphicon glyphicon-plus"></i></div>
                   <a id = 'hinh' class = "btn btn-circle btn-icon-only btn-default"><i class = "glyphicon glyphicon-picture"></i></a>
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
                <form action="admin/donhang/postthemsuaxoa" method= "post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> sai thông tin rồi! xem lại nào! </div>
                    
                            <div class="row">
                            
                              <div class= "col-md-7">
                                
                        <div class="form-group margin-top-20">
                                       <label class="control-label col-md-4">Mã khách hàng
                              <span class="required"> * </span>
                                       </label>
                            <div class="col-md-8">
                                        <select class="form-control select2" id="id_khachhang" name="id_khachhang" style="width:70%;">
                                                 <?php $__currentLoopData = $khachhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <option value="<?php echo e($kh->id); ?>"><?php echo e($kh->id); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                        </select>
                                    </div>
                                  </div>
              
                       
                             <div class="form-group margin-top-20">
                                       <label class="control-label col-md-4">Tình trạng đơn hàng  <span class="required"> * </span>

                                       </label>
                            <div class="col-md-8">
                                        <select class="form-control select2" id="tinhtrang" name="tinhtrangdonhang" style="width:70%;">
                                                 <?php $__currentLoopData = $tinhtrangdonhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <option value="<?php echo e($tl->id); ?>"><?php echo e($tl->TenTinhTrang); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                        </select>
                                    </div>
                                  </div>
              
                         <div class="form-group">
                            <label class="control-label col-md-4">Tổng giá trị
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="tonggiatri" id="tonggiatri"/> </div>
                            </div>
                        </div>
                      
                           <div class="form-group">
                            <label class="control-label col-md-4">Ngày đặt hàng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type='date' class='form-control'  name='ngaydathang' id='ngaydathang' value= '<?php echo date('Y-m-d'); ?>' />
                                    </div>
                              <span id="errdate1" style="color:red"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-4">Ngày giao hàng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type='date' class='form-control'  name='ngaygiaohang' id='ngaygiaohang' value='<?php echo date('Y-m-d'); ?>' />
                                    </div>
                                     <span id="errdate" style="color:red"></span>
                            
                            </div>
                        </div>
                            
                       
     
         
   
                              </div>
                              
                              

  <div class="col-md-5">
        Thông tin bổ sung abcd...
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
      $('.ct').click(function()
      {
        var b = $(this).attr('value');
      $.get(('admin/donhang/chitietdonhang/'+ b), function(data)
      {
         var js = data;
         var js1 = JSON.parse(js);
            $('#id_khachhang').val(js1.id_khachhang);
              $('#tonggiatri').val(js1.tonggiatri);
                 $('#tinhtrangdonhang').val(js1.tinhtrangdonhang);
                  $('#ngaydathang').val(js1.ngaydathang);
                 $('#ngaygiaohang').val(js1.ngaygiaohang);
                  $('#id').val(js1.id)
          
          // chạy về đầu trang:
      });
      $("html, body").animate({
            scrollTop: 0,
           }, 600);
          return false;

      });
   
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
  //kiểm tra tên
   $(document).ready(function() {
      $('#ngaygiaohang').blur(function(){
          var ngaygiao = $(this).val();
          var ngaydat =  $('#ngaydathang').val();

          $.get(('admin/donhang/checkngay/'+ ngaydat + '/' + ngaygiao), function(data)
          {
            
            if(data != 1)
            {
              $('#errdate').html("");
              $('#errdate').html('Ngày giao hàng phải lớn hơn ngày đặt hàng');
            }
            else
               $('#errdate').html("");

          });

        });

       $('#ngaydathang').blur(function(){
          var ngaydat= $(this).val();
          var ngaygiao = $('#ngaygiaohang').val();
          $.get(('admin/donhang/checkngay/'+ ngaydat + '/' + ngaygiao), function(data)
          {
            
            if(data != 1)
            {
              $('#errdate1').html("");
              $('#errdate1').html('Ngày giao hàng phải lớn hơn ngày đặt hàng');
            }
            else
               $('#errdate1').html("");

          });

          });
  });

 </script>

  <script>
   function removeform()
   {
  
            $('#id_khachhang').val(null);
              $('#tonggiatri').val(null);
                 $('#tinhtrangdonhang').val(null);
                  $('#ngaydathang').val('<?php echo date('Y-m-d'); ?>');
                 $('#ngaygiaohang').val('<?php echo date('Y-m-d'); ?>');
                  $('#id').val(0);
          $('#errdate').html('');
           $('#errdate1').html('');
   }

 </script>

 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.hihi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>