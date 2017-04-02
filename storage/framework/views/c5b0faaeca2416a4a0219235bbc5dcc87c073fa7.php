 <?php $__env->startSection('noidung'); ?>
  <style>
 .delete{
  background:rgba(240,50,60,0.7);
  position: relative;
  z-index: 1;
  text-align: center;
  bottom: 60px;
   overflow: hidden;
  color: white;
  display: none;
 } 
.image_dt:hover .delete{
  display: block;
}
 .anh:hover{
  box-shadow: 3px 3px 10px rgb(119, 124, 124);
  transition: all 0.7s;
  transform: scale(1.0002, 1.0002);

 } 
/* The Modal (background) */

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
      z-index: 4;
}
.modal-body{
 overflow: auto;
 padding: 10px;
}
/* Add Animation - Zoom in the Modal */
.modal-content{ 
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}
@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}
@keyframes  zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}
#image{
  min-height:  250px;
  min-width: 250px;
 height: 100%;
 width: 100%;
}
/* The Close Button */
/*  #myModal {
  position: absolute;
  background: black;
  width: 300px;
  height: 300px;
  display: none;
} */
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

    
          <?php if(isset($err)): ?>
          <div class="alert alert-danger" id="fail">
           <?php $__currentLoopData = $err; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php echo e($vl); ?>

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button class="close" data-close="alert"></button></div>
              
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
                             <h4 class="modal-title" id="myModalLabel">Upload Picture</h4>
                   </div>
                    <div class="modal-body">
                  
                  <div class="upload">
                        <form method= "post" id="form_image" action="admin/sanpham/themhinh" enctype="multipart/form-data" onsubmit="submit()">
                              <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div style="text-align: center;">
                                   <span class="btn green-haze btn-outline sbold uppercase btn-file ">
                                  <span class="fileinput-new">Chọn hình</span>
                                  <span class="fileinput-exists" > Thay đổi </span>
                                  <input type="file" name="image_detail" id="image_detail"> </span>
                                  <button type="button" id="add" class="btn green-haze btn-outline sbold uppercase fileinput-exists">Thêm</button>
                                </div>

                                <div class="preview">
                                <div class="fileinput-preview fileinput-exists thumbnail" id="image" style=" text-align:center;width:100%;max-height:500px;"> </div>
                               </div>
                               </div>
                          </div>
                          <input type="hidden" name="id_sanpham" value="<?php echo e($id_sanpham); ?>" /> 
                           <input type="hidden" id='token' name="_token" value="<?php echo csrf_token(); ?>"/>
                            <input type= "hidden" id="x"  name = "x"/>
                                <input type= "hidden" id="y" name = "y"/>
                                 <input type= "hidden" id="w" name = "w"/>
                                 <input type= "hidden" id="h" name = "h"/>
                  </form>
                    </div>
                       
                  </div>

                   <div class="modal-footer">
                      <button type="button" class="btn btn-default close-button fileinput-exists" data-dismiss="modal">Close</button>
                    
                  </div>
</div>
     
        </div>
        </div>
        </div>
    
        <div class="row">
            <?php $__currentLoopData = $hinh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-md-3" style= "margin-top:20px">
                    <div class="image_dt"><a href="img\sanpham\anh\<?php echo e($value->anh); ?>" class="fancybox-button" data-rel="fancybox-button"><img id="img" class= "anh img-rounded img-responsive " width=100% src="img\sanpham\anh\<?php echo e($value->anh); ?>"></a>  
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
                // $('#myModal').modal('show');
                 $('#myModal').modal()
            });
              $('#image_detail').change(function(){
                  // $.post(('admin/sanpham/themhinh'), $(this).serialize(), function(data){
                //      alert(data);
                // });
 //           
             
                 var file = this.files[0];
                   $('#image').Jcrop({
                    trueSize: [$('#image').naturalWidth,$('#image').naturalHeight],
                    onSelect: getcroparea,
                    aspectRatio: 1,
                    setSelect: [80, 45, 100, 100]
                  });
                   }); 
                 // $('#image-box').css('display', 'block');
               // $('#form_image').serialize()
                  $('#add').click(function(){
                    $('#form_image').submit();
                    // sử dụng ajax
                  //      var formData = new FormData($('#form_image')[0],$('#form_image')[1],$('#form_image')[2]);
                  //      $.ajax({
                  //       method: "POST", 
                  //       url: 'admin/sanpham/themhinh',
                  //       data: formData,
                  //       processData: false,
                  //       contentType: false ,
                  //       success: function (data) {
                  //          $('#myModal').modal('hide');
                  //           // if (data != 'false')
                  //           //     $("#large-image").attr('src', 'img/sanpham/anh/' + data);
  
                  //           // $('#image-box').css('display', 'block');
                  //           // if (data == 'false')
                  //           //     $('.upload').show();
                  //       },
                  //       error: function (data) {
                  //           console.log("error");
                  //           console.log(data);
                  //       }
                  //    });
                  });
                 
                 
                   function getcroparea(c) {
                        $('#x').val(c.x);
                        $('#y').val(c.y);
                        $('#w').val(c.w);
                        $('#h').val(c.h);
                  };
                });
                       

                
  </script>
  
  <script>
      $('.anh').hover(function(){
           // $('.anh').css('boder','1px red');
      })
  </script>
 <?php $__env->stopSection(); ?>
   
<?php echo $__env->make('admin.layouts.hihi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>