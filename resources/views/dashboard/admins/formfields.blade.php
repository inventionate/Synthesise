<div class="field">
    <label for="admin_username">Benutzername</label>
    <input id="admin_username" name="username" placeholder="Bitte geben Sie einen Benutzernamen ein." type="text">
</div>

<div class="field hide">
    <label for="admin_role">Administrator/in</label>
    <input id="admin_role" name="role" value="Admin">
</div>

<div class="field">
    <label for="admin_firstname">Vorname</label>
    <input id="admin_firstname" name="firstname" placeholder="Bitte geben Sie einen Vornamen ein." type="text">
</div>

<div class="field">
    <label for="admin_lastname">Nachname</label>
    <input id="admin_lastname" name="lastname" placeholder="Bitte geben Sie einen Nachnamen ein." type="text">
</div>

<div class="field">
      <label for="admin_password">Password</label>
      <input id="admin_password" name="password" type="password" placeholder="Bitte geben Sie ein Passwort ein.">
</div>

<div class="field">
    <label for="admin_seminar_names" class="hide">Seminarnamen</label>
    <select id="admin_seminar_names" name="seminar_names[]" multiple class="hide">

        @foreach ($seminars as $seminar)

            <option value="{{ $seminar->name }}" selected>{{ $seminar->name }}</option>

        @endforeach

</select>
</div>
