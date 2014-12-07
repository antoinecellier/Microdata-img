@extends('master')

@section('content')
	<div class="row">
		<div id="carto">
			
		</div>
	</div>
	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
	{{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyBtuAPA7ma1G3E0xPdc4-lJsOF7IlveREU')}}
	{{ HTML::script('assets/js/main.js') }}
@stop