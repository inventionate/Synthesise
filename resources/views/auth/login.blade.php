@extends('layouts.default')

@section('title')
<title>EW M1 – Login</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui centered grid">
	{{-- @todo Inline CSS entfernen und bessere Lösung suchen! --}}
	<header class="sixteen wide center aligned column">
		<h1>e:t:p:M</h1>
		<h2>Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns</h2>
		<h3>Einführungsveranstaltung (Modul 1) an der Pädagogischen Hochschule Karlsruhe</h3>
	</header>
	<div class="sixteen wide center aligned column">
	{!! Form::open(['url' => 'auth/login','class' => 'form-inline text-center', 'id' => 'login', 'role' => 'form']) !!}
	<div @if ( !(Session::has('login_errors')) && !(Session::has('errors')) ) class="animated zoomIn" @else class="animated shake" @endif>
		{{-- Eingabe des Benutzernamens --}}
		<div class="form-group @if (Session::has('errors') || Session::has('login_errors')) has-error @endif">
			{!! Form::label('username', 'Benutzername', ['class' => 'sr-only']) !!}
			<div class="input-group input-group-lg">
				{!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'LSF Benutzername', 'required']) !!}
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			</div>
		</div>

		{{-- Eingabe des Passworts --}}
		<div class="form-group @if (Session::has('errors') || Session::has('login_errors')) has-error @endif">
			{!! Form::label('password', 'Passwort', ['class' => 'sr-only']) !!}
			<div class="input-group input-group-lg">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'LSF Passwort', 'required']) !!}
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			</div>
		</div>
		{{-- Anmelde Button --}}
		{!! Form::submit('Anmelden', ['id' => 'login','class' => 'btn btn-primary btn-lg', 'role' => 'button']) !!}
		<div class="clearfix">
		</div>
		{{-- Remember me --}}
		<div class="checkbox" style="font-size: 1.2em;">
			{!! Form::label('rememberme', 'Angemeldet bleiben') !!}
			{!! Form::checkbox('rememberme', true, false) !!}
		</div>
	{!! Form::close() !!}
	</div>
</main>
@stop
