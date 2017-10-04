<section id="general-info" class="ui stackable grid">

    <div class="one column row">
        <div class="column">

            <h2 class="ui header">Allgemeine Informationen</h2>

            @if ( is_null($seminar->info_intro) || is_null($seminar->info_lections) || is_null($seminar->info_texts) || is_null($seminar->info_exam) )

                <div class="ui warning message">
                    Keine allgemeinen Informationen verfügbar.
                </div>

            @else

                {!! $seminar->info_intro !!}

                <div class="ui styled fluid accordion">

                    {{-- @TODO als eigene Komponente konfiguierbar machen (wie FAQ) --}}

                    <div class="title">
                        <i class="dropdown icon"></i>
                        Online-Lektionen
                    </div>
                    <div class="content">
                        {!! $seminar->info_lections !!}
                    </div>

                    <div class="title">
                        <i class="dropdown icon"></i>
                        Texte
                    </div>
                    <div class="content">
                        {!! $seminar->info_texts !!}
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        Prüfung
                    </div>
                    <div class="content">
                        {!! $seminar->info_exam !!}
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        Termine
                    </div>
                    <div class="content">
                        {!! $seminar->info_dates !!}
                    </div>

                </div>

                <div class="ui hidden divider"></div>

                @if ( $seminar->info_path !== null )

                    <p>
                        Sie können sich diese Informationen und die Termine der Veranstaltung auch als PDF Dokument herunterladen:
                    </p>


                    <a class="ui fluid blue icon labeled button track-event" data-type="Informationsdokument" data-name="Allgemeine Informationen und Termine" href="{{ action('DownloadController@getFile', ['path' => $seminar->info_path , 'name' => $seminar_name . ': Allgemeine Informationen und Termine']) }}">Allgemeine Informationen und Termine <i class="download icon"></i></a>

                @endif

            @endif

            @if ( Seminar::authorizedEditor($seminar_name) )

                <div class="ui hidden divider"></div>

                <button class="ui icon teal button" id="info-edit">
                    <i class="edit icon"></i> Informationen Bearbeiten
                </button>

                @if ( $seminar->info_path !== null )

                    <form role="form" method="POST" action="{{ action('SeminarController@destroyDocument', ['name' => $seminar_name]) }}">

                        {{ method_field('DELETE') }}

                        {{ csrf_field() }}

                        <button class="ui teal icon button" type="submit">
                            <i class="close icon"></i> Dokument löschen
                        </button>

                    </form>

                @endif

            @endif

        </div>
    </div>

</section>
