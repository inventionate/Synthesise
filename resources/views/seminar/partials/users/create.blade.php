<form role="form" method="POST" action="{{ action('UserController@store') }}" enctype="multipart/form-data" id="user-new-modal" class="ui modal form user-validator">

    {{ csrf_field() }}

    <div class="header">
        Benutzer/in hinzufügen
    </div>

    <div class="content">

        @include('seminar.partials.users.formfields')

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
