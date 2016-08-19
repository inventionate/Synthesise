<form role="form" method="POST" action="{{ action('FaqController@store') }}" id="faq-new-modal" class="ui modal form faq-validator">

    {{ csrf_field() }}

    <div class="header">
        Neue »Häufig gestellte Frage« erstellen
    </div>

    <div class="content">


            <div class="field">
                <label>Fragestichwort</label>
                <input type="text" name="subject">
            </div>

            <div class="field">
                <label>Frage</label>
                <input name="question"></input>
            </div>

            <div class="field">
                <label>Antwort</label>
                <textarea class="faq-wysiwyg" name="answer"></textarea>
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
