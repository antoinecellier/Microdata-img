@extends('master')

@section('content')
	<div class="row">
			
		{{ Form::open(array('route' => array('addImg'), 
							'files' => true, 'role' => 'form', 'method' => 'POST', 
							'class' => 'mainForm')) }}

		<div class="row">
			<div class="form-group">
				{{ HTML::decode(Form::label('image_id','Choisissez une image')) }}
				{{ Form::file('image') }}
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				{{ Form::submit('Ajouter une image', array('type' => 'submit'))}}
			</div>
		</div>

		{{ Form::close() }}
	</div>
@stop