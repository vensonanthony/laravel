<?php $__env->startSection('content'); ?>
<div>
	<?php echo e($imagesImage->image_name); ?>:<br>
	<img src="/imgs/images/<?php echo e($imagesImage->image_name.'.'.$imagesImage->image_extension.'?'.'time='.time()); ?>">
</div>

<div>
	<?php echo e($imagesImage->mobile_image_name); ?>-mobile:<br>
	<img src="/imgs/images/mobile/<?php echo e($imagesImage->mobile_image_name.'.'.$imagesImage->mobile_extension.'?'.'time='.time()); ?>">
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>