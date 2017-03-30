<?php $__env->startSection('content'); ?>

<div class="container">
	<h3>
	Your Search for "<?php echo e(Request::input('query')); ?>"
	</h3>

	<?php if(!$users->count()): ?>
		<p>No results found, sorry.</p>
	<?php else: ?>
	<div class="row">
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('user/partials/userblock', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>