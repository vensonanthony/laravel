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
			<form method="post" action="/comments/{{$post->id}}">
				{{csrf_field()}}

				<div class="form-group">
				@if(Auth::check())
					<img class="avatar" src="/uploads/avatars/{{Auth::User()->avatar}}" >
				@else
					<img class="avatar" src="/uploads/avatars/default.jpg" >
				@endif
					<textarea name="body" id="comment" class="form-control right" required="required" placeholder="Join the Discussion..."></textarea>
				</div>
				<button type="submit" class="btn btn-secondary" style="position: absolute; bottom: -3rem; right: -3rem;">></button>
			</form>
		</div>

		<div class="container">
			<hr>
			@foreach ($post->comments as $comment)	
				
			<div class="media" style="min-height: auto; position: relative;">
			    <div class="media-left">
			    	<img src="/uploads/avatars/{{$comment->user->avatar}}" style="width: 32px; border-radius: 50%; margin-right: 5px;">
			    </div>
			    <div class="media-body">
			      	<h6 class="media-heading">{{ $comment->user->name }} |<small><i> {{ $comment->created_at->diffForHumans() }}</i></small></h6>
			      	<p>
			      		{{ $comment->body }}
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
						<form method="post" action="/replies/{{$comment->id}}">
							{{csrf_field()}}

							<div class="form-group">
							@if(Auth::check())
								<img class="avatar_reply" src="/uploads/avatars/{{Auth::User()->avatar}}" >
							@else
								<img class="avatar" src="/uploads/avatars/default.jpg" >
							@endif
								<textarea name="body" id="comment" class="form-control right_reply" required="required" placeholder="Join the Discussion..."></textarea>
							</div>
							<button type="submit" class="btn btn-secondary" style="position: absolute; bottom: 0.5rem; right: 0;">></button>
						</form>
					</div>
					<hr>
			    	
			      	<!-- Nested media object -->
			      	
			      	@foreach($comment->reply as $reply)
			      		@include('/replies/create')
			     	@endforeach
			     	
			    </div>
			</div>
			@endforeach
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
