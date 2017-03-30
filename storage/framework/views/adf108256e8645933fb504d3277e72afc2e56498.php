<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container">
<div class="row">
<div class="col-sm-8 blog-main">
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="blog-post">

    <div class="span8">
      <h1><?php echo e($post->title); ?></h1>
      <p><?php echo e($post->body); ?></p>
      <div>
          <span class="badge badge-success"><?php echo e($post->created_at); ?></span>
      </div> 
      <hr>
    </div>
    <?php if(Auth::check()): ?>
      
            <a href="posts/<?php echo e($post->id); ?>/edit"><button class="btn btn-primary">Update</button></a>

            <a href="/posts/delete/<?php echo e($post->id); ?>"><button class="btn btn-danger">Delete</button></a>
      
    <?php endif; ?>
</div><!-- /.blog-post -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>