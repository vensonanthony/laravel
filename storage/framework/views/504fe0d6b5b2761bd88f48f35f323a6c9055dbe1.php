<?php $__env->startSection('content'); ?>
<div class="container">

  <div class="row">

    <div class="col-sm-8 blog-main">

      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('/posts/post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
      <hr>

    </div><!-- /.blog-post -->

     
   
 		  <!-- <nav class="blog-pagination">
        	<a class="btn btn-outline-primary" href="#">Older</a>
        	<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav> -->
      	  
    </div><!-- /.blog-main -->

   

  </div><!-- /.row -->

</div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>