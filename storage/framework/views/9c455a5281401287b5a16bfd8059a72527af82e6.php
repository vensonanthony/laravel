<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="col-md-offset-1"> Friend Requests </div>
	<hr>
			<?php if(session()->has('msg')): ?>   
	         	<p class="float- alert alert-success">
	         		<?php echo e(session()->get('msg')); ?>

	         	</p>
	        <?php endif; ?>
</div>

	<?php $__currentLoopData = $FriendRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <img src="/uploads/avatars/<?php echo e($uList->avatar); ?>" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
            <h5><?php echo e($uList->name); ?></h5>
 		
            <a href="<?php echo e(route('profile.reject', $uList->id)); ?>" class="btn btn-secondary float-right"> Reject </a>

         	<a href="<?php echo e(route('profile.requests', [$uList->id, $uList->name])); ?>" class="btn btn-info float-right" style="margin-right: .5rem;"> Accept </a>
        </div>
    </div>
</div>

	<hr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>