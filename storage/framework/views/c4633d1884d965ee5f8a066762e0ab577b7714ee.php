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
    <?php $__currentLoopData = (explode(PHP_EOL, $post->body)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <p><?php echo e($paragraph); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </p>
  <div class="form-group">
  
    <?php if(Auth::check()): ?>
    
    <?php $count=''; $pos=1; ?>

        <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($user->name); ?>, 

    <?php $count = $pos++ ?>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            Likes this!
            <br>
        <?php if($post->isLiked): ?>
            <?php print $count; ?>
            <a href="<?php echo e(route('post.like', $post->id)); ?>" class="fa fa-thumbs-up" aria-hidden="true">Unlike</a>
        <?php else: ?>
             <?php print $count; ?>
            <a href="<?php echo e(route('post.like', $post->id)); ?>" class="fa fa-thumbs-o-up" aria-hidden="true"> Like</a>
            
        <?php endif; ?>

    <?php else: ?>   
    <?php $pos=1; ?>

        <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($user->name); ?>, 

    <?php $count = $pos++ ?>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            Likes this!
            <br>
            <?php print $count ?>
            <a href="/login" class="fa fa-thumbs-o-up" aria-hidden="true"> Like</a>
    <?php endif; ?>
      <a data-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="comment">Comment</a>
      <a class="float-right" href="">Sort By Best</a>

    <!-- <div class="collapse" id="comment"> -->
      <?php echo $__env->make('comments/create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- </div> -->
  </div>

  <hr>

</div><!-- /.blog-post -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>