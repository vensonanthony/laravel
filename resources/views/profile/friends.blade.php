@extends('/layouts/temp_main')
@section('content')
<?php 
	$friendsz = DB::table('friendships')
		->get();
	foreach ($friends as $friend) {
		$friendsz = $friend;
	}
 ?>


<div class="container">
	<h6>FriendList 
	
<!-- if (Auth::user()->id == $friendsz->user_id)

	(App\Friendships::where('accepted', 1)->where('user_id', Auth::user()->id)->count())
	
else

	(App\Friendships::where('accepted', 1)->where('friend_id', Auth::user()->id)->count())

endif -->


	</h6>

	@if (session()->has('msg'))   
        <p class="float- alert alert-success">
         	{{session()->get('msg')}}
        </p>
    @endif

</div>

@foreach($friends as $uList)
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <img src="/uploads/avatars/{{$uList->avatar}}" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
	            <h5>{{$uList->name}}</h5>

	            @if ($uList->user_id == Auth::user()->id)
	            <a href="{{ route('profile.remove', $uList->id) }}" class="btn btn-secondary float-right"> Unfriend </a>
	            @else
	            <a href="{{ route('profile.removeMe', $uList->id) }}" class="btn btn-secondary float-right"> Unfriend </a>
	            
	            @endif

	        </div>
	    </div>
	</div>
	<hr>
@endforeach

@endsection