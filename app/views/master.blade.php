<html>
	<head>
		{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
		{{ HTML::style('assets/style.css') }}
		<meta charset="utf-8">
	</head>
	<body>
    <nav class="navbar navbar-inverse navbar-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Microdata img</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">{{ HTML::link(route('home'),'Accueil') }}</li>
            <li><a href="#about">Ajouter une image</a></li>
            <li><a href="#contact">Documentation</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

       @yield('content')

    </div><!-- /.container -->
		



	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
	{{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyBtuAPA7ma1G3E0xPdc4-lJsOF7IlveREU')}}
	{{ HTML::script('https://google-maps-utility-library-v3.googlecode.com/svn/tags/markerclusterer/1.0.2/src/markerclusterer.js')}}
	{{ HTML::script('assets/js/georeferencementMain.js') }}

	</body>
</html>