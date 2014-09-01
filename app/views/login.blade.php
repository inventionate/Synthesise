@extends('layouts.default')

@section('meta')
@parent 
<title>EW M1</title>

{{-- //NOTE iOS Info CSS laden --}}
<link rel="stylesheet" href="{{ asset('css/add2home.css') }}">
@stop 

@section('content')
<section id="login-content">
<header class="jumbotron text-center">
	<h1>e:t:p:M</h1>
	<h2>Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns</h2>
	<h3 class="sr-only">Login</h3>
	<p class="lead">Einführungsveranstaltung (Modul 1) an der Pädagogischen Hochschule Karlsruhe</p>
</header>

{{ Form::open(array('url' => 'login','class' => 'form-inline text-center', 'id' => 'login', 'role' => 'form')) }}
<div class="@if ( !(Session::has('login_errors')) && !(Session::has('errors')) ) animated zoomIn @else animated shake @endif">
	
	{{-- Eingabe des Benutzernamens --}} 
	<div class="form-group @if (Session::has('errors') || Session::has('login_errors')) has-error @endif">
		{{ Form::label('username', 'Benutzername', array('class' => 'sr-only')) }}
		<div class="input-group input-group-lg">
			{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'LSF Benutzername')) }} 
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
		</div>
	</div>
	
	{{-- Eingabe des Passworts --}}
	<div class="form-group @if (Session::has('errors') || Session::has('login_errors')) has-error @endif">
		{{ Form::label('password', 'Passwort', array('class' => 'sr-only')) }}
		<div class="input-group input-group-lg">
			{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'LSF Passwort')) }} 
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
		</div>
	</div>
	
	{{-- Remember me 
	<div class="checkbox">
		<label>
			<input type="checkbox"> Remember me
		</label>
	</div> --}}				

	{{-- Anmelde Button --}}
	{{ Form::submit('Anmelden', array('class' => 'btn btn-primary btn-lg', 'role' => 'button')) }}
{{ Form::close() }}
</section>
@stop

@section('scripts')

  @parent

	@if( ($mobile || $tablet) && (URL::current() === url('login')) )
		{{-- Bookmark bubble laden inkl. Hash-Trick--}}
		<script type="text/javascript">
			var addToHomeConfig = {
				autostart: false,
				touchIcon: true,
				startDelay: 500				
			};
		</script>

		<script type="text/javascript" src="{{ asset('js/add2home.min.js') }}"></script>

		<script type="text/javascript">
			function loaded () {
				if ( window.location.hash.match('ATHS') ) return;
					addToHome.show();
					window.location.hash = '#ATHS';
			}
			window.addEventListener('load', loaded, false);
		</script>
	@endif
@stop