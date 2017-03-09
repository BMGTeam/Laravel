<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

  <?php echo $__env->make('admin.layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
       <?php echo $__env->make('admin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
       <?php echo $__env->yieldContent('content'); ?>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $__env->make('admin.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- END FOOTER -->
        <!-- BEGIN QUICK NAV -->
     <?php echo $__env->make('admin.layouts.menu2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
     <?php echo $__env->make('admin.layouts.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>