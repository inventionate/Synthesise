<div class="required field">
    <label for="sections_name">Name</label>
    <input id="sections_name" name="name" placeholder="Bitte geben Sie einen Bereichsnamen ein." type="text">
</div>

<div class="required field">
    <label for="sections_file">Weiterführende Literatur auswählen</label>
    <div class="ui action input">
            <label for="sections_filepath" class="hide">Dateipfad</label>
            <input id="sections_filepath" type="text" placeholder="Bitte wählen Sie eine PDF-Datei." name="filepath" readonly>

            <input id="sections_file" type="file" name="further_reading">

            <div class="ui primary icon button">
                <i class="cloud upload icon"></i>
            </div>
    </div>
</div>

{{-- Hidden fields --}}
<div class="hide field">
    <label for="sections_seminar_name" class="hide">LSF Account</label>
    <input id="sections_seminar_name" name="seminar_name" type="text" value="{{ $seminar_name }}">
</div>
