<html>
	<head>
  {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
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
            <li>{{ HTML::link(route('carto'),'Cartographie') }}</li>
            <li>{{ HTML::link(route('addImg'),'Ajouter une image') }}</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

       @yield('content')

    </div><!-- /.container -->
		



	</body>
</html>