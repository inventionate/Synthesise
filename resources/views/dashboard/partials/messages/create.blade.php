<form role="form" method="POST" action="{{ action('MessageController@store') }}" id="message-new-modal" class="ui modal form message-validator">

    {{ csrf_field() }}

    <div class="header">
        Neue Nachricht
    </div>

    <div class="content">

        <div class="required field">
            <label for="title" class="hide">Titel</label>
            <input name="title" placeholder="Bitte geben Sie einen Titel ein." ef="title" type="text" v-model="title">
        </div>

        <div class="required field">
            <label for="content" class="hide">Inhalt</label>
            <textarea name="content" placeholder="Bitte geben Sie Ihre Nachricht ein." maxlength="500" ref="content" v-model="content"></textarea>
        </div>

        <div class="inline fields" ref="colour">
            <label for="colour">Hintergrundfarbe wählen:</label>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="default" v-model="colour">
                    <label>Grau</label>
                </div>
            </div>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="black" v-model="colour">
                    <label>Schwarz</label>
                </div>
            </div>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="yellow" v-model="colour">
                    <label>Gelb</label>
                </div>
            </div>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="green" v-model="colour">
                    <label>Grün</label>
                </div>
            </div>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="blue" v-model="colour">
                    <label>Blau</label>
            </div>
            </div>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="orange" v-model="colour">
                    <label>Orange</label>
                </div>
            </div>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="purple" v-model="colour">
                <label>Violett</label>
                </div>
            </div>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="pink" v-model="colour">
                    <label>Pink</label>
                </div>
            </div>
            <div class="field">
                <div class="radio checkbox">
                    <input name="colour" type="radio" value="red" v-model="colour">
                    <label>Rot</label>
                </div>
            </div>
        </div>

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
