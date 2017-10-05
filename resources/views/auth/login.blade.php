@extends('layouts.default')

@section('title')
<title>e:t:p:M® – Login</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui centered grid">

	<header class="sixteen wide center aligned column">
		<h1 class="logo">e:t:p:M</h1>
		<h2>Virtueller Lernraum der Pädagogischen Hochschule Karlsruhe</h2>
		<h4 class="hide">Login</h4>
	</header>

	{{-- @TODO Für Mobilgeräte die Größe optimieren!!  --}}
	<div class="twelve wide column @if ( !(Session::has('login_errors')) && !(Session::has('errors')) ) scale @else shake @endif ">

		<form role="form" method="POST" action="{{ url('login') }}" class="ui  large form" id="login">

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
					<input id="login-submit" class="ui large fluid submit button" role="button" type="submit" value="Anmelden">
				</div>

			</div>

			{{-- Auto enable Remember me --}}
			<label for="rememberme" class="hide">Angemeldet bleiben</label>
			<input type="checkbox" name="rememberme" class="hide" value="true">

		</form>
	</div>

</main>
@stop
