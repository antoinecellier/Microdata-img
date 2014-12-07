@extends('master')

@section('content')
	<div class="row">
			@foreach ($images as $image)
				<div class="col-md-4 img-block">
					<a href="image/{{ $image['FileName']}}">
						{{ HTML::image($image['SourceFile'],$image['FileName'],array('height' => 200)) }}
					</a>
				</div>
		    @endforeach
	</div>
@stop