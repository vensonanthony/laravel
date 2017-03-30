@extends('/layouts/temp_main')
@section('content')
<div class="container">
<div class="blog-post">
  <h2 class="blog-post-title">{{ $post->title }}</h2>
  <p class="blog-post-meta">
    <img src="/uploads/avatars/{{$post->user->avatar}}" style="width: 32px; border-radius: 50%;">
    <a  class="prof_name" href="">{{ $post->user->name }} </a>| {{ $post->created_at->diffForHumans() }} <!-- <a href="#">hashtag</a>-->
    <span class="float-right">
    <span class="label">Novel</span>
    <span class="label">Ecchi</span>
    <span class="label">Slice of Life</span></span>
  </p>

  <p class="relative"> 
    @foreach( (explode(PHP_EOL, $post->body)) as $paragraph)
      <p>{{$paragraph}}</p>
    @endforeach
  </p>
  <div class="form-group">
  
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
      <a data-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="comment">Comment</a>
      <a class="float-right" href="">Sort By Best</a>

    <!-- <div class="collapse" id="comment"> -->
      @include('comments/create')
    <!-- </div> -->
  </div>

  <hr>

</div><!-- /.blog-post -->
</div>
@endsection