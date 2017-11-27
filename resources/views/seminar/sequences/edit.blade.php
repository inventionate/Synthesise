<form role="form" method="POST" action="{{ action('SequenceController@update', [ 'lection_name' => $lection_name]) }}" id="sequence-edit-modal" class="ui modal form sequence-validator" enctype="multipart/form-data">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <div class="header">
        Sequenz bearbeiten
    </div>

    <div class="content">

        @include('seminar.sequences.formfields')

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
