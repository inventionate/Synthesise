@extends('layouts.default')

@section('meta')
@parent 
<title>EW M1</title>

{{-- //NOTE iOS Info CSS laden --}}
<link rel="stylesheet" href="{{ asset('css/add2home.css') }}">
@stop 

@section('body')

<h1 class="visible-print">Login</h1>

<div class="alert alert-info">Zugang zur Modul 1 Veranstaltung des Instituts für Allgemeine und Historische Erziehungswissenschaft.</div>

@if (Session::has('errors') || Session::has('login_errors'))
	<div class="alert alert-danger">Ihre Zugangsdaten waren nicht korrekt.</div>  
@endif

{{ Form::open(array('url' => 'login','class' => 'form-horizontal', 'id' => 'login')) }}
	{{-- Eingabe des Benutzernamens -----------------------------}} 
<div class="form-group @if (Session::has('errors') || Session::has('login_errors')) has-error @endif">
	{{ Form::label('username', 'Benutzername', array('class' => 'col-lg-2 col-md-3 control-label')) }}
	<div class="col-lg-3 col-md-3">
	{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'LSF Benutzername')) }} 
	</div>
</div>
	{{-- Eingabe des Passworts ----------------------------------}}
<div class="form-group @if (Session::has('errors') || Session::has('login_errors')) has-error @endif">
	{{ Form::label('password', 'Passwort', array('class' => 'col-lg-2 col-md-3 control-label')) }}
	<div class="col-lg-3 col-md-3">
	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'LSF Passwort')) }} 

	{{-- Anmelde Button -----------------------------------------}}

	{{ Form::submit('Anmelden', array('class' => 'btn btn-primary')) }}
	</div>
</div>
{{ Form::close() }}

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