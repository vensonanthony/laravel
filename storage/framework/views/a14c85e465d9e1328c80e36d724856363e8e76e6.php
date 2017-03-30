<?php $__env->startSection('content'); ?>
<div class="container">

  <div class="row">

    <div class="col-sm-8 blog-main">

      <div class="blog-post">
        <h2 class="blog-post-title"><a class="left_nav title" href="#}">
          Ascendance of a Bookworm</a>
        </h2>

        <div class="relative">
          <div class="dd">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 
                </button>
                <div class="dropdown-menu resize" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="#">Edit</a>
                  <a class="dropdown-item" href="#">Delete</a>
                </div>
            </div>
          </div>
        </div>

        <p class="blog-post-meta">
        <img class="prof_pic" src="http://orig10.deviantart.net/41b9/f/2013/243/1/1/avatar___the_legend_of_aang___profile_picture_by_eqbal4-d6kjawv.png">
        <a  class="prof_name" href=""> Admin </a>| Feb 29, 2017 <!-- <a href="#">hashtag</a>-->
        <span class="float-right">
        <span class="label">Novel</span>
        <span class="label">Ecchi</span>
        <span class="label">Slice of Life</span></span></p>

        <p>Urano, a bookworm who had finally found a job as a librarian at a university, was sadly killed shortly after graduating from college. She was reborn as the daughter of a soldier in a world where the literacy rate is low and books were scarce. No matter how much she wanted to read, there were no books ...<br>
        <a href="#" style="color: #26a8ed;"><span>Read More</span></a></p>
    
        <hr>
            
      </div><!-- /.blog-post -->

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="blog-post">
        <h2 class="blog-post-title"><a class="left_nav title" href="/posts/show/<?php echo e($post->id); ?>">
          <?php echo e($post->title); ?></a>
        </h2>

        <?php if(Auth::check()): ?>
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

        <p class="blog-post-meta">
        <img class="prof_pic" src="http://orig10.deviantart.net/41b9/f/2013/243/1/1/avatar___the_legend_of_aang___profile_picture_by_eqbal4-d6kjawv.png">
        <a  class="prof_name" href="">
          <?php echo e($post->User->name); ?>

        </a>| Feb 29, 2017 <!-- <a href="#">hashtag</a>-->
        <span class="float-right">
        <span class="label">Novel</span>
        <span class="label">Ecchi</span>
        <span class="label">Slice of Life</span></span></p>

        <p><?php echo e($post->body); ?> ...<br>
        <a href="#" style="color: #26a8ed;"><span>Read More</span></a></p>
    
        <hr>
            
      </div><!-- /.blog-post -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 		  <nav class="blog-pagination">
        	<a class="btn btn-outline-primary" href="#">Older</a>
        	<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav>
      	  
    </div><!-- /.blog-main -->

    <?php echo $__env->make('partials/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </div><!-- /.row -->

</div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/layouts/temp_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>