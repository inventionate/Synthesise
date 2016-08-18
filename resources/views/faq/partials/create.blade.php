<form role="form" method="POST" action="{{ action('FaqController@store') }}" id="faq-new-modal" class="ui modal form">

    {{ csrf_field() }}

    <div class="header">
        Neue »Häufig gestellte Frage« erstellen
    </div>

    <div class="content">

            <div class="field">
                <label>Fragetitel</label>
                <input type="text" name="title">
            </div>

            <div class="field">
                <label>Antworttext</label>
                <textarea name="answertext"></textarea>
            </div>

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
