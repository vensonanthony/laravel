<?php $__env->startSection('content'); ?>
<?php 
	$friendsz = DB::table('friendships')
		->get();
	foreach ($friends as $friend) {
		$friendsz = $friend;
	}
 ?>


<div class="container">
	<h6>FriendList 
	
<!-- if (Auth::user()->id == $friendsz->user_id)

	(App\Friendships::where('accepted', 1)->where('user_id', Auth::user()->id)->count())
	
else

	(App\Friendships::where('accepted', 1)->where('friend_id', Auth::user()->id)->count())

endif -->


	</h6>

	<?php if(session()->has('msg')): ?>   
        <p class="float- alert alert-success">
         	<?php echo e(session()->get('msg')); ?>

        </p>
    <?php endif; ?>

</div>

<?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <img src="/uploads/avatars/<?php echo e($uList->avatar); ?>" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
	            <h5><?php echo e($uList->name); ?></h5>

	            <?php if($uList->user_id == Auth::user()->id): ?>
	            <a href="<?php echo e(route('profile.remove', $uList->id)); ?>" class="btn btn-secondary float-right"> Unfriend </a>
	            <?php else: ?>
	            <a href="<?php echo e(route('profile.removeMe', $uList->id)); ?>" class="btn btn-secondary float-right"> Unfriend </a>
	            
	            <?php endif; ?>

	        </div>
	    </div>
	</div>
	<hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>