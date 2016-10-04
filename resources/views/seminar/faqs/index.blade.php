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

    @if( $letter !== null )

        @include('seminar.faqs.show')

    @endif

</main>

{{-- @include ADMIN BACKEND --------------------------------------------------}}
@if( Seminar::authorizedEditor($seminar_name) )

    @include('seminar.faqs.create')
    @include('seminar.faqs.edit')

    {{-- Load create and edit Modals --}}
    @include('seminar.modals')

@endif

@stop
