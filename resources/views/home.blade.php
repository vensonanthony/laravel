@extends('layouts.app')

@section('content')


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
        @foreach($posts as $post)
            @if ( Auth::User()->id == $post->user->id )
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: absolute; padding-right: 1rem; top: 0; right: .5rem;"></a>
                <ul class="dropdown-menu" role="menu" style="position: absolute; top: 1.5rem; right: 0;left: 75%; width: 1rem;">
                    <li>
                        <a href="/posts/delete/{{$post->id}}">Delete</a>
                    </li>
                    <li>
                        <a href="{{ route('post.edit', $post->id) }}">Update</a>
                    </li>
                </ul>
                @endif

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
       
@endsection
