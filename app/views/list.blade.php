@extends('master')

@section('content')
	<div class="row">
			@foreach ($images as $image)
				<div class="col-md-4 img-block">
					<div class="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
						<a href="image/{{ $image['FileName']}}">
							{{ HTML::image($image['SourceFile'],$image['FileName'],
											array('height' => 200)) }}
						</a>
						<div class="caption">
							<h3 itemprop="name">
								<a href="image/{{ $image['FileName']}}">
									{{ $image['Title'] }}
								</a>
							</h3>
							<h4 itemprop="author">{{ $image['Creator'] }}</h3>
							<p itemprop="description">
								{{ substr($image['Description'], 0, 125) }}...
							</p>
						</div>
					</div>
				</div>
		    @endforeach
	</div>
@stop