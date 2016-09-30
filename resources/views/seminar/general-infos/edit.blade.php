<form role="form" method="POST" action="{{ action('SeminarController@update', ['name' => $seminar_name]) }}" id="info-edit-modal" class="ui modal form info-validator" enctype="multipart/form-data">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <div class="header">
        Allgemeine Informationen bearbeiten
    </div>

    <div class="content">

        @include('seminar.general-infos.formfields')

    </div>

    <div class="actions">

        <div class="ui black cancel button">
            Abbrechen
        </div>

        <div class="ui right green labeled submit icon button">
            Aktualisieren
            <i class="checkmark icon"></i>
        </div>

    </div>

</form>
