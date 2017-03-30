@extends('/layouts/temp_main')
@section('content')
<div class="container">
	<div class="col-md-offset-1"> Soul Searching </div>
	<hr>
</div>
			@foreach($allUsers as $uList)

		<div class="container">
		    <div class="row">
		        <div class="col-md-10 col-md-offset-1">
		            <img src="/uploads/avatars/{{$uList->avatar}}" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
		            <a href="{{ route('partials.profiles', $uList->name) }}"><h5>{{$uList->name}}</h5></a>

		        <?php 
		        	$check = DB::table('friendships')
		        		->where('friend_id', '=', $uList->id)
		        		->where('user_id', '=', Auth::user()->id)
		        		->first();

		        	$check2 = DB::table('friendships')
		        		->where('friend_id', '=', Auth::user()->id)
		        		->where('user_id', '=', $uList->id)
		        		->first();

		        	if ($check == '' AND $check2 == '') {
		         ?>
		            <form enctype="multipart/form-data" action="/addFriend/{{$uList->id}}" method="get">
		                <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                <button type="submit" class="btn btn-success float-right">Add to Friend</button>
		            </form>

		        <?php  
		        	} else {
		         ?>

		         <p class="float-right">Request Already Sent</p>

		        <?php
		        	}
		         ?>

		        </div>
		    </div>
		</div>
				<hr>
			@endforeach


@endsection