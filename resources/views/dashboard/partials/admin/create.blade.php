<form role="form" method="POST" action="{{ action('UserController@store') }}" id="admin-new-modal" class="ui modal form admin-validator">

    {{ csrf_field() }}

    <div class="header">
        Administrator/in hinzufügen
    </div>

    <div class="content">

        @include('dashboard.partials.admin.formfields')

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
