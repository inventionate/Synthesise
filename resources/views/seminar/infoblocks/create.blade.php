<form role="form" method="POST" action="{{ action('InfoblockController@store') }}" id="infoblock-new-modal" class="ui modal equal width form infoblock-validator" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="header">
        Neue weiterführende Information
    </div>

    <div class="content">

        @include('seminar.infoblocks.formfields')

    </div>

    <div class="actions">

        <div class="ui black cancel button">
            Abbrechen
        </div>

        <div class="ui right green labeled submit icon button">
            Erstellen
            <i class="checkmark icon"></i>
        </div>

    </div>

</form>
