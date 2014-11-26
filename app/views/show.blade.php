@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12 img-block">
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