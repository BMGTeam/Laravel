  
 <?php $__env->startSection('noidung'); ?>
 <div class="card-content table-responsive">
 
   <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">
                    <!-- BEGIN PAGE BREADCRUMB -->
                 
                
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                    
                        <div class="col-md-5">
                
                           
                      <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject sbold uppercase">cây phân cấp</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body ">
                                    <div class="dd" id="nestable_list_1">
                                        <ol class="dd-list">
                                                 <?php $__currentLoopData = $catest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cateone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="dd-item">
                                                <div class="dd-handle ct" style="color:red; font-weight: bold" title="<?php echo e($cateone->id); ?>"><?php echo e($cateone->TenLoai); ?></div>
                                                <ol class="dd-list">

                                                     <?php $__currentLoopData = $catend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catetwo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <?php if($catetwo->id_Parent == $cateone->id): ?>
                                                    <li class="dd-item">
                                                        <div class="dd-handle ct" style="color:green;" title="<?php echo e($catetwo->id); ?>"><?php echo e($catetwo->TenLoai); ?></div>
                                                        <ol class="dd-list">

                                                              <?php $__currentLoopData = $caterd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catethree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($catethree->id_Parent == $catetwo->id): ?>
                                                            <li class="dd-item">
                                                                <div class="dd-handle ct" title="<?php echo e($catethree->id); ?>"><?php echo e($catethree->TenLoai); ?></div>
                                                            </li>
                                                            <?php endif; ?>
                                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ol>
                                                    </li> 
                                                      <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                                </ol>
                                            </li>
                                           
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ol>
                                    </div>
                                </div>
                            </div>

            </div>


            <!-- thêm chỉnh sửa thông tin -->

                   <div class="col-md-7">
                   <div class="portlet light bordered">
                           
            <div class="portlet-title">
            <div class="pull-right">
              <div class = "btn btn-circle btn-icon-only btn-default" onclick="removeform()">
              <i class = "glyphicon glyphicon-plus"></i></div>
                   <a href="admin/user/xoa?id=" class = "btn btn-circle btn-icon-only btn-default"><i class = "glyphicon glyphicon-remove"></i></a>
                   </div>
                <div class="caption">
                <span class="caption-subject bold uppercase">Thêm, Chỉnh sửa loại sản phẩm</span>
              
                </div>

                </div>
                <!--  -->
                        <?php if(session('thongbao')): ?>
                         <div class="alert alert-danger" id="fail"><?php echo e(session('thongbao')); ?></div>
                       <?php endif; ?>
                       <?php if(session('thanhcong')): ?>
                        <div class="alert alert-success" id='success'><?php echo e(session('thanhcong')); ?></div>
                        <?php endif; ?>
      
                <!-- begin update -->
                <!-- chia cột -->
                <div class = "row">
                <div class= "col-md-12">
             
                <form action="admin/loaisanpham/postthemsua" method= "post" id="form_sample_2" class="form-horizontal">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> Sai thông tin!</div>
                      
                        <div class="form-group  margin-top-20">
                            <label class="control-label col-md-3">Tên Thể Loại
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="name" id="tenloai"/> 
                                    </div>
                            </div>
                        </div>

                            <div class="form-group">
                                         <label class="control-label col-md-3">Cha hiện tại

                                       </label>
                            <div class="col-md-9">
                                       <input type="text" class="form-control" id="capcha" disabled="disabled" />
                                    </div>
                                  </div>
                         <div class="form-group">
                                         <label class="control-label col-md-3">Chọn cha mới

                                       </label>
                            <div class="col-md-9">
                                        <select id="single" class="form-control select2" style="width:70%;">
                                        <option value="-1">------------Không chọn-----------</option>
                                            <option value="0">KHÔNG CÓ</option>
                                          
                                                 <?php $__currentLoopData = $catest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cateone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option  value="<?php echo e($cateone->id); ?>"> <?php echo e($cateone->TenLoai); ?></option>
                        

                                                     <?php $__currentLoopData = $catend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catetwo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($catetwo->id_Parent == $cateone->id): ?>
                                                      <option value="<?php echo e($catetwo->id); ?>">--------<?php echo e($catetwo->TenLoai); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                        </select>
                                    </div>
                                  </div>
                         <div class="form-group  margin-top-20">
                            <label class="control-label col-md-3">Mô tả chung

                            </label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <textarea class="form-control" name="des" id="des" rows="6"></textarea> 
                                    </div>
                            </div>
                        </div>

     
        </div>
        </div>


        <div class="form-actions">
          <div class="row">
              <div class="col-md-offset-3 col-md-9">
                   <button type="submit" id="sua" class="btn blue">Sửa</button>
                  <button type="submit" id="them" class="btn green">Lưu & mới</button>
                  <button type="submit" class="btn red" id="xoa">Xóa</button>
                  <input type="hidden" name="submit" id="submit"/>
              </div>
          </div>

</div>
                                  
          
          <input type="hidden" name="id" id="id"/>
           <input type="hidden" name="capdo" id="capdo"/>
          <input type="hidden" name="id_Parent" id="id_Parent"/>
           <input type="hidden"  value="-1" name="id_Parent_new" id="id_Parent_new"/>
    </div>
                    
            </form>
                </div>
                </div>
 </div>
 </div>
</div>
  </div>
  <?php $__env->stopSection(); ?>
 <!-- javascript -->
 <?php $__env->startSection('script'); ?>

 
          <script>
   // xem chi tiết:
$(document).ready(function() {
   // alert("hihi");
      $('.ct').click(function()
      {
        var a = $(this).attr("title");
    
      
      // alert(a);

        $.get(('admin/loaisanpham/chitiet'),{id:a},function(data){
              var js = data;
               var js1 = JSON.parse(js)
      
        $('#tenloai').val(js1.TenLoai);
        $('#des').val(js1.MoTa);
        $('#id').val(js1.id);
        $('#capcha').val(js1.TenCha);
        $('#capdo').val(js1.CapDo)
        $('#id_Parent').val(js1.id_Parent);
        $("html, body").animate({
            scrollTop: 0,
           }, 600);
          return false;

       

    });
    });

      $('#single').change(function(){
      var id= $(this).val();
      $('#id_Parent_new').val(id);
         
      });

      // $('.chamoi').click(function(){

      //   alert($(this).attr("title"));

      // });
      

    });

 </script>

 <script>
   $(document).ready(function() {
      $('#them').mouseenter(function() {
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
      
   function removeform()
   {
  
        $('#tenloai').val(null);
         $('#des').val(null);
          $('#id').val(null);
          $('#id_Parent').val(null);
          $('#capcha').val(null);
   }

 </script>

 <script>
   // $(document).ready(function() {
   //    $('#success').slideUp(3000);
   //    $('#fail').slideUp(10000);
   // });

 </script>

 <?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.hihi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>