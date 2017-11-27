<div class="required field">
   <label for="sequences_name">Titel der Sequenz</label>
   <input id="sequences_name" name="name" placeholder="Bitte geben Sie den Titel der Videosequenz ein." type="text">
</div>

<div class="field">
    <label for="video">Videodatei</label>
    <div class="ui action input">
            <label for="video_filepath" class="hide">Dateipfad</label>
            <input id="video_filepath" type="text" placeholder="Bitte wählen Sie einen Text." name="video_filepath" readonly>

            <input id="video" type="file" name="video">

            <div class="ui primary icon button">
                <i class="cloud upload icon"></i>
            </div>
    </div>
</div>

<div class="ui horizontal section divider">
oder
</div>

<div class="field">
    <label for="sequences_url">URL</label>
    <input id="sequences_url" name="url" placeholder="Bitte geben Sie eine gültige Internetadresse ein." type="url">
</div>
