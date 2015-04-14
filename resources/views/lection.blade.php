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

				{{-- HIER AUF REACT UMSTELLEN! --}}
				@if( !(Agent::isMobile() || Agent::isTablet()) )
					{{-- NOTIZEN --}}
					<section id="notes">
						<header>
							<h3>Notizen</h3>
						</header>

						{!! Form::open(['url' => 'notes']) !!}

						{!! Form::label('note-content', 'Notes', ['class' => 'hidden']) !!}
						{!! Form::textarea('notes', '', ['rows' => '3', 'maxlength' => '375', 'class' => 'form-control', 'placeholder' => 'Hier können Sie Ihre Notizen hinterlegen.', 'id' => 'note-content']) !!}

						{!! Form::close() !!}

						<div id="ajax-info" class="progress">
							<div class="progress-bar progress-bar-success" style="width: 100%"></div>
						</div>
					</section>
				@endif

			</div>
				{{-- ADDITIONAL CONTENT --}}
				{{--Die Inhalte werden automatisch generiert und das asset geladen. Es setzt sich in dieser manuellen Version aus dem Titel des Textes (Leerzeichen: _) zusammen.--}}
		</div>
		<div class="two column row">
			<section id="additional-content">
				<header>
						<h3 class="hidden text">Texte und Notizen</h3>
				</header>
				{{-- FÜR DIE MOBILVERSION ANPASSEN MIT DEM RECHTSLIEGENDEN --}}
				{{-- durch die Texte loopen und Autoren davor setzten --}}
					@foreach ($papers as $paper)
						<a class="btn btn-warning btn-block download-paper" data-name="{{ $paper->papername }}" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $paper->papername]) }}">{{ $paper->author }}: {{ $paper->papername }} <span class="glyphicon glyphicon-align-justify"></span></a>
					@endforeach
					{{-- @todo Funktionalität beim Note Repository hinzufügen (Note::collectContent) --}}
					<a class="btn btn-primary btn-block download-note" data-name="{{ $videoname }}" href="{{ action('LectionController@getNotesPDF', [rawurlencode($videoname)])	}}">Notizen herunterladen <span class="glyphicon glyphicon-pencil"></span></a>
			</section>

		</div>

  @else
    <div class="ui negative message"> Die online-Lektion ist noch nicht verfügbar. Bitte wählen Sie eine verfügbare online-Lektion aus.</div>
    @include('dashboard.partials.all-lections')
  @endif

</main>
@stop
