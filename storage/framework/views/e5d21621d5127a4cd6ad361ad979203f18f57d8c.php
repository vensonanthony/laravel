<?php $__env->startSection('content'); ?>
<div class="container">
<h1>Upload a photo</h1><hr>
<div class="row">

<?php if(count($errors) > 0): ?>
	<div class="alert alert-danger">
		<strong>Whoops!</strong>
		There were some problems with your input. <br><br>

		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
<?php endif; ?>

<?php echo Form::open(array(
				'route'=>'imageStore', 
				'class'=>'form', 
				'files'=>true)); ?>


<div class="form-group">
	<?php echo Form::label('image name', 'Image name:'); ?>


	<?php echo Form::text('image_name', null, ['class'=>'form-control']); ?>

</div>


<div class="form-group">
	<?php echo Form::label('mobile_image_name', 'Mobile Image Name:'); ?>


	<?php echo Form::text('mobile_image_name', null, ['class'=>'form-control']); ?>

</div>


<div class="form-group">
	<?php echo Form::label('is_active', 'Is Active:'); ?>


	<?php echo Form::checkbox('is_active'); ?>

</div>


<div class="form-group">
	<?php echo Form::label('is_featured', 'Is Featured'); ?>


	<?php echo Form::checkbox('is_featured'); ?>

</div>


<div class="form-group">
	<?php echo Form::label('image', 'Primary Image'); ?>


	<?php echo Form::file('image', null, array('required', 'class'=>'form-control')); ?>	
</div>


<div class="form-group">
	<?php echo Form::label('mobile_image', 'Mobile Image'); ?>


	<?php echo Form::file('mobile_image', null, array('required', 'class'=>'form-control')); ?>

</div>


<div class="form-group">
	<?php echo Form::submit('upload Photo', array('class'=>'btn btn-primary')); ?>

</div>

<?php echo Form::close(); ?>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>