<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="de"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="de"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="de"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="de"> <!--<![endif]-->
	{{--------------------------------------------------------------------------}}
	{{-- ############################### HEAD ############################### --}}
	{{--------------------------------------------------------------------------}}
	<head>

		{{-- LIVERELOAD DEV SCRIPT -----------------------------------------------}}
		@if( App::environment() === 'local' )
			<script src="http://synthesise.local:35729/livereload.js?snipver=1" data-turbolinks-track></script>
		@endif

		{{-- @include PARTIAL HEAD -----------------------------------------------}}
		@include('layouts.partials.head')

		{{-- APPLICATION CSS -----------------------------------------------------}}
		<link rel="stylesheet" href="{{ Asset::rev('css/application.css') }}" data-turbolinks-track>

		{{-- APPLICATION JS ------------------------------------------------------}}
		<script src="{{ Asset::rev('js/application.js') }}" data-turbolinks-track></script>

		{{-- @section SCRIPTS ----------------------------------------------------}}
		@section('scripts')
		@show

		{{-- @todo Diese Skripte in die globale JS Datei aufnehmen --}}
		<script src="{{ Asset::rev('js/animate.js') }}"></script>
		{{-- Spezifische Animationsoptionen --}}
		<script src="{{ Asset::rev('js/analytics.js') }}"></script>

		{{-- TURBOLINKS SCRIPT ---------------------------------------------------}}
		<script src="{{ Asset::rev('js/turbolinks.js') }}"></script>

	</head>

	{{--------------------------------------------------------------------------}}
	{{-- ############################### BODY ############################### --}}
	{{--------------------------------------------------------------------------}}
	<body id="etpM-de">

		{{-- BROWSEHAPPY INFO ----------------------------------------------------}}
		<!--[if lt IE 9]>
			<p class="alert alert-danger browsehappy">Sie nutzen einen <strong>veralteten</strong> Browser. Bitte <a href="http://browsehappy.com/">aktualisieren Sie Ihren Browser</a>.</p>
		<![endif]-->

		{{-- JAVASCRIPT INFO -----------------------------------------------------}}
		<div class="alert alert-danger alert-js">Diese Web-App benötigt JavaScript. Sie haben JavaScript momentan deaktiviert. <a class="alert-link" href="http://www.enable-javascript.com/de/">Bitte aktivieren Sie JavaScript in Ihren Browsereinstellungen.</a></div>

		{{-- @include NAVIGATION -------------------------------------------------}}
		@if ( Auth::check() )
			@include('layouts.partials.nav')
		@endif

		{{-- @yield MAIN CONTENT -------------------------------------------------}}
		@yield('content')

		<hr>

		{{-- @include FOOTER -----------------------------------------------------}}
			@include('layouts.partials.footer')

		{{-- @include ANALYTICS -------------------------------------------------}}
		@include('layouts.partials.analytics')
	</body>

</html>
