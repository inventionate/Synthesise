@extends('layouts.default')

@section('title')
<title>EW M1 – Login</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}">

	<header class="jumbotron text-center">
		<h1>e:t:p:M</h1>
		<h2>Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns</h2>
		<h3 class="sr-only">Login</h3>
		<p class="lead">Einführungsveranstaltung (Modul 1) an der Pädagogischen Hochschule Karlsruhe</p>
	</header>

	{!! Form::open(['url' => 'login','class' => 'form-inline text-center', 'id' => 'login', 'role' => 'form']) !!}
	<div @if ( !(Session::has('login_errors')) && !(Session::has('errors')) ) class="animated zoomIn" @else class="animated shake" @endif>
		{{-- Eingabe des Benutzernamens --}}
		<div class="form-group @if (Session::has('errors') || Session::has('login_errors')) has-error @endif">
			{!! Form::label('username', 'Benutzername', ['class' => 'sr-only']) !!}
			<div class="input-group input-group-lg">
				{!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'LSF Benutzername']) !!}
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			</div>
		</div>

		{{-- Eingabe des Passworts --}}
		<div class="form-group @if (Session::has('errors') || Session::has('login_errors')) has-error @endif">
			{!! Form::label('password', 'Passwort', ['class' => 'sr-only']) !!}
			<div class="input-group input-group-lg">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'LSF Passwort']) !!}
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			</div>
		</div>

		{{-- @todo Remember me Funktion aktivieren! --}}
		{{-- Remember me
		<div class="checkbox">
			<label>
				<input type="checkbox"> Remember me
			</label>
		</div> --}}

		{{-- Anmelde Button --}}
		{!! Form::submit('Anmelden', ['id' => 'btn-login','class' => 'btn btn-primary btn-lg', 'role' => 'button']) !!}
	{!! Form::close() !!}
</main>
@stop