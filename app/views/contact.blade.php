@extends('layouts.default')

{{-- @TODO Bitbucket Issue API Form integrieren. --}}

@section('title')
	<title>EWM1 – Kontakt</title>
@stop

@section('content')
<section id="main-content-{{ Request::segment(1) }}"

class="container @if( Request::is('kontakt') &&
( ! (Session::has('feedback_errors') || Session::has('support_errors') ||
Session::has( 'feedback_success') || Session::has('support_success')) ) )
 change-fade @endif
fade-partial">
	<h1 class="visible-print">Kontakt</h1>
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<h2>Gesamtkonzeption und Ablauf</h2>
			<p>Bei Fragen zur Gestaltung der Gesamtveranstaltung nutzen Sie bitte dieses Formular. Die Nachricht wird direkt an Timo Hoyer gesendet. Er wird Ihnen eine <strong>Antwort an Ihre E-Mail Adresse der Pädagogischen Hochschule Karlsruhe</strong> senden.</p>
			{{ Form::open(array('url' => 'kontakt/feedback', 'id' => 'feedback', 'role' => 'form')) }}
			{{-- Eingabe der Nachricht ----------------------------------}}
			<div class="form-group @if (Session::has('feedback_errors')) has-error animated fadeIn @endif">
				{{ Form::label('feedbackMessage', 'Nachricht', array('class' => 'control-label hidden')) }}
				{{ Form::textarea('nachricht', '', array('id' => 'feedbackMessage', 'class' => 'form-control', 'placeholder' => 'Ihre Nachricht.', 'rows' => '5','maxlength' => '400')) }}
				{{-- Anmelde Button -----------------------------------------}}
				{{ Form::submit('Abschicken', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
			@if (Session::has('feedback_errors'))
				<div class="alert alert-danger animated pulse">Bitte geben Sie eine Nachricht ein.</div>
			@elseif (Session::has('feedback_success'))
				<div class="alert alert-success animated pulse">Ihre Nachricht wurde erfolgreich gesendet.</div>
			@endif
			<h2>Technische Probleme</h2>
			<p>Bei technischen Problemen nutzen Sie bitte dieses Formular. Die Nachricht wird direkt an Fabian Mundt gesendet. Er wird Ihnen eine <strong>Antwort an Ihre E-Mail Adresse der Pädagogischen Hochschule Karlsruhe</strong> senden.</p>
			{{ Form::open(array('url' => 'kontakt/support', 'id' => 'support', 'role' => 'form')) }}
			{{-- Eingabe der Nachricht ----------------------------------}}
			<div class="form-group @if (Session::has('support_errors')) has-error animated fadeIn @endif">
				{{ Form::label('supportMessage', 'Nachricht', array('class' => 'control-label hidden')) }}
				{{ Form::textarea('nachricht', '', array('id' => 'supportMessage', 'class' => 'form-control', 'placeholder' => 'Ihre Nachricht.', 'rows' => '5','maxlength' => '400')) }}
				{{-- Anmelde Button -----------------------------------------}}
				{{ Form::submit('Abschicken', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
			@if (Session::has('support_errors'))
				<div class="alert alert-danger animated pulse">Bitte geben Sie eine Nachricht ein.</div>
			@elseif (Session::has('support_success'))
				<div class="alert alert-success animated pulse">Ihre Nachricht wurde erfolgreich gesendet.</div>
			@endif
		</div>
		<div class="col-md-offset-1 col-md-5 col-xs-12">
			<h2>Inhaltliche Fragen</h2>
			<p>Bei Verständnisfragen wenden Sie sich bitte direkt an die jeweiligen Dozenten:</p>
			<ul>
				<li><a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/albert-berger/" target="_blank">Albert Berger</a></li>
				<li><a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/httpwwwrainerbollede/" target="_blank">Rainer Bolle</a></li>
				<li><a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/timo-hoyer/" target="_blank">Timo Hoyer</a></li>
				<li><a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/weigand/" target="_blank">Gabriele Weigand</a></li>
			</ul>
		</div>
	</div>
</section>
@stop
