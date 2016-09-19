<form role="form" method="POST" action="{{ action('MessageController@store') }}" id="message-new-modal" class="ui modal form message-validator">

    {{ csrf_field() }}

    <div class="header">
        Neue Nachricht
    </div>

    <div class="content">

        @include('admin.messages.formfields')

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
