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
	      z-index: 5;
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

	    .collapse {
	    	position: absolute;
	    	right: 0;
	    	top: 2rem;
	    }
	    	.panel:after {
	    		position: absolute;
  				top: -11px;
  				right: -4.5rem;
  				width: 0;
  				height: 0;
  				margin-left: -.3rem;
  				vertical-align: middle;
  				content: "";
 				border-right: .6rem solid /*#FAFAD2*/;
 				border-bottom: .6rem solid #fff;
  				border-left: .6rem solid /*#FAFAD2*/;
  				z-index: 2;
	    	}

	    .mid {
	    	position: absolute;
	    	right: 45%;
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

			<div>
			    <form method="post" action="" class="mid">
        		{{csrf_field()}}
       				<div class="col-sm-12">
         				<div class="input-group">
          					<input type="text" class="form-control in_search" placeholder="Search for...">
           					<span class="input-group-btn">
              					<button class="btn btn-secondary btn_search" type="button">
              						<img src="{{ asset('icons/search.svg') }}">
              					</button>
            				</span>
          				</div>
       				</div>
      			</form>
      		</div>
@if(Auth::check())

				<a class="title nav-link float_right" href="{{ route('logout') }}" onclick="event.preventDefault();
          		document.getElementById('logout-form').submit();"><li>
          		Sign Out
          		</li></a>
          		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          		{{ csrf_field() }}
          		</form> 
@else
<div>
			      	<a class="title nav-link float_right" data-toggle="collapse" href="#container" aria-expanded="false" aria-controls="container">Have a account? Log in</a>
					
<!--  -->
      	
					<div class="collapse" id="container">
					    <div class="row">
					        <div class="col-md-8 col-md-offset-2">
					            <div class="panel panel-default">
					                <div class="panel-heading">&nbsp&nbsp&nbsp&nbspHave an account?</div>
					                <br>
					                <div class="panel-body">
					                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
					                        {{ csrf_field() }}

					                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

					                            <div class="col-md-6">
					                                <input id="email" type="email" class="form-control login" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

					                                @if ($errors->has('email'))
					                                    <span class="help-block">
					                                        <strong>{{ $errors->first('email') }}</strong>
					                                    </span>
					                                @endif
					                            </div>
					                        </div>

					                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

					                            <div class="col-md-6">
					                                <input id="password" type="password" class="form-control login" name="password" required placeholder="Password">

					                                @if ($errors->has('password'))
					                                    <span class="help-block">
					                                        <strong>{{ $errors->first('password') }}</strong>
					                                    </span>
					                                @endif
					                            </div>
					                        </div>

					                        <div class="form-group">
					                            <div class="col-md-12 col-md-offset-12">
					                                <div class="checkbox check">
					                                    <label class="small">
					                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span>Remember Me</span>
					                                         <a class="btn btn-link inline small" href="{{ route('password.request') }}">
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
					                                <br><br>
					                                 <button class="btn btn-secondary btn-block">
					                                    <a href="/register">Register</a>
					                                </button>
					                                
					                            </div>
					                        </div>
					                    </form>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
</div>
@endif
<!--  -->

			    </nav>
			</div>
		
		<div class="space col-12">Space</div>
		<div class="background col-12"></div>

		<div class="col-12">
			<div class="justify-content-center navig row">

				<nav class="nav blog-nav">
					<img src="/uploads/avatars/{{$user->avatar}}" style="width: 30px; height: 30px; float: left; border-radius: 5px; margin: 2px;">
					<h5>{{$user->name}}</h5>
					
					<div class="container">
				    	<div class="btn-group mid">
	    					<button type="button"  class="btn btn-secondary">Posts</button>
	    					<button type="button"  class="btn btn-secondary">Following</button>
	    					<button type="button"  class="btn btn-secondary">Followers</button>
	  					</div>
					</div>

			      	<button id="follow" onclick="following(this.id)" class="flip float_right" href="#">
			      		<img src="{{ asset('icons/user.svg') }}"> Follow
			      	</button>
			    </nav>

			</div>
		</div>	

	</div>	


	<div class="row">
        <div class="col-md-8 col-md-offset-2">
        @foreach($posts as $post)
        	
            @if ( $post->user_id == $user->id )
            <div class="panel panel-default" style="position: relative; padding: 0 1rem 1rem 1rem;">
                <h2 class="blog-post-title"><a class="left_nav title" href="/posts/show/{{$post->id}}">{{$post->title}}</a>
                </h2>

                <p class="blog-post-meta" style="position: relative;">
                    <img src="/uploads/avatars/{{$post->user->avatar}}" style="width: 32px; border-radius: 50%;">
                        <a class="prof_name" href="">{{$post->user->name}}</a>
                    | {{ $post->created_at->diffForHumans() }}
                </p>

                <p>
                    {{str_limit($post->body, $limit = 302, $end = '...')}}<br>
                    @unless(strlen($post->body) < 302)
                    <a href="/posts/show/{{$post->id}}" style="color: #26a8ed;"><span>Read More</span></a>
                     @endunless
                </p>
                <hr>

                @if(Auth::check())  
                    <?php $count=''; $pos=1; ?>
                    @foreach ($post->likes as $user)
                        {{$user->name}}, 
                        <?php $count = $pos++ ?>    
                    @endforeach
                    Likes this!<br>
                    @if($post->isLiked)
                    <?php print $count; ?>
                    <a href="{{ route('post.like', $post->id) }}" class="fa fa-thumbs-up" aria-hidden="true"> Unlike</a>
                    @else
                    <?php print $count; ?>
                    <a href="{{ route('post.like', $post->id) }}" class="fa fa-thumbs-o-up" aria-hidden="true"> Like</a>
                    @endif
                @else   
                    <?php $pos=1; ?>
                    @foreach ($post->likes as $user)
                        {{$user->name}}, 
                        <?php $count = $pos++ ?>    
                    @endforeach
                    Likes this!<br>
                    <?php print $count ?>
                    <a href="/login" class="fa fa-thumbs-o-up" aria-hidden="true"> Like</a>
                @endif

            </div><!-- /.blog-post -->
            @endif
            
        @endforeach
        </div>
    </div>


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
          document.getElementById("following").innerHTML = "<img src='{{ asset('icons/user.svg') }}'> Follow";
          document.getElementById("following").setAttribute("id", "follow");
        }
    }
</script>

</body>
</html>