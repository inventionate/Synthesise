<form role="form" method="POST" action="{{ url('user') }}" id="admin-edit-modal" class="ui modal form admin-validator">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <div class="header">
        Administrator/in bearbeiten
    </div>

    <div class="content">

        @include('dashboard.partials.admins.formfields')

    </div>

    <div class="actions">

        <div class="ui black cancel button">
            Abbrechen
        </div>

        <button type="submit" class="ui right green labeled submit icon button">
            Aktualisieren
            <i class="checkmark icon"></i>
        </button>

    </div>

</form>
