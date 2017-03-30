<?php  
    $friendz = DB::table('friendships')
            ->get();
 ?>

@if( (Auth::User()->id == $post->user->id) OR (isset($friends) AND in_array($post->user->id, $friends)) )

<!-- if( Auth::User()->id == $post->user->id || $friendz->accepted == 1 ) -->
<div class="blog-post">

    <h2 class="blog-post-title"><a class="left_nav title" href="/posts/show/{{$post->id}}">{{$post->title}}</a>
    </h2>

    @if(Auth::user())
    	@if(Auth::User()->id == $post->user->id)
    <div class="relative">
        <div class="dd">
        	<div class="btn-group dd_1" role="group" aria-label="Button group with nested dropdown">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 
                </button>
                <div class="dropdown-menu resize dd_2" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="/posts/edit/{{$post->id}}">Edit</a>
                  <a class="dropdown-item" href="/posts/delete/{{$post->id}}">Delete</a>
                </div>
        	</div>
        </div>
    </div>
    	@endif
    @endif

    <p class="blog-post-meta" style="position: relative;">
    	<img src="/uploads/avatars/{{$post->user->avatar}}" style="width: 32px; border-radius: 50%;">
        <a class="prof_name" href="">{{$post->user->name}}</a>
        | {{ $post->created_at->diffForHumans() }} <!-- <a href="#">hashtag</a>-->
        <span class="float-right">
            <span class="label">Novel</span>
            <span class="label">Ecchi</span>
            <span class="label">Slice of Life</span>
        </span>
    </p>

    <p>
        {{str_limit($post->body, $limit = 302, $end = '...')}} 
    	<br>
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
        Likes this!
        <br>
    @if($post->isLiked)
        <?php print $count; ?>
        <a href="{{ route('post.like', $post->id) }}" class="fa fa-thumbs-up" aria-hidden="true">Unlike</a>
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
        Likes this!
        <br>
        <?php print $count ?>
        <a href="/login" class="fa fa-thumbs-o-up" aria-hidden="true"> Like</a>
@endif
</div><!-- /.blog-post -->
@endif
