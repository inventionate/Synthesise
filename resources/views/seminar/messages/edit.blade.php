<form role="form" method="POST" action="{{ url('message') }}" id="message-edit-modal" class="ui modal form message-validator">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <div class="header">
        Nachricht bearbeiten
    </div>

    <div class="content">

        @include('seminar.messages.formfields')

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
