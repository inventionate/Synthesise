@extends('layouts.default')

@section('title')
  <title>Erziehungswissenschaftliche Grundfragen –
  Häufig gestellte Fragen</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui centered page grid">

    <div class="center aligned fourteen wide column">

        <h1>Häufig gestellte Fragen
            @if( $letter != null)
                für {{ substr(URL::current(),strlen(url('/hgf/'))+1,1) }}
            @endif
        </h1>

        <p>Bitte wählen Sie einen Fragebereich aus. Sollte sich Ihre Frage nach der Lektüre der hier aufgelisteten Antworten nicht geklärt haben, <a href="{{ url('kontakt') }}">wenden Sie sich bitte direkt an uns</a>. Wir versuchen den »Häufig gestellte Fragen« Katalog ständig zu erweitern und freuen und über Ihre Anregungen und Mitarbeit.</p>

        {{-- @todo Inline PHP Code in Controller auslagern. --}}
        {{-- @todo PRINT CSS bearbeiten --}}
        <div class="ui green pagination menu">
            @for($i = 0; $i < strlen($letters); $i++ )
              <a class="item @if ($letter === substr($letters,$i,1) ) active @endif" href="{{ url('/hgf/' . substr($letters,$i,1)) }}">
                  {{ substr($letters,$i,1) }}
              </a>
            @endfor
        </div>

    </div>

    @if( $letter != null)
        <div class="left aligned ten wide column">
            <div class="ui styled fluid accordion">
                @foreach($answersByLetter as $answers)

                    <div class="title">
                        <i class="dropdown icon"></i>
                        {{ $answers->subject }}
                    </div>

                    <div class="content">
                        <h5>{{ $answers->question }}</h5>
                        <p>{!! $answers->answer !!}</p>
                    </div>

                @endforeach
            </div>
        </div>
    @endif

</main>
@stop
