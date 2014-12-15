@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<a href="{{ URL::route('downloadIMG', $image['FileName']) }}">
				<button type="button" class="btn btn-primary">Télécharger l'image</button>
			</a>
			<a href="{{ URL::route('downloadXMP', $image['FileName']) }}">
				<button type="button" class="btn btn-primary">Télécharger XMP</button>
			</a>
			<hr>
			<h2>Relations Flickr</h2>
			Tags: <i>{{ $tags }}</i><br>
			<div class="row">
			@foreach ($flickr as $key => $value)
			<div class="col-md-6">
				<div class="thumbnail">
					{{ HTML::image($value['imageURL'],$value['title'],array('height' => 200)) }}
					<div class="caption"><h4>{{ $value['title'] }}</h4></div>
				</div>
			</div>
			 @endforeach
			</div>				
		</div>
		<div class="col-md-8 img-block">
			<table class="table">
				<thead>
					<tr>
						<th>
							Champ
						</th>
						<th>
							Valeur
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($image as $k => $v)
						<tr>
							<td>{{ $k }}</td>
							@if (is_array($v))
								<td>
									@foreach ($v as $element)
										{{ $element }}
									@endforeach
								</td>
							@else
								<td>{{ $v }}</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		 </div>
			
	</div>
@stop