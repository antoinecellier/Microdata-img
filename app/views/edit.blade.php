@extends('master')

@section('content')
	<div class="row">
			
		{{ Form::open(array('route' => array('editImg',$imageName), 
							'files' => true, 'role' => 'form', 'method' => 'POST', 
							'class' => 'mainForm')) }}

		@foreach ($image as $k => $v)
			@if(in_array($k, $data_modif) && !is_array($v))
				<div class="row">
					<div class="form-group">
						{{ HTML::decode(Form::label($k,$k)) }}
						{{ Form::text($k,$v,array('type' => 'text', 'class' => ''))}}
					</div>
				</div>
			@endif
		@endforeach
		<div class="row">
			<div class="form-group">
				{{ Form::submit('Valider l\'image', array('type' => 'submit'))}}
			</div>
		</div>

		{{ Form::close() }}
	</div>
@stop