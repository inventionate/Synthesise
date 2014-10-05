@extends('layouts.default')

@section('title')
	<title>EWM1 – {{{ $videoname }}}</title>
@stop

@section('content')
<section id="main-content-{{ Request::segment(1) }}" class="change-fade container">

	@if($available || $role === 'Teacher' && $online)

		<h1>{{{ $section . ': ' . $videoname	}}}</h1>

		{{-- MEDIAPLAYER --}}
		<div class="row">
			<div id="videoplayer" class="col-md-12">
				<div class="flowplayer fixed-controls play-button"
				data-generate_cuepoints="true"
				@if( ! (Agent::isMobile() || Agent::isTablet()) )
					data-cuepoints="[{{ implode(',',$cuepoints->lists('cuepoint')) }}]"
				@endif
				data-key="$443083014658956"
				data-logo="{{ asset('apple-touch-icon-precomposed.png') }}"
				data-swf="{{ asset('flash/flowplayer.swf') }}"
				title="{{{ $videoname }}}"
				>
					<video>
						{{-- VIDEODATEIEN EINBINDEN --}}
						@if( App::environment() === 'production' )
							@if( Agent::isMobile() || Agent::isTablet() )
								<source type="video/webm" src="{{ $videopath . '_small' }}.webm">
								<source type="video/mp4" src="{{ $videopath . '_small' }}.mp4">
							@elseif( !(stristr($_SERVER['HTTP_USER_AGENT'], 'Safari')) || stristr($_SERVER['HTTP_USER_AGENT'], 'Chrome') )
								<source type="video/webm" src="{{ $videopath }}.webm">
							@endif
							<source type="video/mp4" src="{{ $videopath }}.mp4">
						@else
							<source type="video/mp4" src="{{ asset('video') . '/' . strtolower(str_replace(array(' ','-','?','ä','ü','ö','ß'),array('_','_','','ae','ue','oe','ss'),$videoname)) }}.mp4">
						@endif
					</video>
				</div>
				@if( !(Agent::isMobile() || Agent::isTablet()) )
					{{-- NOTIZEN --}}
					<section id="notes">
						<header>
							<h3>Notizen</h3>
						</header>

						{{ Form::open(array('url' => 'notes')) }}

						{{ Form::label('note-content', 'Notes', array('class' => 'hidden')) }}
						{{ Form::textarea('notes', '', array('rows' => '3', 'maxlength' => '375', 'class' => 'form-control', 'placeholder' => 'Hier können Sie Ihre Notizen hinterlegen.', 'id' => 'note-content')) }}

						{{ Form::close() }}

						<div id="ajax-info" class="progress">
							<div class="progress-bar progress-bar-success" style="width: 100%"></div>
						</div>
					</section>
				@endif
			</div>
				{{-- ADDITIONAL CONTENT --}}
				{{--Die Inhalte werden automatisch generiert und das asset geladen. Es setzt sich in dieser manuellen Version aus dem Titel des Textes (Leerzeichen: _) zusammen.--}}
			<section id="additional-content">
				<header>
					<div class="col-md-12">
						<h3 class="hidden">Texte und Notizen</h3>
					</div>
				</header>
				{{-- FÜR DIE MOBILVERSION ANPASSEN MIT DEM RECHTSLIEGENDEN --}}
				<div class="col-md-6 col-sm-7 col-xs-12" data-no-turbolink>
				{{-- durch die Texte loopen und Autoren davor setzten --}}
					@foreach ($papers as $paper)
						<a class="btn btn-warning btn-block download-paper" data-name="{{ $paper->papername }}" href="{{ action('DownloadController@getFile', array('type' => 'pdf' , 'file' => str_replace(':','', $paper->papername ))) }}" data-no-turbolink>{{ $paper->author }}: {{ $paper->papername }} <span class="glyphicon glyphicon-align-justify"></span></a>
					@endforeach
				</div>
				<div class="col-md-3 col-md-offset-3 col-sm-4 col-sm-offset-1 col-xs-12 text-right" data-no-turbolink>
					{{-- @todo Funktionalität beim Note Repository hinzufügen (Note::collectContent) --}}
					<a class="btn btn-primary btn-block download-note" data-name="{{ $videoname }}" href="{{ action('LectionController@getNotesPDF', rawurlencode($videoname))	}}" data-no-turbolink>Notizen herunterladen <span class="glyphicon glyphicon-pencil"></span></a>
				</div>
			</section>
		</div>

  @else
    <div class="alert alert-danger"> Die online-Lektion ist noch nicht verfügbar. Bitte wählen Sie eine verfügbare online-Lektion aus.</div>
    @include('lection.summary')
  @endif

</section>
@stop

@section('scripts')
	@include('lection.partials.analytics')
	@parent
@stop
