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

            <div class="ui blue message">
                In der momentanen Version ist der Sequenz-Editor deaktiviert. Wenn Sie eine neue Lektion erstellen, können Sie nur mithilfe des technischen Supports neue Video- oder Interaktionssequenzen erstellen.
            </div>

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
