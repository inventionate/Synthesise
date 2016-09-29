<div class="field">
    <label for="users_username" class="hide">LSF Account</label>
    <input id="users_username" name="username" placeholder="Bitte geben Sie einen LSF Account ein." type="text">
</div>

<div class="field">
    <div class="ui action input">
            <label for="users_filepath" class="hide">Dateipfad</label>
            <input id="users_filepath" type="text" placeholder="Bitte wählen Sie eine Datei." name="filepath" readonly>

            <label for="users_users" class="hide">Datei auswählen</label>
            <input id="users_users" type="file" name="users">

            <div class="ui primary icon button" data-tooltip="Sie können eine Stud.IP 3 CSV Datei der Teilnehmer/innenliste importieren.">
                <i class="cloud upload icon"></i>
            </div>
    </div>
</div>

<div class="inline fields hide" ref="role">
    <label for="role">Rolle wählen:</label>
    <div class="field">
        <div class="radio checkbox">
            <input id="users_role_student" name="role" type="radio" value="Student">
            <label for="users_role_student">Student</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input id="users_role_mentor" name="role" type="radio" value="Mentor">
            <label for="users_role_mentor">Mentor</label>
        </div>
    </div>
    <div class="field">
        <div class="radio checkbox">
            <input id="users_role_teacher" name="role" type="radio" value="Teacher">
            <label for="users_role_teacher">Teacher</label>
        </div>
    </div>
</div>

<div class="field">
    <label for="users_seminar_names" class="hide">Seminarname</label>
    <input id="users_seminar_names" name="seminar_names[]" type="text" value="{{ $seminar_name }}" class="hide">
</div>
