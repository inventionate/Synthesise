<div class="field">
    <label for="username">Benutzername</label>
    <input name="username" placeholder="Bitte geben Sie einen Benutzernamen ein." ref="username"
    type="text">
</div>

<div class="field hide">
    <label for="role">Student</label>
    <input name="role" ref="role" value="Admin">
</div>

<div class="field">
    <label for="firstname">Vorname</label>
    <input name="firstname" placeholder="Bitte geben Sie einen Vornamen ein." ref="firstname"
    type="text">
</div>

<div class="field">
    <label for="lastname">Nachname</label>
    <input name="lastname" placeholder="Bitte geben Sie einen Nachnamen ein." ref="lastname"
    type="text">
</div>

<div class="field">
      <label for="password">Password</label>
      <input name="password" ref="password" type="password" placeholder="Bitte geben Sie ein Passwort ein.">
</div>

<div class="field">
    <label for="seminar_names" class="hide">Seminarnamen</label>
    <select name="seminar_names[]" ref="seminar_names" multiple class="hide">

        @foreach ($seminars as $seminar)

            <option value="{{ $seminar->name }}" selected>{{ $seminar->name }}</option>

        @endforeach

</select>
</div>
