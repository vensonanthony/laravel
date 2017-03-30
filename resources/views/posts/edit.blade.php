@extends('/layouts/temp_main')
@section('content')
<div class="blog-post" style="margin: 0 auto;">
  <form method="post" action="/posts/update/{{$post->id}}">
  {{csrf_field()}}
    <p class="blog-post-meta">
    <img src="/uploads/avatars/{{$post->user->avatar}}" style="width: 32px; border-radius: 50%;">
    <a  class="prof_name" href="">
      {{$post->User->name}}
    </a>| {{ $post->created_at->diffForHumans() }}
    <span class="float-right">
    <span class="label">Novel</span>
    <span class="label">Ecchi</span>
    <span class="label">Slice of Life</span></span></p>

    <p>
    <h2 class="blog-post-title">
      <div class="form-group">
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
      </div>
    </h2>

    
      <div class="form-group">
        <textarea name="body" id="body" class="form-control" style="min-height: 20rem;">{{ $post->body }}</textarea><br>
      </div>

      
    </p>
        
    <div class="form-group float-right">
      <button type="submit" class="btn btn-primary"> Publish </button>
    </div>

  </form>

</div><!-- /.blog-post -->
@endsection