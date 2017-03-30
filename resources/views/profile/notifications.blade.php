@extends('/layouts/temp_main')
@section('content')

<div class="container">
	<h6>New Friend </h6>
	@if (session()->has('msg'))   
        <p class="float- alert alert-success">
         	{{session()->get('msg')}}
        </p>
    @endif
</div>

@foreach($notes as $uList)
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <img src="/uploads/avatars/{{$uList->avatar}}" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
	            <h5>{{$uList->name}}</h5>
	 			<span>{{$uList->note}}</span>
	        </div>
	    </div>
	</div>
	<hr>
@endforeach


@endsection