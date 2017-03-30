<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="#"><img class="prof_pic" src="http://www.brandmap.lt/files/pictures/logotipai/av_logotipai.png"></a>
      <a class="nav-link green" href="#">/ Blog</a>

      <form class="search" method="post" action="/search" role="search">
        <?php echo e(csrf_field()); ?>

        <div class="col-sm-12">
          <div class="input-group">
            <input type="text" class="form-control in_search" placeholder="Search for..." name="q">
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
        <a href="" class="right_pad"><img src="<?php echo e(asset('icons/pip.svg')); ?>">
          <span class="red badge badge-danger"></span>
        </a>
      </div>
      
      <div class="relative">
        <a href="" class="right_pad"><img src="<?php echo e(asset('icons/msg.svg')); ?>">
          <span class="red badge badge-danger"></span>
        </a>
      </div>

      <div class="relative">
        <a href="" class="right_pad"><img src="<?php echo e(asset('icons/notif.svg')); ?>">
          <span class="red badge badge-danger"></span>
        </a>
      </div>

        <button id="flip" class="btn btn-default"><?php echo e(Auth::user()->name); ?></button>
          <div id="panel">
            <a class="left_nav" href="/profile"><li>
              My Account
           
              <img src="/uploads/avatars/<?php echo e(Auth::user()->avatar); ?>" style="width: 32px; border-radius: 3px;">
            </li></a> 
            <hr>

            <a class="left_nav" href="/world"><li>
              World
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