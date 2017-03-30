<?php $__env->startSection('content'); ?>
<div class="container">
<div class="blog-post">
  <h2 class="blog-post-title"><?php echo e($post->title); ?></h2>
  <p class="blog-post-meta">
    <img src="/uploads/avatars/<?php echo e($post->user->avatar); ?>" style="width: 32px; border-radius: 50%;">
    <a  class="prof_name" href=""><?php echo e($post->user->name); ?> </a>| <?php echo e($post->created_at->diffForHumans()); ?> <!-- <a href="#">hashtag</a>-->
    <span class="float-right">
    <span class="label">Novel</span>
    <span class="label">Ecchi</span>
    <span class="label">Slice of Life</span></span>
  </p>

  <p class="relative"> 
    <?php $__currentLoopData = explode(PHP_EOL, $post->body); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo e($paragraph); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </p>
  <div class="form-group">
    <div>
      <a href="" class="fa fa-heart" aria-hidden="true">&nbsp&nbsp&nbsp</a>
      <a data-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="comment">Comment</a>
      <a class="float-right" href="">Sort By Best</a>
    </div>

    <!-- <div class="collapse" id="comment"> -->
      <?php echo $__env->make('comments/create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- </div> -->
  </div>

  <hr>

</div><!-- /.blog-post -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>