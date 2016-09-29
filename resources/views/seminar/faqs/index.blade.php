@extends('layouts.default')

@section('title')
  <title>e:t:p:M – Seminar HGF</title>
@stop

@section('content')
<main id="main-content-seminar-faqs" class="ui grid container">

    <div class="center aligned sixteen wide column">

        <h1>Häufig gestellte Fragen
            @if( $letter != null)
                für {{ $letter }}
            @endif
        </h1>

        <p>Bitte wählen Sie einen Fragebereich aus. Sollte sich Ihre Frage nach der Lektüre der hier aufgelisteten Antworten nicht geklärt haben, <a href="{{ url('kontakt') }}">wenden Sie sich bitte direkt an uns</a>. Wir versuchen den »Häufig gestellte Fragen« Katalog ständig zu erweitern und freuen und über Ihre Anregungen und Mitarbeit.</p>

        <div class="ui centered pagination menu">

            @foreach ( $letters as $pagination_letter )
                <a class="item @if ($pagination_letter->area === $letter ) active @endif" href="{{ route('seminar-faqs', ['name' => $seminar_name, 'letter' => $pagination_letter->area]) }}">
                    {{ $pagination_letter->area }}
                </a>
            @endforeach

            @if ( Seminar::authorizedEditor($seminar_name) )

                <div class="item">
                    <button id="faq-new" class="ui teal icon button" data-tooltip="Eine neue HGF hinzufügen.">
                        <i class="add icon"></i>
                    </button>
                </div>

            @endif

        </div>

    </div>

    @if( $letter != null)
        <div class="centered twelve wide column">
            <div id="faq-accordion" class="ui styled fluid accordion">
                @foreach($answersByLetter as $answers)
                    <div class="title">
                        <div class="ui grid">
                            <div class="@if ( Seminar::authorizedEditor($seminar_name) ) thirteen wide @endif trigger column">
                                <i class="dropdown icon"></i>
                                {{ $answers->subject }}
                            </div>

                            @if ( Seminar::authorizedEditor($seminar_name) )
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

</main>

{{-- Include Modals for create and edit faqs. --}}
@if ( Seminar::authorizedEditor($seminar_name) )

    @include('seminar.faqs.create')
    @include('seminar.faqs.edit')

@endif

@stop
