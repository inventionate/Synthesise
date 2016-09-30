<section id="general-info" class="ui stackable grid">

    <div class="one column row">
        <div class="column">

            <h2 class="ui header">Allgemeine Informationen</h2>

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

            </div>

            <div class="ui hidden divider"></div>

            @if ( $seminar->info_path !== null )

                <p>
                    Sie können sich diese Informationen und die Termine der Veranstaltung auch als PDF Dokument herunterladen:
                </p>


                <a class="ui @if ( !Seminar::authorizedEditor($seminar_name) ) fluid @endif blue icon labeled button" v-on:click="trackEvents('Informationsdokument', 'Allgemeine Informationen und Termine')" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => 'Allgemeine Informationen und Termine']) }}">Allgemeine Informationen und Termine <i class="download icon"></i></a>

            @endif

            @if ( Seminar::authorizedEditor($seminar_name) )

                <button class="ui icon teal button" id="info-edit">
                    <i class="edit icon"></i> Informationen bearbeiten
                </button>

            @endif

        </div>
    </div>

</section>
