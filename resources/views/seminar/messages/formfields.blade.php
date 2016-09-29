<div class="field">
    <label for="messages_seminar_name" class="hide">Seminarname</label>
    <input id="messages_seminar_name" name="seminar_name" type="text" value="{{ $seminar_name }}" class="hide">
</div>

<div class="required field">
    <label for="messages_title">Titel</label>
    <input id="messages_title" name="title" placeholder="Bitte geben Sie einen Titel ein." type="text">
</div>

<div class="required field">
    <label for="messages_content">Inhalt</label>
    <textarea id="messages_content" name="content" placeholder="Bitte geben Sie Ihre Nachricht ein." maxlength="1000" class="message-wysiwyg"></textarea>
</div>

<div class="inline fields" ref="colour">
    <label for="colour">Hintergrundfarbe wählen:</label>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="default"  checked="">
            <label>Grau</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="black">
            <label>Schwarz</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="yellow">
            <label>Gelb</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="green">
            <label>Grün</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="blue">
            <label>Blau</label>
    </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="orange">
            <label>Orange</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="purple">
        <label>Violett</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="pink">
            <label>Pink</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="colour" type="radio" value="red">
            <label>Rot</label>
        </div>
    </div>
</div>
