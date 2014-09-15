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
		{{-- Haupt-CSS laden
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">
		{{-- Animate.css laden
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
		--}}


		<link rel="stylesheet" href="{{ Asset::rev('css/application.css') }}">
		<script src="{{ Asset::rev('js/application.js') }}"></script>

		{{-- Dieses Skript und Styles, die je neu zu bestimmen sind via Blade! --}}
		@section('assets')

		<!-- <link rel="stylesheet" href="{{ asset('css/special.css') }}">
		<script src="{{ asset('js/specialscript.js') }}"></script> -->

		@show

		@if( App::environment() === 'local' )
    	<script src="http://localhost:35729/livereload.js?snipver=1"></script>
    @endif

		<script src="{{ Asset::rev('js/turbolinks.js') }}"></script>

	</head>
	<body id="etpM-de">
		<!--[if lt IE 9]>
			<p class="alert alert-danger browsehappy">Sie nutzen einen <strong>veralteten</strong> Browser. Bitte <a href="http://browsehappy.com/">aktualisieren Sie Ihren Browser</a>.</p>
		<![endif]-->
		<div class="alert alert-danger alert-js">Diese Web-App benötigt JavaScript. Sie haben JavaScript momentan deaktiviert. <a class="alert-link" href="http://www.enable-javascript.com/de/">Bitte aktivieren Sie JavaScript in Ihren Browsereinstellungen.</a></div>

		@if ( Auth::check() )

		@include('layouts.partials.nav')

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
			{{--<script src="{{ asset('js/libs/jquery.min.js') }}"></script>--}}

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
		  {{--<script src="{{ asset('js/plugins.min.js') }}"></script>--}}


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
