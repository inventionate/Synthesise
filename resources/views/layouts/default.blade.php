<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="de"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="de"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="de"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="de"> <!--<![endif]-->
	{{--------------------------------------------------------------------------}}
	{{-- ############################### HEAD ############################### --}}
	{{--------------------------------------------------------------------------}}
	<head>

		@if( App::environment() === 'local' )
			{{-- LIVERELOAD DEV SCRIPT ---------------------------------------------}}
			<script src="http://synthesise.local:35729/livereload.js?snipver=1"></script>
			{{-- QUNIT DEV SCRIPT ---------------------------------------------}}
 			{{--		<link rel="stylesheet" href="{{ asset('qunit/qunit.css') }}">
<script src="{{ asset('qunit/qunit.js') }}"></script> --}}
		@endif

		{{-- @include PARTIAL HEAD -----------------------------------------------}}
		@include('layouts.partials.head')

		@if( App::environment() === 'local' )
			{{-- APPLICATION CSS -----------------------------------------------------}}
			<link rel="stylesheet" href="{{ asset(Asset::rev('css/application.css')) }}" data-turbolinks-track>
			{{-- APPLICATION JS ------------------------------------------------------}}
			<script src="{{ asset(Asset::rev('js/application.js')) }}" data-turbolinks-track></script>
		@elseif( App::environment() === 'production' )
			{{-- APPLICATION CSS -----------------------------------------------------}}
			<link rel="stylesheet" href="{{ secure_asset(Asset::rev('css/application.css')) }}" data-turbolinks-track>
			{{-- APPLICATION JS ------------------------------------------------------}}
			<script src="{{ secure_asset(Asset::rev('js/application.js')) }}" data-turbolinks-track></script>
		@endif

	</head>

	{{--------------------------------------------------------------------------}}
	{{-- ############################### BODY ############################### --}}
	{{--------------------------------------------------------------------------}}
	<body id="etpM-de">

		{{-- BROWSEHAPPY INFO ----------------------------------------------------}}
		<!--[if lt IE 9]>
			<p class="alert alert-danger browsehappy text-center @if( Request::is('login') ) alert-login @endif" data-no-turbolink>Sie nutzen einen <strong>veralteten</strong> Browser. Bitte <a href="http://browsehappy.com/">aktualisieren Sie Ihren Browser</a>.</p>
		<![endif]-->


		{{-- @include NAVIGATION -------------------------------------------------}}
		@if ( Auth::check() )
			@include('layouts.partials.nav')
		@endif

		{{-- JAVASCRIPT INFO -----------------------------------------------------}}
		<div class="alert alert-danger alert-js text-center @if( Request::is('login') ) alert-login @endif">Diese Web-App benötigt JavaScript. Sie haben JavaScript momentan deaktiviert. <a class="alert-link" href="http://www.enable-javascript.com/de/">Bitte aktivieren Sie JavaScript in Ihren Browsereinstellungen.</a></div>

		{{-- BETA INFO -----------------------------------------------------------}}
		<div class="alert alert-warning text-center @if( Request::is('login') ) alert-login @endif">Sie nutzen eine <b>Beta Version</b> der »Synthesise« Web-App. Bitte verwenden Sie unseren <a class="alert-link" href="https://bitbucket.org/Inventionate/synthesise/issues/new" target="_blank">Issue Tracker</a> um uns Probleme mitzuteilen. Vielen Dank für Ihre Hilfe!</div>

		{{-- @yield MAIN CONTENT -------------------------------------------------}}
		@yield('content')

		<hr>

		{{-- @include FOOTER -----------------------------------------------------}}
			@include('layouts.partials.footer')

		{{-- @include ANALYTICS --------------------------------------------------}}
		@include('layouts.partials.analytics')

		{{-- @include ANALYTICS --------------------------------------------------}}
		@if( App::environment() === 'local' )
{{-- 			<div id="qunit"></div>
<div id="qunit-fixture"></div>
<script src="{{ asset('qunit/tests.js') }}"></script> --}}
		@endif
	</body>
