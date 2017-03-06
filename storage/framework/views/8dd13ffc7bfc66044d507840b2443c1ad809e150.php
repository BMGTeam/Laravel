 <?php $__env->startSection('noidung'); ?>
 <div class="page-content-wrapper">
         
                <div class="page-content">
        <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light form-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Chi tiết hình ảnh sản phẩm</span>
                                    </div>
                                  
                                </div>
                                <div class="portlet-body form">
        
          
             <!-- BEGIN FORM-->
                    <?php if(session('thongbao')): ?>
                  <div class="alert alert-danger" id="fail"><?php echo e(session('thongbao')); ?> <button class="close" data-close="alert"></button></div>
                <?php endif; ?>
                      <?php if(session('thanhcong')): ?>
                        <div class="alert alert-success" id='success'><?php echo e(session('thanhcong')); ?><button class="close" data-close="alert"></button></div>
                        <?php endif; ?>
                  <form action="admin/sanpham/themhinh" method= "post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                <input type="hidden" name="id_sanpham" value="<?php echo e($id_sanpham); ?>" />
                        <div class="form-body">
								<div class="form-group margin-top-20">
                            <div class="col-md-2 col-xs-3" style="text-align: center;">
                      		 		<label class="control-label uppercase"><b>sản phẩm:</b></label>
                              </div>
                             <a href ="admin/sanpham/hinhanh/2"> <select>
                               <a href ="admin/sanpham/hinhanh/2"> <option value="">hihi</option>
                                </a>
                              <option value="">kk</option>
                                
                              </select>
                              </a>
         					  		 <div class="col-md-5 col-xs-5">
         					  		
                       				 <select class="form-control select2" id="sanpham" name="sanpham" style="width:70%;">
                       				
	                                 <?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                  <option value="<?php echo e($tl->id); ?>"><?php echo e($tl->TenSanPham); ?></a></option>
                                  	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  	 </select>
                                  	</div>
                                   <div class="col-md-3 col-xs-3">
                                    <button type = 'button' class="btn green-haze btn-outline sbold uppercase" id="chitiet">chi tiết</button>
                                   <button type = 'button' class="btn green-haze btn-outline sbold uppercase" id="themhinh">Thêm hình</button>
                            <a href="admin/sanpham/danhsach"  class="btn green-haze btn-outline sbold uppercase" id="">Quay lại</a>
                                  
                                         
                                     </div>
                                     </div>


                      <div class="form-group" id="addform" style="margin: 0 40%; display: none;">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width:200px;height:150px">
                                <img src="img/cat.jpg" id="img" alt="Chưa có hình" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height:150px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists" > Thay đổi </span>
                                    <input type="file" name="uphinh" id="uphinh"> </span>
                  
                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Xóa</a>
                                <input type="submit"  class="btn default  fileinput-exists" name="submit" id="submit" value="Thêm"> </span>
                            </div>
                        </div>
        </div>
         <div class="row"> 

	         <?php $__currentLoopData = $hinh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-3" style= "margin-top:20px"><img class= "img-rounded" height="250px" src="img\sanpham\anh\<?php echo e($value->anh); ?>"> </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
</div>
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
    $(document).ready(function(){
    $('#themhinh').click(function(){
       $('#addform').css('display', 'block');
    });

     $('#themhinh').dblclick(function(){
         $('#addform').css('display', 'none');
      });

    $('#sanpham').change(function(){
        var a = $(this).val();
        <?php header('Location: admin/sanpham/danhsach'); ?>
      
    });
  });
  </script>

     <script>

  </script>
 <?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.hihi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>