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
		<link rel="stylesheet" href="{{ Asset::rev('css/application.css') }}">

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
		<div class="alert alert-danger alert-js text-center @if( Request::is('auth/login') ) alert-login @endif">Diese Web-App benötigt JavaScript. Sie haben JavaScript momentan deaktiviert. <a class="alert-link" href="http://www.enable-javascript.com/de/">Bitte aktivieren Sie JavaScript in Ihren Browsereinstellungen.</a></div>

		{{-- BETA INFO -----------------------------------------------------------}}
		<div class="alert alert-warning text-center @if( Request::is('auth/login') ) alert-login @endif">Sie nutzen eine <b>Beta Version</b> der »Synthesise« Web-App. Bitte verwenden Sie unseren <a class="alert-link" href="https://bitbucket.org/Inventionate/synthesise/issues/new" target="_blank">Issue Tracker</a> um uns Probleme mitzuteilen. Vielen Dank für Ihre Hilfe!</div>

		{{-- @yield MAIN CONTENT -------------------------------------------------}}
		@yield('content')

		<hr>

		{{-- @include FOOTER -----------------------------------------------------}}
			@include('layouts.partials.footer')

		{{-- APPLICATION JS ------------------------------------------------------}}
		<script src="{{ Asset::rev('js/application.js') }}"></script>

		{{-- @include ANALYTICS --------------------------------------------------}}
		@include('layouts.partials.analytics')
	</body>
