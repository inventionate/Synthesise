<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="de"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="de"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="de"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="de"> <!--<![endif]-->
	{{--------------------------------------------------------------------------}}
	{{-- ############################### HEAD ############################### --}}
	{{--------------------------------------------------------------------------}}
	<head>

		{{-- @include PARTIAL HEAD -----------------------------------------------}}
		@include('layouts.partials.head')

		{{-- APPLICATION CSS -----------------------------------------------------}}
		@if ( Config::get('app.debug') )
			<link rel="stylesheet" href="{{ asset("css/application.css") }}">
		@else
			<link rel="stylesheet" href="{{ elixir("css/application.css") }}">
		@endif

		{{-- MODERNIZR JS --------------------------------------------------------}}
		@if ( Config::get('app.debug') )
			<script src="{{ asset("js/vendor/modernizr-custom.js") }}"></script>
		@else
			<script src="{{ elixir("js/vendor/modernizr-custom.js") }}"></script>
		@endif

	</head>

	{{--------------------------------------------------------------------------}}
	{{-- ############################### BODY ############################### --}}
	{{--------------------------------------------------------------------------}}
	<body id="etpM-de">

		{{-- BROWSEHAPPY INFO ----------------------------------------------------}}
		<!--[if lt IE 9]>
			<p class="alert alert-danger browsehappy text-center @if( Request::is('login') ) alert-login @endif">Sie nutzen einen <strong>veralteten</strong> Browser. Bitte <a href="http://browsehappy.com/">aktualisieren Sie Ihren Browser</a>.</p>
		<![endif]-->

		{{-- @include NAVIGATION -------------------------------------------------}}
		@if ( Auth::check() )
			@include('layouts.partials.nav')
		@endif

		{{-- JAVASCRIPT INFO -----------------------------------------------------}}
		<div class="ui negative message @if( Request::is('auth/login') ) login @endif">Diese Web-App benötigt JavaScript. Sie haben JavaScript momentan deaktiviert. <a class="alert-link" href="http://www.enable-javascript.com/de/">Bitte aktivieren Sie JavaScript in Ihren Browsereinstellungen.</a></div>

		{{-- @yield MAIN CONTENT -------------------------------------------------}}

		@yield('content')

		<div class="ui divider"></div>

		{{-- @include FOOTER -----------------------------------------------------}}
		@include('layouts.partials.footer')

		{{-- APPLICATION JS ------------------------------------------------------}}
		@if ( Config::get('app.debug') )
			<script src="{{ asset("js/application.js") }}"></script>
		@else
			<script src="{{ elixir("js/application.js") }}"></script>
		@endif

		@section('scripts')
		@show

		{{-- @include ANALYTICS --------------------------------------------------}}
		@include('layouts.partials.analytics')
	</body>
</html>
