
 <?php echo $__env->make('frontend.layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         
 <?php echo $__env->yieldContent('content'); ?>
       
<?php echo $__env->make('frontend.layouts.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>