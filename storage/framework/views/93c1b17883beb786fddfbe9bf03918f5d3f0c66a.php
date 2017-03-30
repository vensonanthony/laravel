<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Timeline</div>
                <div class="panel-body">
                    <a class="nav-link green" href="/posts/create">| Post</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if( Auth::User()->id == $post->user->id ): ?>
            <div class="panel panel-default" style="position: relative; padding: 0 1rem 1rem 1rem;">
                <h2 class="blog-post-title"><a class="left_nav title" href="/posts/show/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a>
                </h2>

                <p class="blog-post-meta" style="position: relative;">
                    <img src="/uploads/avatars/<?php echo e($post->user->avatar); ?>" style="width: 32px; border-radius: 50%;">
                        <a class="prof_name" href=""><?php echo e($post->user->name); ?></a>
                    | <?php echo e($post->created_at->diffForHumans()); ?>

                </p>

                <p>
                    <?php echo e(str_limit($post->body, $limit = 302, $end = '...')); ?><br>
                    <?php if (! (strlen($post->body) < 302)): ?>
                    <a href="/posts/show/<?php echo e($post->id); ?>" style="color: #26a8ed;"><span>Read More</span></a>
                     <?php endif; ?>
                </p>
                <hr>

                <?php if(Auth::check()): ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: absolute; padding-right: 1rem; top: 0; right: .5rem;"></a>
                <ul class="dropdown-menu" role="menu" style="position: absolute; top: 1.5rem; right: 0;left: 75%; width: 1rem;">
                    <li>
                        <a href="/posts/delete/<?php echo e($post->id); ?>">Delete</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('post.edit', $post->id)); ?>">Update</a>
                    </li>
                </ul>
                <?php endif; ?>

                <?php if(Auth::check()): ?>  
                    <?php $count=''; $pos=1; ?>
                    <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($user->name); ?>, 
                        <?php $count = $pos++ ?>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    Likes this!<br>
                    <?php if($post->isLiked): ?>
                    <?php print $count; ?>
                    <a href="<?php echo e(route('post.like', $post->id)); ?>" class="fa fa-thumbs-up" aria-hidden="true"> Unlike</a>
                    <?php else: ?>
                    <?php print $count; ?>
                    <a href="<?php echo e(route('post.like', $post->id)); ?>" class="fa fa-thumbs-o-up" aria-hidden="true"> Like</a>
                    <?php endif; ?>
                <?php else: ?>   
                    <?php $pos=1; ?>
                    <?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($user->name); ?>, 
                        <?php $count = $pos++ ?>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    Likes this!<br>
                    <?php print $count ?>
                    <a href="/login" class="fa fa-thumbs-o-up" aria-hidden="true"> Like</a>
                <?php endif; ?>

            </div><!-- /.blog-post -->
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>