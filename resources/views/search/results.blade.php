@extends('layouts/temp_main')
@section('content')

<div class="container">
	<h3>
	Your Search for "{{ Request::input('query') }}"
	</h3>

	@if(!$users->count())
		<p>No results found, sorry.</p>
	@else
	<div class="row">
		@foreach($users as $user)
			@include('user/partials/userblock')
		@endforeach
	</div>
	@endif
</div>

@endsection