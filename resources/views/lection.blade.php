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

				{{-- <div id="interactive-video" data-name="{{ $videoname }}" data-path="{{ $videopath }}" data-markers="{{ $markers }}" data-poster="/img/ol_title.jpg"></div> --}}

				{{-- Vue.js Komponente laden und die entsprechenden Variablen (Props) übergeben. --}}
				<interactive-video name="{{ $videoname }}" path="{{ $videopath }}" markers="{{ $markers }}" poster="/img/ol_title.jpg"></interactive-video>

			</div>
		</div>
		{{-- ADDITIONAL CONTENT --}}
		<section id="additional-content" class="two column row">
			{{-- durch die Texte loopen und Autoren davor setzten --}}
			<div class="column">
				<header>
					<h3 class="hide">Texte und Notizen</h3>
				</header>
				@foreach ($papers as $paper)
					<a class="ui fluid labeled icon blue button" v-on="click: trackEvents('Text', '{{ $paper->papername }}')" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $paper->papername]) }}"><i class="text file icon"></i> {{ $paper->author }}: {{ $paper->papername }}</a>
				@endforeach
			</div>
			<div class="column">
				{{-- @todo Funktionalität beim Note Repository hinzufügen (Note::collectContent) --}}
				<a class="ui fluid labeled icon blue button" v-on="click: trackEvents('Notizen', '{{ $videoname }}')" href="{{ action('LectionController@getNotesPDF', [rawurlencode($videoname)])	}}"><i class="square write icon"></i> Notizen herunterladen</a>
			</div>
		</section>

		</div>

  @else
    <div class="ui negative message"> Die online-Lektion ist noch nicht verfügbar. Bitte wählen Sie eine verfügbare online-Lektion aus.</div>
    @include('dashboard.partials.all-lections')
  @endif

</main>
@stop
