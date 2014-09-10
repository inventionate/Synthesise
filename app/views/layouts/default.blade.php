{{-- @todo BRANDING ÜBERARBEITEN, DAS LOGO MUSS BESSER ZUR GELTUNG KOMMEN! --}}

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="de"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="de"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="de"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="de"> <!--<![endif]-->
	<head>
		@section('meta')
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Web-App for interactive studies.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@show
		{{-- Browser Favicon --}}
		<link rel="shortcut icon" href="{{asset('favicon.ico')}}">
		{{-- Apple und Android Touch Icon --}}
		<link rel="apple-touch-icon-precomposed" href="{{asset('apple-touch-icon-precomposed.png')}}">
		{{-- Windows Tile Tags --}}
		<meta name="application-name" content="e:t:p:M – Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns">
		<meta name="msapplication-TileColor" content="#5ebc3b">
		<meta name="msapplication-TileImage" content="{{asset('metro-tile.png')}}">
		<meta name="msapplication-starturl" content="{{url('home')}}">
		<meta name="msapplication-navbutton-color" content="#5ebc3b">
		<meta name="msapplication-tooltip" content="e:t:p:M – Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns">
		{{-- Schriftarten laden --}}
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100" >
		{{-- Haupt-CSS laden --}}
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">
		{{-- Animate.css laden --}}
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}">

		<script src="{{ asset('js/init.min.js') }}"></script>

		@if( App::environment() === 'local' )
		  <script src="http://localhost:35729/livereload.js?snipver=1"></script>
		@endif

	</head>
	<body id="etpM-de">
		<!--[if lt IE 9]>
			<p class="alert alert-danger browsehappy">Sie nutzen einen <strong>veralteten</strong> Browser. Bitte <a href="http://browsehappy.com/">aktualisieren Sie Ihren Browser</a>.</p>
		<![endif]-->
		<div class="alert alert-danger alert-js">Diese Web-App benötigt JavaScript. Sie haben JavaScript momentan deaktiviert. <a class="alert-link" href="http://www.enable-javascript.com/de/">Bitte aktivieren Sie JavaScript in Ihren Browsereinstellungen.</a></div>

		@if ( Auth::check() )

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


 		{{-- BRANDING ÜBERARBEITEN --}}

		<div class="container">
			{{-- Brand and toggle get grouped for better mobile display --}}
			  <div class="navbar-header">
				<a class="etpM navbar-brand @if (Request::is('/')) active @endif" href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/" target="_blank">e:t:p:M</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<h1 class="nav-event-title hidden-md hidden-lg"><a href="{{ url('') }}">Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns</a></h1>
			  </div>

			{{-- Collect the nav links, forms, and other content for toggling --}}
			<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li @if ( Request::is('dashboard') ) class="active" @endif><a href="{{ url('dashboard') }}">Dashboard</a></li>
				<li class="dropdown @if ( Request::is('online-lektionen') ) active @endif">
					<a href="{{ url('online-lektionen') }}" class="dropdown-toggle" data-toggle="dropdown">online-Lektionen <b class="caret"></b></a>
					<ul class="dropdown-menu">
					  <li role="presentation" class="dropdown-header">Sozialgeschichte der Erziehung und Bildung</li>
					  <li><a href="{{ route('lektion','Griechisch-römische Antike') }}">Griechisch-römische Antike</a></li>
					  <li><a href="{{ route('lektion', 'Mittelalter') }}">Mittelalter</a></li>
					  <li><a href="{{ route('lektion', 'Frühe Neuzeit') }}">Frühe Neuzeit</a></li>
					  <li role="presentation" class="dropdown-header">Ideen- und Personengeschichte der Pädagogik</li>
					  <li><a href="{{ route('lektion', 'Jean-Jacques Rousseau') }}">Jean-Jacques Rousseau</a></li>
					  <li><a href="{{ route('lektion', 'Johann Heinrich Pestalozzi') }}">Johann Heinrich Pestalozzi</a></li>
					  <li><a href="{{ route('lektion', 'Wilhelm von Humboldt') }}">Wilhelm von Humboldt</a></li>
					  <li role="presentation" class="dropdown-header">Erziehung und Schule</li>
					  <li><a href="{{ route('lektion', 'Erziehung und Unterricht') }}">Erziehung und Unterricht</a></li>
					  <li><a href="{{ route('lektion', 'Heterogenität') }}">Heterogenität</a></li>
					  <li role="presentation" class="dropdown-header">Bildung – Glück – Gerechtigkeit</li>
					  <li><a href="{{ route('lektion', 'Wozu ist die Bildung da%3F') }}">Wozu ist die Bildung da?</a></li>
					  <li><a href="{{ route('lektion', 'Bildung und Glück') }}">Bildung und Glück</a></li>
					  <li><a href="{{ route('lektion', 'Bildung und Gerechtigkeit') }}">Bildung und Gerechtigkeit</a></li>
					  <li class="divider"></li>
					  <li><a class="rechtshinweise" href="{{ url('impressum') . '#rechtshinweise' }}">Rechtshinweise</a></li>

					</ul>
				</li>
				<li @if ( Request::is('hgf') ) class="active" @endif ><a href="{{ url('hgf') }}">Häufig gestellte Fragen</a></li>
				<li @if ( Request::is('kontakt') ) class="active" @endif ><a href="{{ url('kontakt') }}">Kontakt</a></li>
			</ul>

			<a href="{{ url('logout') }}" class="btn btn-primary btn-block navbar-right hidden-print">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} abmelden</a>

			</div>
			</div>
		</nav>

		@endif

		<section class="main-content-{{ Request::segment(1) }} @if ( !Request::is('login') ) container @endif">
			@yield('content')
		</section>

		<hr>

		<footer class="container">

			<p>
			<small>
			© 2012–2014 Gesamtkonzeption <span class="etpM"><b>e:t:p:M</b></span> Timo Hoyer |
			Mediengestaltung und Webentwicklung Fabian Mundt<br>
			<a href="{{ url('impressum') }}">Impressum</a> | <a href="#main-content">Nach oben</a>
			</small>
			</p>

		</footer>

		@section('scripts')

			{{-- Standardskripte (jQuery, Bootstrap, Console) laden und ggf. später ergänzen --}}

			{{-- jQuery extern laden --}}
			{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
			{{--<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery.min.js') }}"><\/script>')</script>--}}
			{{-- jQuery über die Web-App laden, damit eine bessere Kontrolle möglich wird. Da wiederkehrende Nutzer die Regel sind, dürften die Auswirkungen auf die Performance gering sein --}}
			<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>

			{{-- Die jQuery Datei und auch die anderen müssen als Fallback nachgeliefert werden! --}}


			@if( (Agent::isMobile() || Agent::isTablet()) && !(Request::is('login')) )
				{{-- Bookmark bubble modifizieren --}}
				<script type="text/javascript">
					var addToHomeConfig = {
						autostart: false,
						touchIcon: true
					};
				</script>
			@endif

			{{-- Plugins laden --}}
			<script src="{{ asset('js/plugins.min.js') }}"></script>


			@if( (Agent::isMobile() || Agent::isTablet()) && !(Request::is('login')) )
				{{-- Bookmark bubble Hash-Trick --}}
				<script type="text/javascript">
					function loaded () {
						if ( window.location.hash.match('ATHS') ) return;
							addToHome.show();
							window.location.hash = '#ATHS';
					}
					window.addEventListener('load', loaded, false);
				</script>
			@endif

		@show


		{{-- Piwik Implementierung--}}
		<script type="text/javascript">
		  var _paq = _paq || [];
		  _paq.push(["setCookieDomain", "*.home.ph-karlsruhe.de"]);
		  _paq.push(["setDomains", ["*.home.ph-karlsruhe.de", "*.m1ew.ph-karlsruhe.de"]]);
		  _paq.push(['trackPageView']);
		  _paq.push(['enableLinkTracking']);
		  (function() {
			var u=(("https:" == document.location.protocol) ? "https" : "http") + "://home.ph-karlsruhe.de/etpM/analytics/";
			_paq.push(['setTrackerUrl', u+'piwik.php']);
			_paq.push(['setSiteId', 1]);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
			g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
		  })();
		</script>
		<noscript><p><img src="http://home.ph-karlsruhe.de/etpM/analytics/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
		{{-- End Piwik Code --}}


	</body>
</html>
