 <?php $__env->startSection('noidung'); ?>
 <style>
 .delete{
  background:rgba(240,50,60,0.7);
  position: relative;
  z-index: 100;
  text-align: center;
  bottom: 60px;
   overflow: hidden;
color: white;
 }  
 </style>
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
                        Thêm
                  <form action="admin/sanpham/themhinh" method= "post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                <input type="hidden" name="id_sanpham" value="<?php echo e($id_sanpham); ?>" />
                        <div class="form-body">
								            <div class="form-group margin-top-20">
                            <div class="col-md-2 col-xs-3" style="text-align: center;">
                      		 		<label class="control-label uppercase"><b>sản phẩm:</b></label>
                              </div>
                    
         					  		     <div class="col-md-5 col-xs-5">
         					  		
                       				 <select class="form-control select2" id="sanpham" name="sanpham" style="width:70%;">
                       				
	                                 <?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                  <option value="<?php echo e($tl->id); ?>"><?php echo e($tl->TenSanPham); ?></a></option>
                                  	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  	 </select>
                                  	</div>
                                   <div class="col-md-3 col-xs-3">
                                    <button type = 'button' class="btn green-haze btn-outline sbold uppercase" id="chitiet">chi tiết</button>
                                    <a href="admin/sanpham/danhsach"  class="btn green-haze btn-outline sbold uppercase" id="">Quay lại</a>
                                     </div>
                                     </div>

        <div class="form-group" id="upload" style="margin-left: 30%;">
          <div class="fileinput fileinput-new" data-provides="fileinput">
               <div class="fileinput fileinput-new" data-provides="fileinput">
              <div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height:150px;"> </div>
              <div>
                  <span class="btn green-haze btn-outline sbold uppercase btn-file">
                      <span class="fileinput-new"> Thêm hình </span>
                      <span class="fileinput-exists" >Chọn lại</span>
                      <input type="file" name="image" id="image">  </span>
                     <input type="submit" class="btn green-haze btn-outline sbold uppercase fileinput-exists" name="them" id="them" value="Thêm">
                  <a href="javascript:;" class="btn green-haze btn-outline sbold uppercase fileinput-exists" data-dismiss="fileinput"> Xóa </a>
              </div>
          </div>
        </div>
        </div>
        </div>
         <div class="row"> 

	         <?php $__currentLoopData = $hinh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="col-md-3" style= "margin-top:20px">
                    <div  ><a href="img\sanpham\anh\<?php echo e($value->anh); ?>" class="fancybox-button" data-rel="fancybox-button"><img id="img" class= "img-rounded img-responsive " width=100% src="img\sanpham\anh\<?php echo e($value->anh); ?>"></a>  
                    <div class="delete"> <a  class= "btn" style="color:white" href="admin/sanpham/xoahinh/<?php echo e($id_sanpham); ?>/<?php echo e($value->id); ?>">delete</a></div>

                   </div>
                   </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
</div>
               </form>
                   
               <div id="image-box" class="image display-none" style="text-align:center;">
                <img id="large-image" src="" style="max-width:100%;max-height:500px;display:inline-block;">
            </div> 
              
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
     $(document).ready(function(){
        $('#image').change(function () {
          alert('ahihi');
        // $('#load').show();

    //     $('#upload').hide();
    //     $.ajax({
    //         type: 'POST',
    //         url: 'admin/sanpham/themhinh',
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: function (data) {
    //             // $('#load').hide();
    //             console.log("success");
    //             if (data != 'false')
    //                 console.log(data)
    //             $("#large-image").attr('src', 'img/sanpham/anh/' + data).Jcrop({}, function () {
    //   jcrop_api = this;
    //   $('.modal-dialog').animate({width: ($('#large-image').width() + 50)});
    //   });
    //             $('.image').show();
    //             if (data == 'false')
    //                 $('#upload').show();
    //             // $('.error').show();
    //             jcrop_api.destroy()

    //         },
    //         error: function (data) {
    //             // $('#load').hide();
    //             console.log("error");
    //             console.log(data);
    //         }
    //     });
    // });

    // $('#myModal').on('hidden.bs.modal', function () {
    //     $('.error').hide();
    //     $('.upload-container').show();
    //     $('.image').hide();
    //     $('#profile-image-upload').trigger("reset");
    // })

    // $('.close-button').on('click', function () {
    //     $('.error').hide();
    //     $('.upload-container').show();
    //     $('.image').hide();
    //     $('#profile-image-upload').trigger("reset");
    // });
     });
  </script>
 <?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.hihi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>