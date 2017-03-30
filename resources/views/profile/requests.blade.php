@extends('/layouts/temp_main')
@section('content')
<div class="container">
	<div class="col-md-offset-1"> Friend Requests </div>
	<hr>
			@if (session()->has('msg'))   
	         	<p class="float- alert alert-success">
	         		{{session()->get('msg')}}
	         	</p>
	        @endif
</div>

	@foreach($FriendRequests as $uList)

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <img src="/uploads/avatars/{{$uList->avatar}}" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
            <h5>{{$uList->name}}</h5>
 		
            <a href="{{ route('profile.reject', $uList->id) }}" class="btn btn-secondary float-right"> Reject </a>

         	<a href="{{ route('profile.requests', [$uList->id, $uList->name]) }}" class="btn btn-info float-right" style="margin-right: .5rem;"> Accept </a>
        </div>
    </div>
</div>

	<hr>
	@endforeach

@endsection