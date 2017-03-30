@extends('/layouts/temp_main')
@section('content')
<div>
	{{$imagesImage->image_name}}:<br>
	<img src="/imgs/images/{{$imagesImage->image_name.'.'.$imagesImage->image_extension.'?'.'time='.time()}}">
</div>

<div>
	{{$imagesImage->mobile_image_name}}-mobile:<br>
	<img src="/imgs/images/mobile/{{$imagesImage->mobile_image_name.'.'.$imagesImage->mobile_extension.'?'.'time='.time()}}">
</div>

@endsection
