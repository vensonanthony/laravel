<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		.avatar {
			position: absolute;
			height: 3.4rem;
			width: 3.4rem;
			border-radius: 3px;
		}

		.right {
			position: absolute;
			right: -4rem;
			width: 97%;	
		}

		.reply {
		  margin-bottom: 0;
		  background: hsla(0,0%,100%,.97);
		  padding: 1.5em 2em 0 1.5em;
		  border-radius: 10px;
		  font-size:  .9rem;
		  width: 92%;
		}

		.right_reply {
			position: absolute;
			right: -1rem;
			width: 90%;	
			top: -1rem;
		}
		.avatar_reply {
			position: absolute;
			height: 3.4rem;
			width: 3.4rem;
			border-radius: 3px;
			top: -1rem;
		}

	</style>
</head>
<body>

<div class="container-fluid" id="comment">
	<div class="row">
		<div class="blog-post  relative">
			<form method="post" action="/comments/<?php echo e($post->id); ?>">
				<?php echo e(csrf_field()); ?>


				<div class="form-group">
				<?php if(Auth::check()): ?>
					<img class="avatar" src="/uploads/avatars/<?php echo e(Auth::User()->avatar); ?>" >
				<?php else: ?>
					<img class="avatar" src="/uploads/avatars/default.jpg" >
				<?php endif; ?>
					<textarea name="body" id="comment" class="form-control right" required="required" placeholder="Join the Discussion..."></textarea>
				</div>
				<button type="submit" class="btn btn-secondary" style="position: absolute; bottom: -3rem; right: -3rem;">></button>
			</form>
		</div>

		<div class="container">
			<hr>
			<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
				
			<div class="media" style="min-height: auto; position: relative;">
			    <div class="media-left">
			    	<img src="/uploads/avatars/<?php echo e($comment->user->avatar); ?>" style="width: 32px; border-radius: 50%; margin-right: 5px;">
			    </div>
			    <div class="media-body">
			      	<h6 class="media-heading"><?php echo e($comment->user->name); ?> |<small><i> <?php echo e($comment->created_at->diffForHumans()); ?></i></small></h6>
			      	<p>
			      		<?php echo e($comment->body); ?>

			      		<div>
							<span>
								<a href="#" class="fa fa-angle-up" aria-hidden="true"></a>
							</span>
							<span>
								<a href="#" class="fa fa-angle-down" aria-hidden="true"></a>
								<!-- class="fa fa-chevron-down" -->
							</span>	
							<span>
								<a href="#" class="replies">Reply</a>
								<!-- <a data-toggle="collapse" href="#reply" aria-expanded="false" aria-controls="reply">reply</a> -->
							</span>
						</div>
			      	</p>
			      	
			      	<div class="reply relative replies_box">
						<form method="post" action="/replies/<?php echo e($comment->id); ?>">
							<?php echo e(csrf_field()); ?>


							<div class="form-group">
							<?php if(Auth::check()): ?>
								<img class="avatar_reply" src="/uploads/avatars/<?php echo e(Auth::User()->avatar); ?>" >
							<?php else: ?>
								<img class="avatar" src="/uploads/avatars/default.jpg" >
							<?php endif; ?>
								<textarea name="body" id="comment" class="form-control right_reply" required="required" placeholder="Join the Discussion..."></textarea>
							</div>
							<button type="submit" class="btn btn-secondary" style="position: absolute; bottom: 0.5rem; right: 0;">></button>
						</form>
					</div>
					<hr>
			    	
			      	<!-- Nested media object -->
			      	
			      	<?php $__currentLoopData = $comment->reply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      		<?php echo $__env->make('/replies/create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			     	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			     	
			    </div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<hr>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function()
	{
		$(".reply").hide();
	});

	$(".replies").click(function()
	{
		$(".replies_box").show();
	});
	

</script>

</body>
</html>
