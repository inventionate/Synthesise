@extends('layouts.default')

@section('title')
<title>EW M1 – Login</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui centered grid">

	<header class="sixteen wide center aligned column">
		<h1 class="logo">e:t:p:M</h1>
		<h2>Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns</h2>
		<h3>Einführungsveranstaltung (Modul 1) an der Pädagogischen Hochschule Karlsruhe</h3>
		<h4 class="hide">Login</h4>
	</header>

	<div class="six wide center aligned column">

		{!! Form::open(['url' => 'auth/login','class' => 'ui form', 'id' => 'login', 'role' => 'form']) !!}

			<div class="two fields @if ( !(Session::has('login_errors')) && !(Session::has('errors')) ) scale @else shake @endif ">

				{{-- Eingabe des Benutzernamens --}}
				<div class="required field @if (Session::has('errors') || Session::has('login_errors')) error @endif">
					{!! Form::label('username', 'Benutzername', ['class' => 'hide']) !!}
					<div class="ui icon input">
						{!! Form::text('username', '', ['placeholder' => 'LSF Benutzername', 'required']) !!}
						<i class="user icon"></i>
					</div>
				</div>

				{{-- Eingabe des Passworts --}}
				<div class="required field @if (Session::has('errors') || Session::has('login_errors')) error @endif">
					{!! Form::label('password', 'Passwort', ['class' => 'hide']) !!}
					<div class="ui icon input">
						{!! Form::password('password', ['placeholder' => 'LSF Passwort', 'required']) !!}
						<i class="lock icon"></i>
					</div>
				</div>

			</div>

			{{-- Anmelde Button --}}
			<div class="field">
				{!! Form::submit('Anmelden', ['id' => 'login','class' => 'ui submit button', 'role' => 'button']) !!}
			</div>

			{{-- Remember me --}}
			<div class="field">
				<div class="ui checkbox">
					{!! Form::label('rememberme', 'Angemeldet bleiben') !!}
					{!! Form::checkbox('rememberme', true, false) !!}
				</div>
			</div>

		{!! Form::close() !!}
	</div>

</main>
@stop
