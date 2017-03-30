<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<style type="text/css">

		.prof_pic {
			border-radius: 50%;
  			height: 2rem;
			width: 2rem;
			padding-bottom: 10px;
		}

		.inline {
			display: inline-block;
		}

		nav {
			line-height: 1rem;
			width: 70%;
			position: relative;
		}

		.float_right {
			position: absolute;
			right: 0;
		}

		.in_search, .btn_search {
  			height: 25px;
  			font-size: .7rem;
  			margin-top: 5px;
		} 

		.btn_search {
  			padding-top: 5px;
		}

		#flip {
  			margin-top: 2px;
  			color: #999;
  			background-color: inherit; 
  			font-size: .9rem;
  			border: 1px solid #999;
  			padding: 5px;
		}
			#flip:hover {
    			color: #26A8EA;
    			border: 1px solid #26a8ed;
  			}
/*-----------------------------------------*/
		body {
			background-color: #e5e5e5;
		}

		div {
			/*background: lightblue;*/
			/*text-align: center;*/
		}

		.navi {
			height: 2.2rem;
			position: fixed;
			z-index: 2;
			background-color: #fff;
			width: 102%;
			font-size: .8rem;
		}
			.space {
				height: 36px;
				background-color: #fff;
			}

		.navig {
			height: 2.2rem;
			z-index: 2;
			background-color: #fff;
			width: 102%;
			font-size: .8rem;
		}
			

		.background {
			background: url('http://cdn.movieweb.com/img.news.tops/NEaBfb0Dqw4bch_1_b.jpg') center/cover no-repeat;
			background-size: 100% 100%;
			height: 23rem;

		}

		#follow, #following {
			height: 1.5rem;
			margin-top: .3rem;
			border-radius: 5px;
		}

		.title {
  			color: inherit;
		}
    		.title:hover {
      			text-decoration: none;
      			color: #26a8ed;
    		}

/*------------------------------------*/
		#container {
	      width: 250px;
	      height: 320px;
	      font-size: 1rem;
	      border:1px solid black;
	      border-radius: 5px;
	      background: 
	      z-index: 2;
	      background-color: #f5f5f5;
	      padding: 2px 0 0 0;
	    }

	    .login {
	      height: 33px;
	      width: 220px;
	      font-size: .8rem;
	    }

	    .inline {
	      display: inline-block;
	    }

	    .small {
	      font-size: .7rem;
	    }

	    .check {
	      width: 300px;
	    }

	    .move {
	      width: 15rem;
	    }
	</style>
</head>
<body>

<div class="container-fluid">

	<div class="row">

			<div class="justify-content-center navi row">
				<nav class="nav blog-nav">
			    	<a class="nav-link" href="#"><img class="prof_pic" src="http://www.brandmap.lt/files/pictures/logotipai/av_logotipai.png"></a>
			    	<a class="nav-link" href="#">About</a>

			    <form method="post" action="">
        		<?php echo e(csrf_field()); ?>

       				<div class="col-sm-12">
         				<div class="input-group">
          					<input type="text" class="form-control in_search" placeholder="Search for...">
           					<span class="input-group-btn">
              					<button class="btn btn-secondary btn_search" type="button">Go!</button>
            				</span>
          				</div>
       				</div>
      			</form>

			      	<a class="title nav-link float_right" data-toggle="collapse" href="#container" aria-expanded="false" aria-controls="container">Have a account? Log in</a>

			      	<!--  -->
			      	
<!-- <div class="collapse" id="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp&nbspHave an account?</div>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control login" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Email">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control login" name="password" required placeholder="Password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-12">
                                <div class="checkbox check">
                                    <label class="small">
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <span>Remember Me</span>
                                         <a class="btn btn-link inline small" href="<?php echo e(route('password.request')); ?>">
                                            Forgot Your Password?
                                         </a>
                                    </label>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group move">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                                <br>
                                <span>New User?</span>
                                <br>
                                 <button class="btn btn-secondary btn-block">
                                    Register
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

					<!--  -->
			    </nav>
			</div>
		
		<div class="space col-12">Space</div>
		<div class="background col-12"></div>

		<div class="col-12">
			<div class="justify-content-center navig row">

				<nav class="nav blog-nav">
			    	<a class="nav-link" href="#"><img class="prof_pic" src="http://www.brandmap.lt/files/pictures/logotipai/av_logotipai.png"></a>
			    	<!-- <a class="nav-link" href="#">Admin</a> -->
					
					<div class="container">
				    	<div class="btn-group">
	    					<button type="button"  class="btn">Posts</button>
	    					<button type="button"  class="btn">Following</button>
	    					<button type="button"  class="btn">Followers</button>
	  					</div>
					</div>

			      	<button id="follow" onclick="following(this.id)" class="flip float_right" href="#">
			      		<img src="<?php echo e(asset('icons/user.svg')); ?>"> Follow
			      	</button>
			    </nav>

			</div>
		</div>	

	</div>	

<?php echo $__env->make('partials/sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</div>

<script type="text/javascript">
	function following(id)
    {
        if (id=="follow") 
        {
          document.getElementById("follow") .innerHTML = "Following";
          document.getElementById("follow").setAttribute("id", "following");
        }

        if(id=="following")
        {
          document.getElementById("following").innerHTML = "<img src='<?php echo e(asset('icons/user.svg')); ?>'> Follow";
          document.getElementById("following").setAttribute("id", "follow");
        }
    }
</script>

</body>
</html>