<form role="form" method="POST" action="{{ action('SectionController@store') }}" id="section-new-modal" class="ui modal form section-validator" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="header">
        Neuen Themenbereich erstellen
    </div>

    <div class="content">

        @include('seminar.sections.formfields')

    </div>

    <div class="actions">
        <div class="ui black cancel button">
            Abbrechen
        </div>

        <div class="ui right green labeled icon submit button">
            Erstellen
            <i class="checkmark icon"></i>
        </div>
    </div>

</form>
