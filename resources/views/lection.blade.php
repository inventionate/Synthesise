@extends('layouts.default')

@section('title')
	<title>EWM1 – {{{ $videoname }}}</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui stackable page grid">

	@if($available || $role === 'Teacher' || $role === 'Admin'  && $online)

		<h1 class="ui header">{{ $section . ': ' . $videoname	}}</h1>

		{{-- MEDIAPLAYER --}}
		<div class="one column row">
			<div class="column">

				<div id="interactive-video" data-name="{{ $videopath }}" >

				</div>

			</div>
				{{-- ADDITIONAL CONTENT --}}
				{{--Die Inhalte werden automatisch generiert und das Asset geladen. Es setzt sich in dieser manuellen Version aus dem Titel des Textes (Leerzeichen: _) zusammen.--}}
		</div>
		<section id="additional-content" class="two column row">
			<header class="row">
				<h3 class="hide">Texte und Notizen</h3>
			</header>
			{{-- FÜR DIE MOBILVERSION ANPASSEN MIT DEM RECHTSLIEGENDEN --}}
			{{-- durch die Texte loopen und Autoren davor setzten --}}
			<div class="column">
				@foreach ($papers as $paper)
					<a class="ui fluid labeled icon blue button download-paper" data-name="{{ $paper->papername }}" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $paper->papername]) }}"><i class="text file icon"></i> {{ $paper->author }}: {{ $paper->papername }}</a>
				@endforeach
			</div>
			<div class="column">
				{{-- @todo Funktionalität beim Note Repository hinzufügen (Note::collectContent) --}}
				<a class="ui fluid labeled icon blue button download-note" data-name="{{ $videoname }}" href="{{ action('LectionController@getNotesPDF', [rawurlencode($videoname)])	}}"><i class="square write icon"></i> Notizen herunterladen</a>
			</div>
		</section>

		</div>

  @else
    <div class="ui negative message"> Die online-Lektion ist noch nicht verfügbar. Bitte wählen Sie eine verfügbare online-Lektion aus.</div>
    @include('dashboard.partials.all-lections')
  @endif

</main>
@stop
