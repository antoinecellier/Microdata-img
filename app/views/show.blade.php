@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h2>Relations Flickr</h2>
			Tags: <i>{{ $tags }}</i>
			@foreach ($flickr as $key => $value)
				{{ HTML::image($value['imageURL'],$value['title'],array('height' => 200)) }}		
			 @endforeach
									
		</div>
		<div class="col-md-6 img-block">

			<a href="{{ URL::route('downloadIMG', $image['FileName']) }}">
				<button type="button" class="btn btn-primary">Télécharger l'image</button>
			</a>
			<a href="{{ URL::route('downloadXMP', $image['FileName']) }}">
				<button type="button" class="btn btn-primary">Télécharger XMP</button>
			</a>
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