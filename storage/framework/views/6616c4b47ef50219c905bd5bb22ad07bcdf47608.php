<?php if(count($errors)>0): ?>
 <div class="alert alert-danger"> <button class="close" id="fail" data-close="alert"></button>
 <ul>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  		
  		<li><?php echo $error; ?>  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  
     </div>
<?php endif; ?>