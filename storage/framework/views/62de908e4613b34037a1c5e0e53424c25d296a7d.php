<div class="container">
	<div class="media" style="min-height: auto; position: relative;">
		<div class="media-left">
			<img src="/uploads/avatars/<?php echo e($user->avatar); ?>" style="width: 32px; border-radius: 50%; margin-right: 5px;">
		</div>
		<div class="media-body">
			<h6 class="media-heading"> 
			<a href="<?php echo e(route('profile.index', ['name'=>$user->name])); ?>">
				<?php echo e($user->name); ?>

			</a>
			</h6>	
		</div>

<form enctype="multipart/form-data" action="/findFriends" method="get">
		                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		                <button type="submit" class="btn btn-success float-right">Add Friend</button>
		            </form>

	</div>
</div>
<hr>
