@extends('layouts.default')

{{-- @TODO Bitbucket Issue API Form integrieren. --}}

@section('title')
	<title>EWM1 – Kontakt</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui centered page grid">

	<h1 class="hide">Kontakt</h1>

	<div class="two column row">

		<div class="ten wide column">
			<h2 class="ui header">Gesamtkonzeption und Ablauf</h2>

			<p>Bei Fragen zur Gestaltung der Gesamtveranstaltung nutzen Sie bitte dieses Formular. Die Nachricht wird direkt an Timo Hoyer gesendet. Er wird Ihnen eine <strong>Antwort an Ihre E-Mail Adresse der Pädagogischen Hochschule Karlsruhe</strong> senden.</p>

			{!! Form::open(['url' => 'kontakt/feedback', 'class ' => 'ui form', 'id' => 'feedback', 'role' => 'form']) !!}
			{{-- Eingabe der Nachricht ----------------------------------}}
				{!! Form::label('feedbackMessage', 'Nachricht', ['class' => 'hide']) !!}
				<div class="required field @if ( Session::has('feedback_errors') ) error @endif">
					{!! Form::textarea('nachricht', '', ['id' => 'feedbackMessage', 'class' => 'ui text', 'placeholder' => 'Ihre Nachricht.', 'rows' => '5','maxlength' => '400', 'required']) !!}
				</div>
				{{-- Anmelde Button -----------------------------------------}}
				{!! Form::submit('Abschicken', ['class' => 'ui fluid submit button']) !!}
			{!! Form::close() !!}

			@if (Session::has('feedback_errors'))
				<div class="ui floating error message shake">Bitte geben Sie eine Nachricht ein.</div>
			@elseif (Session::has('feedback_success'))
				<div class="ui floating success message">Ihre Nachricht wurde erfolgreich gesendet.</div>
			@endif

			<h2 class="ui header">Technische Probleme</h2>
			<p>Bei technischen Problemen nutzen Sie bitte dieses Formular. Die Nachricht wird direkt an Fabian Mundt gesendet. Er wird Ihnen eine <strong>Antwort an Ihre E-Mail Adresse der Pädagogischen Hochschule Karlsruhe</strong> senden.</p>
			{!! Form::open(['url' => 'kontakt/support', 'class' => 'ui form', 'id' => 'support', 'role' => 'form']) !!}
			{{-- Eingabe der Nachricht ----------------------------------}}
				{!! Form::label('supportMessage', 'Nachricht', ['class' => 'hide']) !!}
				<div class="required field @if ( Session::has('support_errors') ) error @endif">
					{!! Form::textarea('nachricht', '', ['id' => 'supportMessage', 'class' => 'form-control', 'placeholder' => 'Ihre Nachricht.', 'rows' => '5','maxlength' => '400', 'required']) !!}
				</diV>
				{{-- Anmelde Button -----------------------------------------}}
				{!! Form::submit('Abschicken', ['class' => 'ui fluid submit button']) !!}
			{!! Form::close() !!}

			@if (Session::has('support_errors'))
				<div class="ui floating error message shake">Bitte geben Sie eine Nachricht ein.</div>
			@elseif (Session::has('support_success'))
				<div class="ui floating success message">Ihre Nachricht wurde erfolgreich gesendet.</div>
			@endif

		</div>

		<div class="six wide column">
			<h2 class="ui header">Inhaltliche Fragen</h2>
			<p>Bei Verständnisfragen wenden Sie sich bitte direkt an die jeweiligen Dozenten:</p>
			<ul class="ui list">
				<li><a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/albert-berger/" target="_blank">Albert Berger</a></li>
				<li><a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/httpwwwrainerbollede/" target="_blank">Rainer Bolle</a></li>
				<li><a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/timo-hoyer/" target="_blank">Timo Hoyer</a></li>
				<li><a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/weigand/" target="_blank">Gabriele Weigand</a></li>
			</ul>
		</div>
	</div>
</main>
@stop
