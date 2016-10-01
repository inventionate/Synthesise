<form role="form" method="POST" action="{{ action('LectionController@store') }}" id="lection-new-modal" class="ui modal equal width form lection-validator" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="header">
        Neue online-Lektion erstellen
    </div>

    <div class="content">


        @if ( count($sections) === 0 )

            <div class="ui red message">
                Sie haben noch keinen Themenbereich angelegt. Bevor Sie online-Lektionen erstellen können, müssen Sie einen Themenbereich anlegen.
            </div>

        @else

            @include('seminar.lections.formfields')

        @endif

    </div>

    <div class="actions">
        <div class="ui black cancel button">
            Abbrechen
        </div>

{{-- Button wieder zu div, sobald der Validator läuft!!! --}}
        <button class="ui right green labeled icon submit button" type="submit">
            Erstellen
            <i class="checkmark icon"></i>
        </button>
    </div>

</form>
