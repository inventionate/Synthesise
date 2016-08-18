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
                für {{ substr(URL::current(),strlen(url('/faq/'))+1,1) }}
            @endif
        </h1>

        <p>Bitte wählen Sie einen Fragebereich aus. Sollte sich Ihre Frage nach der Lektüre der hier aufgelisteten Antworten nicht geklärt haben, <a href="{{ url('kontakt') }}">wenden Sie sich bitte direkt an uns</a>. Wir versuchen den »Häufig gestellte Fragen« Katalog ständig zu erweitern und freuen und über Ihre Anregungen und Mitarbeit.</p>

        {{-- @todo Inline PHP Code in Controller auslagern. --}}
        {{-- @todo PRINT CSS bearbeiten --}}
        <div class="ui pagination menu">
            @for($i = 0; $i < strlen($letters); $i++ )
                <a class="item @if ($letter === substr($letters,$i,1) ) active @endif" href="{{ url('/faq/' . substr($letters,$i,1)) }}">
                    {{ substr($letters,$i,1) }}
                </a>
            @endfor

            @if ( Auth::user()->role === 'Admin' )

                <div class="item">
                    <button id="faq-new" class="ui teal icon button" data-tooltip="Eine neue HGF hinzufügen.">
                        <i class="add icon"></i>
                    </button>
                </div>

            @endif

        </div>

    </div>

    @if( $letter != null)
        <div class="left aligned ten wide column">
            <div id="faq-accordion" class="ui styled fluid accordion">
                @foreach($answersByLetter as $answers)
                    <div class="title">
                        <div class="ui grid">
                            <div class="@if ( Auth::user()->role === 'Admin' ) thirteen wide @endif trigger column">
                                <i class="dropdown icon"></i>
                                {{ $answers->subject }}
                            </div>

                            @if ( Auth::user()->role === 'Admin' )
                            <div class="three wide column">
                                <div class="ui small teal icon buttons">

                                   <button class="ui button faq-edit" data-id="{{ $answers->id }}" data-tooltip="HGF ändern."><i class="edit icon"></i>
                                   </button>


                                   <form role="form" method="POST" action="{{ action('FaqController@destroy', ['id' => $answers->id]) }}">

                                       {{ method_field('DELETE') }}

                                       {{ csrf_field() }}

                                        <button class="ui button" data-tooltip="HGF löschen." type="submit"><i class="close icon"></i></button>

                                    </form>

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>

                    <div class="content">
                        <h5>{{ $answers->question }}</h5>
                        <p>{!! $answers->answer !!}</p>
                    </div>

                @endforeach
            </div>
        </div>
    @endif

    {{-- Include Modals for create and edit faqs. --}}
    @if ( Auth::user()->role === 'Admin' )

        @include('faq.partials.create')
        @include('faq.partials.edit')

    @endif

</main>
@stop

@section('scripts')
<script>

</script>
@stop
