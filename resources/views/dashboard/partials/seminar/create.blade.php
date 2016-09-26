<form role="form" method="POST" action="{{ action('SeminarController@store') }}" id="seminar-new-modal" class="ui modal equal width form seminar-validator" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="header">
        Seminar hinzufügen
    </div>

    <div class="content">

        @include('dashboard.partials.seminar.formfields')

    </div>

    <div class="actions">

        <div class="ui black cancel button">
            Abbrechen
        </div>

        <button type="submit" class="ui right green labeled submit icon button">
            Erstellen
            <i class="checkmark icon"></i>
        </button>

    </div>

</form>
