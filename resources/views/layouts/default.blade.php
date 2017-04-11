<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	{{--------------------------------------------------------------------------}}
	{{-- ############################### HEAD ############################### --}}
	{{--------------------------------------------------------------------------}}
	<head>

		{{-- @include PARTIAL HEAD -----------------------------------------------}}
		@include('layouts.partials.head')

		{{-- APPLICATION CSS -----------------------------------------------------}}
		<link rel="stylesheet" href="{{ mix("css/application.css") }}">

	</head>

	{{--------------------------------------------------------------------------}}
	{{-- ############################### BODY ############################### --}}
	{{--------------------------------------------------------------------------}}
	<body id="etpM-de" @if ( Auth::user() && Auth::user()->role != 'Student' ) class="admin" @endif>

		{{-- BROWSEHAPPY INFO ----------------------------------------------------}}
		<!--[if lt IE 9]>
			<p class="alert alert-danger browsehappy text-center @if( Request::is('login') ) alert-login @endif">Sie nutzen einen <strong>veralteten</strong> Browser. Bitte <a href="http://browsehappy.com/">aktualisieren Sie Ihren Browser</a>.</p>
		<![endif]-->

		{{-- @include NAVIGATION -------------------------------------------------}}
		@if ( Auth::check() )
			@include('layouts.partials.nav')
		@endif

		{{-- JAVASCRIPT INFO -----------------------------------------------------}}
		<noscript>
		<div class="ui negative message @if( Request::is('login') ) login @endif">Diese Web-App benötigt JavaScript. Sie haben JavaScript momentan deaktiviert. <a class="alert-link" href="http://www.enable-javascript.com/de/">Bitte aktivieren Sie JavaScript in Ihren Browsereinstellungen.</a></div>
		</noscript>

		{{-- @yield MAIN CONTENT -------------------------------------------------}}

		@yield('content')

		<div class="ui divider"></div>

		{{-- @include FOOTER -----------------------------------------------------}}
		@include('layouts.partials.footer')

		{{-- APPLICATION JS ------------------------------------------------------}}
		<script src="{{ mix("js/manifest.js") }}"></script>
		<script src="{{ mix("js/vendor.js") }}"></script>
		<script src="{{ mix("js/application.js") }}"></script>

		@section('scripts')
		@show

		{{-- @include ANALYTICS --------------------------------------------------}}
		@if ( !Config::get('app.debug') )

			@include('layouts.partials.analytics')

		@else
			<script type="text/javascript">

			  	var _paq = _paq || [];

			</script>

		@endif

		@if ( Agent::isMobile() )

			<script type="text/javascript">

				$('.left.sidebar').first().sidebar('attach events', '.toggle.button');

				$('.toggle.button').removeClass('disabled');

			</script>

		@endif
	</body>
</html>
