@extends('/layouts/temp_main')
@section('content')
<div class="container">
<h1>Upload a photo</h1><hr>
<div class="row">

@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong>
		There were some problems with your input. <br><br>

		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

{!!Form::open(array(
				'route'=>'imageStore', 
				'class'=>'form', 
				'files'=>true))!!}

<div class="form-group">
	{!!Form::label('image name', 'Image name:')!!}

	{!!Form::text('image_name', null, ['class'=>'form-control'])!!}
</div>


<div class="form-group">
	{!!Form::label('mobile_image_name', 'Mobile Image Name:')!!}

	{!!Form::text('mobile_image_name', null, ['class'=>'form-control'])!!}
</div>


<div class="form-group">
	{!!Form::label('is_active', 'Is Active:')!!}

	{!!Form::checkbox('is_active')!!}
</div>


<div class="form-group">
	{!!Form::label('is_featured', 'Is Featured')!!}

	{!!Form::checkbox('is_featured')!!}
</div>


<div class="form-group">
	{!!Form::label('image', 'Primary Image')!!}

	{!!Form::file('image', null, array('required', 'class'=>'form-control'))!!}	
</div>


<div class="form-group">
	{!!Form::label('mobile_image', 'Mobile Image')!!}

	{!!Form::file('mobile_image', null, array('required', 'class'=>'form-control'))!!}
</div>


<div class="form-group">
	{!!Form::submit('upload Photo', array('class'=>'btn btn-primary'))!!}
</div>

{!!Form::close()!!}
</div>
</div>
@endsection