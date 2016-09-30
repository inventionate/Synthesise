<form role="form" method="POST" action="{{ url('lection') }}" id="lection-edit-modal" class="ui modal form lection-validator" enctype="multipart/form-data">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <div class="header">
        online-Lektion bearbeiten
    </div>

    <div class="content">

        @include('seminar.lections.formfields')

    </div>
    <div class="actions">
        <div class="ui black cancel button">
            Abbrechen
        </div>

        <div class="ui right green labeled icon submit button">
            Aktualisieren
            <i class="checkmark icon"></i>
        </div>
    </div>

</form>
