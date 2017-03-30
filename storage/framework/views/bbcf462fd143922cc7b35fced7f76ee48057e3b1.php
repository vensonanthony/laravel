<div class="blog-post">
    <h2 class="blog-post-title"><a class="left_nav title" href="/posts/show/<?php echo e($post->id); ?>">
    	<?php echo e($post->title); ?></a>
    </h2>

    <?php if(Auth::user()): ?>
    	<?php if(Auth::User()->id == $post->user->id): ?>
    <div class="relative">
        <div class="dd">
        	<div class="btn-group dd_1" role="group" aria-label="Button group with nested dropdown">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 
                </button>
                <div class="dropdown-menu resize dd_2" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="/posts/edit/<?php echo e($post->id); ?>">Edit</a>
                  <a class="dropdown-item" href="/posts/delete/<?php echo e($post->id); ?>">Delete</a>
                </div>
        	</div>
        </div>
    </div>
    	<?php endif; ?>
    <?php endif; ?>

    <p class="blog-post-meta" style="position: relative;">
    	<img src="/uploads/avatars/<?php echo e($post->user->avatar); ?>" style="width: 32px; border-radius: 50%;">
        <a class="prof_name" href=""><?php echo e($post->user->name); ?></a>
        </a>| <?php echo e($post->created_at->diffForHumans()); ?> <!-- <a href="#">hashtag</a>-->
        <span class="float-right">
            <span class="label">Novel</span>
            <span class="label">Ecchi</span>
            <span class="label">Slice of Life</span>
        </span>
    </p>

    <p>
        <?php echo e(str_limit($post->body, $limit = 302, $end = '...')); ?> 
    	<br>
    	<?php if (! (strlen($post->body) < 302)): ?>
        <a href="/posts/show/<?php echo e($post->id); ?>" style="color: #26a8ed;"><span>Read More</span></a>
        <?php endif; ?>
    </p>
    <hr>
  
    <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($user->name); ?> Likes this!
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($post->isLiked): ?>
        <a href="<?php echo e(route('post.like', $post->id)); ?>" class="fa fa-thumbs-up" aria-hidden="true">unlike</a>
    <?php else: ?>
        <a href="<?php echo e(route('post.like', $post->id)); ?>" class="fa fa-thumbs-o-up" aria-hidden="true">Like</a>

       <!--  <form method="get" action="<?php echo e(route('post.like', $post->id)); ?>">
            <button type="submit" class="fa fa-thumbs-o-up" aria-hidden="true"></button>
        </form> -->
    <?php endif; ?>

</div><!-- /.blog-post -->
