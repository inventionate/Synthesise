@extends('layouts.default')

@section('title')
<title>Erziehungswissenschaftliche Grundfragen – {{{ $videoname }}}</title>

{{-- Flowplayer CSS extern laden --}}
{{--<link rel="stylesheet" type="text/css" href="//releases.flowplayer.org/5.4.3/skin/minimalist.css">--}}
{{-- Um die Performance zu verbessern einfach das flowplayer css file direkt mit dem application.css laden --}}
<!-- <link rel="stylesheet" type="text/css" href="{{asset('flowplayer/skin/minimalist.css')}}"> -->

{{-- @todo flowplayer flash und skin dateien kopieren und pfad für flowplayer angeben. --}}
@stop

@section('content')
<section id="main-content-{{ Request::segment(1) }}" class="change-fade container">

@if($available || $role === 'Teacher' && $online)


<h1>{{{ $section . ': ' . $videoname  }}}</h1>

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
  </div>

  @endif

  {{-- ADDITIONAL CONTENT --}}
  {{--

  Die Inhalte werden automatisch generiert und das asset geladen. Es setzt sich in dieser manuellen Version aus dem Titel des Textes (Leerzeichen: _) zusammen.

  --}}

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
<!--    <a type="button" class="btn btn-warning" href="{{ asset('pdf/' . strtolower(str_replace(array(' ','?','ä','ö','ü','ß','-','–',':',',','»','«','É','!','.','Ä','Ü','Ö'),array('_','','ae','oe','ue','ss','','und','','','','','e','','','ae','ue','oe'),$paper->papername))) . '.pdf' }}" target="_blank">{{ $paper->author }}: {{ $paper->papername }} <span class="glyphicon glyphicon-align-justify"></span></a>-->


    <a class="btn btn-warning btn-block" href="{{ action('DownloadController@getFile', array('type' => 'pdf' , 'file' => str_replace(':','', $paper->papername ))) }}" onclick="javascript:_paq.push(['trackEvent', 'Text', 'Downloaded', '{{ $paper->papername }}'])">{{ $paper->author }}: {{ $paper->papername }} <span class="glyphicon glyphicon-align-justify"></span></a>
  @endforeach

  </div>

  <div class="col-md-3 col-md-offset-3 col-sm-4 col-sm-offset-1 col-xs-12 text-right" data-no-turbolink>

  {{-- Funktionalität beim Note Model hinzufügen (Note::collectContent) --}}
    <a class="btn btn-primary btn-block" href="{{ action('LectionController@getNotesPDF', rawurlencode($videoname))  }}" onclick="javascript:_paq.push(['trackEvent', 'Notizen', 'Downloaded', '{{ $videoname }}'])">Notizen herunterladen <span class="glyphicon glyphicon-pencil"></span></a>


  <!--<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      PDF Dokumente generieren <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
    <li><a href="{{ url( Request::url() .'/getflagnamespdf') }}">Fähnchen herunterladen <span class="glyphicon glyphicon-list"></span></a></li>
    <li><a href="{{ url( Request::url() .'/getnotespdf') }}">Notizen herunterladen <span class="glyphicon glyphicon-list"></span></a></li>
    </ul>
  </div>-->
  </div>

  </section>
 </div>

@else
<div class="alert alert-danger"> Die online-Lektion ist noch nicht verfügbar. Bitte wählen Sie eine verfügbare online-Lektion aus.</div>
@include('lection.summary')
@endif

</section>
@stop

{{-- JAVASCRIPT CLIENT LOGIC --}}

@section('scripts')

  {{-- @todo Logik auslagern in eine einize externe lection.coffee und diese laden --}}

  {{-- Flowplayer laden --}}
  {{--<script src="//releases.flowplayer.org/5.4.3/flowplayer.min.js"></script>--}}
  {{-- Da die Performance davon profitiert gilt es den flowplayer direkt mit dem application.js zu laden.
  <script src="{{asset('flowplayer/flowplayer.min.js')}}"></script> --}}
  {{-- Interaktive Videos aktivieren --}}

  {{-- Flowplayer Piwik Analytics integratiuon --}}

  <!-- {{-- FLOWPLAYER INTERACTIVE VIDEOS --}}

  @if( Agent::isMobile() || Agent::isTablet() )
    <script>
      $(document).ready(function() {
        $('.fp-logo').attr('href','http://www.ph-karlsruhe.de/institute/ph/ew/etpm/').attr('target','_blank');
      });
    </script>
  @else
      <script src="{{ Asset::rev('js/interactive-videos.js') }}"></script>
  @endif -->


 {{-- DIESEN CODE VIA ON LOAD IN INTERACTIVE VIDEO EINBINDEN!!!! --}}
  <script>

	  $(".flowplayer:first").bind({
		 "resume": function(e, api) {
			 _paq.push(['trackEvent', 'Video', 'Abgespielt', '{{ $videoname }}']);
		 },
		 "pause": function(e, api) {
		 	 _paq.push(['trackEvent', 'Video', 'Pausiert', '{{ $videoname }}']);
		 },
		 "finish": function(e, api) {
		  	 _paq.push(['trackEvent', 'Video', 'Komplett angesehen', '{{ $videoname }}']);
		 },
		 "fullscreen": function(e, api) {
		   	 _paq.push(['trackEvent', 'Video', 'Vollbild aktivieren', '{{ $videoname }}']);
		 },
		 "fullscreen-exit": function(e, api) {
		  	 _paq.push(['trackEvent', 'Video', 'Vollbild deaktivieren', '{{ $videoname }}']);
		 },
		 "error": function(e, api) {
		 	 _paq.push(['trackEvent', 'Video', 'Fehler', '{{ $videoname }}']);
		 },
		 "seek": function(e, api) {
		 	 _paq.push(['trackEvent', 'Video', 'Springen', '{{ $videoname }}']);
		 },
		 "speed": function(e, api) {
		 	 _paq.push(['trackEvent', 'Video', 'Geschwindigkeit verändert', '{{ $videoname }}']);
		 }
	  });

  </script>

@stop
