@extends('layouts.default')

{{-- @TODO Bitbucket Issue API Form integrieren. --}}

@section('title')
	<title>e:t:p:M® – Seminar Kontakt</title>
@stop

@section('content')
<main id="main-content-seminar-contact" class="ui grid container">

	<h1 class="hide">Kontakt</h1>

	<div class="left aligned two column row">

		<div class="ten wide column">
			<h2 class="ui header">Gesamtkonzeption und Ablauf</h2>

			<p>Bei Fragen zur Gestaltung der Gesamtveranstaltung nutzen Sie bitte dieses Formular. Die Nachricht wird direkt an {{ $author }} gesendet. <b>Die Antwort wird an Ihre E-Mail Adresse der Pädagogischen Hochschule Karlsruhe gesendet.</b></p>

			<form role="form" method="POST" action="{{ url('contact/feedback') }}" class="ui form" id="feedback">

				{{ csrf_field() }}

				{{-- Zusätzliche Informationen --}}
				<label for="contact_feedback_mail" class="hide">Feedback E-Mail Adresse</label>
				<input id="contact_feedback_mail" class="hide" name="feedback_mail" type="text" value="{{ $feedback_mail }}">

				{{-- Eingabe der Nachricht ----------------------------------}}
				<label for="feedbackMessage" class="hide">Nachricht</label>
				<div class="required field @if ( Session::has('feedback_errors') ) error @endif">
					<textarea id="feedbackMessage" class="ui text" placeholder="Ihre Nachricht." rows="5" maxlength="400" required="required" name="nachricht" cols="50"></textarea>
				</div>
				{{-- Anmelde Button -----------------------------------------}}
				<input class="ui fluid submit button" type="submit" value="Abschicken">

			</form>

			@if (Session::has('feedback_errors'))
				<div class="ui floating error message shake">Bitte geben Sie eine Nachricht ein.</div>
			@elseif (Session::has('feedback_success'))
				<div class="ui floating success message">Ihre Nachricht wurde erfolgreich gesendet.</div>
			@endif

			<h2 class="ui header">Technische Probleme</h2>
			<p>Bei technischen Problemen nutzen Sie bitte dieses Formular. Die Nachricht wird direkt an Fabian Mundt gesendet. Er wird Ihnen eine <strong>Antwort an Ihre E-Mail Adresse der Pädagogischen Hochschule Karlsruhe</strong> senden.</p>

			<form role="form" method="POST" action="{{ url('contact/support') }}" class="ui form" id="feedback">

				{{ csrf_field() }}

				{{-- Zusätzliche Informationen --}}
				<label for="contact_support_mail" class="hide">Support E-Mail Adresse</label>
				<input id="contact_support_mail" name="support_mail" type="text" class="hide" value="{{ $support_mail }}">

				{{-- Eingabe der Nachricht ----------------------------------}}
				<label for="supportMessage" class="hide">Nachricht</label>
				<div class="required field @if ( Session::has('support_errors') ) error @endif">
					<textarea id="supportMessage" class="form-control" placeholder="Ihre Nachricht." rows="5" maxlength="400" required="required" name="nachricht" cols="50"></textarea>
				</diV>
				{{-- Anmelde Button -----------------------------------------}}
				<input class="ui fluid submit button" type="submit" value="Abschicken">

			</form>

			@if (Session::has('support_errors'))
				<div class="ui floating error message shake">Bitte geben Sie eine Nachricht ein.</div>
			@elseif (Session::has('support_success'))
				<div class="ui floating success message">Ihre Nachricht wurde erfolgreich gesendet.</div>
			@endif

		</div>

		<div class="six wide column">
			<h2 class="ui header">Inhaltliche Fragen</h2>
			<p>Bei Verständnisfragen wenden Sie sich bitte direkt an die jeweilige Lehrperson:</p>
			<ul class="ui list">

				@foreach ( $lection_authors as $lection_author_mail => $lection_author)

					<li>
						<a href="mailto:{{ $lection_author_mail }}">{{ $lection_author }}</a>
					</li>

				@endforeach
			</ul>
		</div>
	</div>
</main>
@stop
