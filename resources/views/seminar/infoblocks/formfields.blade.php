<div class="hide field">
    <label for="infoblocks_seminar_name">Seminarname</label>
    <input id="infobocks_seminar_name" name="seminar_name" type="text" value="{{ $seminar_name }}">
</div>
<div class="required field">
    <label for="infoblocks_name">Titel</label>
    <input id="infoblocks_name" name="name" placeholder="Bitte geben Sie einen Titel ein." type="text">
</div>

<div class="required field">
    <label for="infoblocks_content">Inhalt</label>
    <textarea id="infoblocks_content" name="content" placeholder="Bitte geben Sie Ihre Informationen ein." maxlength="1000" class="infoblock-wysiwyg"></textarea>
</div>

<div class="field">
    <label for="infoblocks_link_url">Weiterführende Internetadresse </label>
    <input id="infoblocks_link_url" name="link_url" placeholder="Bitte geben Sie einen Link ein." type="text">
</div>

<div class="fields">

    <div class="field">
        <label for="infoblocks_image">Bild hochladen</label>
        <div class="ui action input">
                <label for="infoblocks_filepath" class="hide">Dateipfad</label>
                <input id="infoblocks_filepath" type="text" placeholder="Bitte laden Sie ein Bild hoch." name="filepath" readonly>

                <input id="infoblocks_image" type="file" name="image">

                <div class="ui primary icon button" data-tooltip="Laden Sie ein Bild hoch.">
                    <i class="cloud upload icon"></i>
                </div>
        </div>
    </div>

    <div class="field">
        <label for="infoblocks_text">Text hochladen</label>
        <div class="ui action input">
                <label for="infoblocks_textpath" class="hide">Dateipfad</label>
                <input id="infoblocks_textpath" type="text" placeholder="Bitte laden Sie einen Text hoch." name="textpath" readonly>

                <input id="infoblocks_text" type="file" name="text">

                <div class="ui primary icon button" data-tooltip="Laden Sie einen Text hoch.">
                    <i class="cloud upload icon"></i>
                </div>
        </div>
    </div>

</div>

{{-- Hidden form fields --}}

<div class="hide field">
    <label for="infoblocks_seminar_name">Seminarname</label>
    <input id="infoblocks_seminar_name" name="seminar_name" type="text" value="{{ $seminar_name }}" readonly>
</div>
