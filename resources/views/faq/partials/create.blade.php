<form role="form" method="POST" action="{{ action('FaqController@store') }}" id="faq-new-modal" class="ui modal form faq-validator">

    {{ csrf_field() }}

    <div class="header">
        Neue »Häufig gestellte Frage« erstellen
    </div>

    <div class="content">

        @include('faq.partials.formfields')

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
