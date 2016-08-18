@extends('layouts.default')

@section('title')
<title>EW M1 – Login</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui centered one column grid">

	<header class="center aligned column">
		<h1 class="logo">e:t:p:M</h1>
		<h2>Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns</h2>
		<h3>Einführungsveranstaltung (Modul 1) an der Pädagogischen Hochschule Karlsruhe</h3>
		<h4 class="hide">Login</h4>
	</header>

	<div class="eight wide column @if ( !(Session::has('login_errors')) && !(Session::has('errors')) ) scale @else shake @endif ">

		<form role="form" method="POST" action="{{ url('login') }}" class="ui form" id="login">

			{{ csrf_field() }}

			<div class="three fields">

				{{-- Eingabe des Benutzernamens --}}
				<div class="required field @if (Session::has('errors') || Session::has('login_errors')) error @endif">
					<label for="username" class="hide">Benutzername</label>
					<div class="ui icon input">
						<input placeholder="LSF Benutzername" required="required" name="username" type="text" value="" id="username">
						<i class="user icon"></i>
					</div>
				</div>

				{{-- Eingabe des Passworts --}}
				<div class="required field @if (Session::has('errors') || Session::has('login_errors')) error @endif">
					<label for="password" class="hide">Passwort</label>
					<div class="ui icon input">
						<input placeholder="LSF Passwort" required="required" name="password" type="password" value="" id="password">
						<i class="lock icon"></i>
					</div>
				</div>

				{{-- Anmelde Button --}}
				<div class="field">
					<input id="login" class="ui fluid submit button" role="button" type="submit" value="Anmelden">
				</div>

			</div>

		<div class="ui one column centered grid">
			{{-- Remember me --}}
			<div class="field center aligned column">
				<div class="ui checkbox">
					<label for="rememberme" class="hide">Angemeldet bleiben</label>
					<input type="checkbox" class="hidden" value="true">
				</div>
			</div>
		</div>

		</form>
	</div>
	</div>

</main>
@stop
