<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="col-md-offset-1"> Soul Searching </div>
	<hr>
</div>
			<?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<div class="container">
		    <div class="row">
		        <div class="col-md-10 col-md-offset-1">
		            <img src="/uploads/avatars/<?php echo e($uList->avatar); ?>" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
		            <a href="<?php echo e(route('partials.profiles', $uList->name)); ?>"><h5><?php echo e($uList->name); ?></h5></a>

		        <?php 
		        	$check = DB::table('friendships')
		        		->where('friend_id', '=', $uList->id)
		        		->where('user_id', '=', Auth::user()->id)
		        		->first();

		        	$check2 = DB::table('friendships')
		        		->where('friend_id', '=', Auth::user()->id)
		        		->where('user_id', '=', $uList->id)
		        		->first();

		        	if ($check == '' AND $check2 == '') {
		         ?>
		            <form enctype="multipart/form-data" action="/addFriend/<?php echo e($uList->id); ?>" method="get">
		                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		                <button type="submit" class="btn btn-success float-right">Add to Friend</button>
		            </form>

		        <?php  
		        	} else {
		         ?>

		         <p class="float-right">Request Already Sent</p>

		        <?php
		        	}
		         ?>

		        </div>
		    </div>
		</div>
				<hr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>