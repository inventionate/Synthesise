<div class="field">
    <label for="username" class="hide">LSF Account</label>
    <input name="username" placeholder="Bitte geben Sie einen LSF Account ein." ref="username"
    type="text">
</div>

<div class="field">
    <div class="ui action input">
            <label for="filepath" class="hide">Dateipfad</label>
            <input type="text" placeholder="Bitte wählen Sie eine Datei." name="filepath" readonly>

            <label for="users" class="hide">Datei auswählen</label>
            <input type="file" name="users">

            <div class="ui primary icon button" data-tooltip="Sie können eine Stud.IP 3 CSV Datei der Teilnehmer/innenliste importieren.">
                <i class="cloud upload icon"></i>
            </div>
    </div>
</div>

<div class="inline fields hide" ref="role">
    <label for="role">Rolle wählen:</label>
    <div class="field">
        <div class="radio checkbox">
            <input name="role" type="radio" value="Student">
            <label>Student</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="role" type="radio" value="Teacher">
            <label>Teacher</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input name="role" type="radio" value="Admin">
            <label>Admin</label>
        </div>
    </div>
</div>
