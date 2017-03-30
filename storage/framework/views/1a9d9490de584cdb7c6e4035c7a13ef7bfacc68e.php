<div class="media" style="position: relative; margin-left: 1.5rem;">
	<div class="media-left">
		<img src="/uploads/avatars/<?php echo e($reply->user->avatar); ?>" style="width: 32px; border-radius: 50%; margin-right: 5px;">
	</div>
	<div class="media-body">
		<h6 class="media-heading"><?php echo e($reply->user->name); ?> |<small><i> <?php echo e($reply->created_at->diffForHumans()); ?></i></small></h6>
		<p>
			<?php echo e($reply->body); ?>

			<div>
				<span>
					<a href="#" class="fa fa-angle-up" aria-hidden="true"></a>
				</span>
				<span>
					<a href="#" class="fa fa-angle-down" aria-hidden="true"></a>
											<!-- class="fa fa-chevron-down" -->
				</span>	
			</div>
		</p>
	</div>
</div>