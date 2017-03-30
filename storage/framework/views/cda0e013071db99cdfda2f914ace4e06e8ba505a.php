<?php $__env->startSection('content'); ?>

<div class="container">
	<h6>New Friend </h6>
	<?php if(session()->has('msg')): ?>   
        <p class="float- alert alert-success">
         	<?php echo e(session()->get('msg')); ?>

        </p>
    <?php endif; ?>
</div>

<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <img src="/uploads/avatars/<?php echo e($uList->avatar); ?>" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
	            <h5><?php echo e($uList->name); ?></h5>
	 			<span><?php echo e($uList->note); ?></span>
	        </div>
	    </div>
	</div>
	<hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>