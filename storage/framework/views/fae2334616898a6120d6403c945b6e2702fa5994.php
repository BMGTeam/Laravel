  
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
                          <?php if(session('id')): ?>
                          <li> <a href="#">  <b>người dùng đang đăng nhập : <?php echo e(session('id')); ?></b></a><li>
                          <?php endif; ?>
                    </ul>
                
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                    
        


            <!-- thêm chỉnh sửa thông tin -->

                   <div class="col-md-7">
                   <div class="portlet light bordered">
                           
            <div class="portlet-title">
            <div class="pull-right">
              <a href="#" class = "btn btn-circle btn-icon-only btn-default ">
              <i class = "glyphicon glyphicon-plus"></i></a>
               <a href="#" class = "btn btn-circle btn-icon-only btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                   <a href="#" class = "btn btn-circle btn-icon-only btn-default"><i class = "glyphicon glyphicon-remove"></i></a>
                   </div>
                <div class="caption">
                <span class="caption-subject bold uppercase">Thêm, Chỉnh sửa thông tin người dùng</span>
              
                </div>

                </div>
                <!--  -->
                <?php if(session('thongbao')): ?>
                  <div class="alert alert-danger"><?php echo e(session('thongbao')); ?></div>
                <?php endif; ?>
                      <?php if(session('thanhcong')): ?>
                        <div class="alert alert-success"><?php echo e(session('thanhcong')); ?></div>
                        <?php endif; ?>
      
                <!-- begin update -->
                <!-- chia cột -->
                <div class = "row">
                <div class= "col-md-7">
                <form action="admin/user/postthem" method= "post" id="form_sample_2" class="form-horizontal">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> sai thông tin rồi! xem lại nào... </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> thông tin đã được kiểm tra thành công..ahihi </div>
                        <div class="form-group  margin-top-20">
                            <label class="control-label col-md-3">Name
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="name" /> </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Password
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="password" class="form-control" name="password" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="email" /> </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-md-3">Năm sinh
                              
                            </label>
                            <div class="col-md-9">
                         
                                    <select name="namsinh" >
                                    <option> </option>
                                    <?php $i = 0;
                                    for($i= 1960; $i < 2020; $i ++)
                                          echo "<option>".$i."</option>";
                                     ?>
                                 
                                    </select>
                            </div>
                        </div>
             <div class="form-group">
            <label class="control-label col-md-3">Cấp độ
            </label>
            <div class="col-md-5">
                  <select name="capdo" >
                    <option> </option>
                    <?php $j = 0;
                    for($j= 0; $j < 6; $j ++)
                          echo "<option>".$j."</option>";
                     ?>
                    </select>
            </div>
        </div>
            <div class="form-group">
            <label class="control-label col-md-3">Giới tính
            </label>
            <div class="md-radio-inline">
                <div class="md-radio">
                    <input type="radio" id="radio6" name="gioitinh" value="Nam" class="md-radiobtn">
                    <label for="radio6">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span>Nam </label>
                </div>
                <div class="md-radio">
                    <input type="radio" id="radio7" name="gioitinh" value="Nữ" class="md-radiobtn" checked>
                    <label for="radio7">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Nữ </label>
                </div>
                <div class="md-radio">
                    <input type="radio" id="radio8" name="gioitinh" value ="Chưabiết"class="md-radiobtn">
                    <label for="radio8">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Chưa biết</label>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-5">
  <div class="form-group">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                  <div>
                      <span class="btn default btn-file">
                          <span class="fileinput-new"> Select image </span>
                          <span class="fileinput-exists"> Change </span>
                          <input type="file" name="..."> </span>
                      <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                  </div>
              </div>
            </div>
            </div>
    

        <div class="form-actions">
          <div class="row">
              <div class="col-md-offset-3 col-md-9">
                  <button type="submit" class="btn green">Submit</button>
                  <button type="button" class="btn default">Cancel</button>
              </div>
          </div>

</div>

     
            

            </div>
                    
            </form>
            <button id="hihi">ahihi</button>

                </div>
                </div>
 </div>
 </div>
 </div>
  <?php $__env->stopSection(); ?>
 <!-- javascript -->
 <?php $__env->startSection('script'); ?>
 <?php $__env->stopSection(); ?>

 --}} --}} --}}
<?php echo $__env->make('admin.layouts.hihi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>