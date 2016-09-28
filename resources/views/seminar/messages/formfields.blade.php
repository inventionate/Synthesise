<div class="field">
    <label for="seminar_name" class="hide">Seminarname</label>
    <input name="seminar_name" ref="seminar_name" type="text" value="{{ $seminar_name }}" class="hide">
</div>

<div class="required field">
    <label for="title">Titel</label>
    <input name="title" placeholder="Bitte geben Sie einen Titel ein." ref="title" type="text">
</div>

<div class="required field">
    <label for="content">Inhalt</label>
    <textarea name="content" placeholder="Bitte geben Sie Ihre Nachricht ein." maxlength="1000" ref="content" class="message-wysiwyg"></textarea>
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
