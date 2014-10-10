@extends('layouts.default')

@section('title')
  <title>Erziehungswissenschaftliche Grundfragen –
  Häufig gestellte Fragen</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}"
class="container @if( Request::is('hgf') ) animated fadeIn @endif">
  <h1>Häufig gestellte Fragen
  @if( $letter != null)
    <span class="visible-print">für
    {{ substr(URL::current(),strlen(url('/hgf/'))+1,1) }}</span>
  @endif
  </h1>

  <p>Bitte wählen Sie einen Fragebereich aus. Sollte sich Ihre Frage nach der Lektüre der hier aufgelisteten Antworten nicht geklärt haben, <a href="{{ url('kontakt') }}">wenden Sie sich bitte direkt an uns</a>. Wir versuchen den »Häufig gestellte Fragen« Katalog ständig zu erweitern und freuen und über Ihre Anregungen und Mitarbeit.</p>

  <div class="text-center hidden-print">
    <ul class="pagination">
      {{-- @todo Inline PHP Code in Controller auslagern. --}}
      @for($i = 0; $i < strlen($letters); $i++ )
        <li class="@if ($letter === substr($letters,$i,1) ) active @endif">
          <a class="fade-not" href="{{ url('/hgf/' . substr($letters,$i,1)) }}">
        {{ substr($letters,$i,1) }}</a>
        </li>
      @endfor
    </ul>
  </div>

  <div class="panel-group
  @if( Request::segment(1) === 'hgf') animated fadeIn @endif" id="accordion-faq">
  @foreach($answersByLetter as $answers)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a class="accordion-toggle" data-toggle="collapse"
          data-parent="#accordion-faq" href="{{'#'.$answers->id}}">
            {{ $answers->subject }}
          </a>
        </h4>
      </div>
      <div id="{{$answers->id}}" class="panel-collapse collapse">
        <div class="panel-body">
          <h5>{{ $answers->question }}</h5>
          <p>{!! $answers->answer !!}</p>
        </div>
      </div>
    </div>
  @endforeach
  </div>
</main>
@stop
