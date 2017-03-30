<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="/"><img class="prof_pic" src="http://www.brandmap.lt/files/pictures/logotipai/av_logotipai.png"></a>
      <a class="nav-link green" href="/posts/create">| Post</a>

      <form class="search" method="get" action="<?php echo e(route('search.results')); ?>" role="search">
        <?php echo e(csrf_field()); ?>

        <div class="col-sm-12">
          <div class="input-group">
            <input type="text" class="form-control in_search" placeholder="Search for..." name="query">
            <span class="input-group-btn">
              <button class="btn btn-secondary btn_search" type="submit">
                <img src="<?php echo e(asset('icons/search.svg')); ?>">
              </button>
            </span>
          </div>
        </div>
      </form>

      <div class="float_right">
        <?php if(Auth::check()): ?>
      <div class="relative">
        <a href="/requests" class="right_pad"><img src="<?php echo e(asset('icons/pip.svg')); ?>">
          <span class="red badge badge-danger">
            <?php echo e(App\Friendships::where('accepted', 0)->where('friend_id', Auth::user()->id)->count()); ?>

          </span>
        </a>
      </div>
      
      <div class="relative">
        <a href="" class="right_pad"><img src="<?php echo e(asset('icons/msg.svg')); ?>">
          <span class="red badge badge-danger"></span>
        </a>
      </div>

      <!-- <div class="relative">
        <a href="#" class="right_pad"><img src="<?php echo e(asset('icons/notif.svg')); ?>">
          <span class="red badge badge-danger">
            <?php echo e(App\Notification::where('accepted', 1)->where('accept_id', Auth::user()->id)->count()); ?>

          </span>
        </a>
      </div> -->

      <div class="btn-group relative">
        <a  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="right_pad">
          <img src="<?php echo e(asset('icons/notif.svg')); ?>">
          <span class="red badge badge-danger">
            <?php echo e(App\Notification::where('accepted', 1)->where('accept_id', Auth::user()->id)->count()); ?>

          </span>
        </a>

        <?php 
          $notes = DB::table('notifications')
                ->leftJoin('users', 'users.id', 'notifications.user_logged')
                ->where('accept_id', Auth::user()->id)
                ->where('accepted', 1)
                ->orderBy('notifications.created_at', 'desc')
                ->get();
         ?>
    
        <div class="dropdown-menu dropdown-menu-right">
          <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route( 'profile.notifications', $note->id )); ?>" class="dropdown-item" style="font-size: 0.7rem;">
           <span> <?php echo e(ucwords($note->name)); ?> <?php echo e($note->note); ?> </span><br>
           <span> <?php echo e($note->created_at); ?></span>
          </a>
          <hr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <a class="dropdown-item" href="/friends" style="font-size: 0.7rem;">see your friend list...</a>
        </div>
      </div>

       

        <button id="flip" class="btn btn-default"><?php echo e(Auth::user()->name); ?></button>
          <div id="panel">
            <a class="left_nav" href="/home"><li>
              Timeline
           
              <img src="/uploads/avatars/<?php echo e(Auth::user()->avatar); ?>" style="width: 32px; border-radius: 3px;">
            </li></a> 
            <hr>

            <a class="left_nav" href="/world"><li>
              Newsfeed
            </li></a> 
            <hr>

            <a class="left_nav" href="/bookmark"><li>
              Sticker
            </li></a> 
            <hr>

            <a class="left_nav" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><li>
            Sign Out
            </li></a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

            </form> 

          </div>
        <!-- <a class="nav-link inline" href="/logout">Logout</a> -->
      <?php else: ?>
        <a class="nav-link inline" href="/login">Sign In</a>/
        <a class="nav-link inline" href="/register">Register</a>
      <?php endif; ?>
      </div>
    </nav>
  </div>
</div> 