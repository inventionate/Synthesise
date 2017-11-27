<form role="form" method="POST" action="{{ action('SequenceController@store', [ 'lection_name' => $lection_name]) }}" id="sequence-new-modal" class="ui modal form sequence-validator" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="header">
        Neue Sequenz erstellen
    </div>

    <div class="content">

        @include('seminar.sequences.formfields')

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
