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
 .anh:hover{
  box-shadow: 3px 3px 10px rgb(119, 124, 124);
  transition: all 0.7s;
  transform: scale(1.0002, 1.0002);

 } 
 </style>
  <div class="page-content-wrapper">
      <div class="page-content">
         <div class="row">
               <div class="portlet light form-fit bordered">
                   <div class="portlet-title">
                      <div class="caption">
                        <i class="icon-social-dribbble font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Chi tiết hình ảnh sản phẩm</span>
                       </div>
                    </div>

    
          <?php if(session('thongbao')): ?>
                  <div class="alert alert-danger" id="fail"><?php echo e(session('thongbao')); ?> <button class="close" data-close="alert"></button></div>
                <?php endif; ?>
                      <?php if(session('thanhcong')): ?>
                        <div class="alert alert-success" id='success'><?php echo e(session('thanhcong')); ?><button class="close" data-close="alert"></button></div>
                        <?php endif; ?>
                        <div class="row"  style= "text-align: center;">
                            <div>
                                   <button type = 'button' class="btn green-haze btn-outline sbold uppercase" id="themhinh">Thêm hình</button>
                            <a href="admin/sanpham/danhsach"  class="btn green-haze btn-outline sbold uppercase" id="">Quay lại</a>
                                  
                                       </div>
          
            <div class="modal fade" id="myModal">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title" id="myModalLabel">Upload Profile Picture</h4>
                   </div>
                    <div class="modal-body">
                  
                  <div class="upload">
                        <form method= "post" id="form_image" enctype="multipart/form-data" onsubmit="submit()">
                           <input type="hidden" name="id_sanpham" value="<?php echo e($id_sanpham); ?>" /> 
                           <input type="hidden" id='token' name="_token" value="<?php echo csrf_token(); ?>"/>
                              <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div>
                                    <span class="btn green-haze btn-outline sbold uppercase btn-file" style="margin-left:18%;">
                                   <input type="file" name="image" id="image"> Chọn hình </span>
                                </div>
                               </div>
                          </div>
                  </form>
                    </div>
                         <div id="image-box" class="image display-none" style="text-align:center;">
                          <img id="large-image" src="img/sanpham/anh/giaycao.jpg" style=" text-align:center;width:100%;max-height:500px;display:inline-block;">
                         </div>
                  </div>

                   <div class="modal-footer">
                      <button type="button" class="btn btn-default close-button" data-dismiss="modal">Close</button>
                      <button type="button" class="btn green-haze btn-outline sbold uppercase">Thêm</button>
                  </div>
</div>
     
        </div>
        </div>
        </div>
    
        <div class="row">
            <?php $__currentLoopData = $hinh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="col-md-3" style= "margin-top:20px">
                    <div  ><a href="img\sanpham\anh\<?php echo e($value->anh); ?>" class="fancybox-button" data-rel="fancybox-button"><img id="img" class= "anh img-rounded img-responsive " width=100% src="img\sanpham\anh\<?php echo e($value->anh); ?>"></a>  
                <div class="delete" id="delete"> <a  class= "btn" style="color:white" href="admin/sanpham/xoahinh/<?php echo e($id_sanpham); ?>/<?php echo e($value->id); ?>">delete</a>
             
                    </div>
                   </div>
                   </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                $('#myModal').modal();
        //          
            });
              $('#image').change(function(){
                  // var formData = new FormData($('#form_image')[0]);
                // $('.upload').css('display', 'none');
                // $.post(('admin/sanpham/themhinh'), $(this).serialize(), function(data){
                //      alert(data);
                // });
 // 
                  // $('#form_image').submit();
                  $.ajax({
                        method: "POST", 
                        url: 'admin/sanpham/themhinh',
                        data:$('#form_image').serialize(),
                        success: function (data) {
                            alert(data);
                            if (data != 'false')
                                console.log(data)
                            $("#large-image").attr('src', 'img/sanpham/anh/' + data['filename']);
                            $('#image-box').css('display', 'block');
                            if (data == 'false')
                                $('.upload').show();
                        },
                        error: function (data) {
                            console.log("error");
                            console.log(data);
                        }
                     });
                });
              });   
  </script>
  
  <script>
      $('.anh').hover(function(){
           // $('.anh').css('boder','1px red');
      })
  </script>
 <?php $__env->stopSection(); ?>
   
<?php echo $__env->make('admin.layouts.hihi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>