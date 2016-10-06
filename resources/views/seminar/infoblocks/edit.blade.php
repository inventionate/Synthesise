<form role="form" method="POST" action="{{ url('infoblock') }}" id="infoblock-edit-modal" class="ui modal equal width form infoblock-validator" enctype="multipart/form-data">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <div class="header">
        Weiterführende Information bearbeiten
    </div>

    <div class="content">

        @include('seminar.infoblocks.formfields')

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
