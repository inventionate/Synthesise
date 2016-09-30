<form role="form" method="POST" action="{{ action('LectionController@store') }}" id="lection-new-modal" class="ui modal form lection-validator" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="header">
        Neue online-Lektion erstellen
    </div>

    <div class="content">

        @include('seminar.lections.formfields')

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
