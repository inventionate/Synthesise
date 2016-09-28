<div class="required field">
    <label for="title">Titel</label>
    <input name="title" placeholder="Bitte geben Sie einen Titel ein." ref="title" type="text">
</div>

<div class="required fields">

    <div class="field">
        <label for="author">Autor</label>
        <input name="author" placeholder="Bitte geben Sie den Autor ein." ref="author" type="text">
    </div>

    <div class="field">
        <label for="subject">Disziplin</label>
        <input name="subject" placeholder="Bitte geben Sie eine Disziplin ein." ref="subject" type="text">
    </div>

    <div class="field">
        <label for="module">Modul</label>
        <input name="module" placeholder="Bitte geben Sie ein Modul ein." ref="module" type="text">
    </div>

</div>

<div class="required field">
    <label for="description">Beschreibung</label>
    <textarea name="description" placeholder="Bitte geben Sie eine kurze Beschreibung ein." ref="description" maxlength="500"></textarea>
</div>

<div class="required field">
    <label for="image">Titelbild hochladen</label>
    <div class="ui action input">
            <label for="filepath" class="hide">Dateipfad</label>
            <input type="text" placeholder="Bitte laden Sie ein Titelbild hoch." name="filepath" readonly>

            <input type="file" name="image">

            <div class="ui primary icon button" data-tooltip="Laden Sie ein Titelbild hoch.">
                <i class="cloud upload icon"></i>
            </div>
    </div>
</div>

<div class="required fields">

    <div class="field">
        <label for="available_from">Verfügbar ab</label>
        <div class="ui calendar">
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input name="available_from" type="text" placeholder="Bitte geben Sie ein Datum ein." ref="available_from">
            </div>
        </div>
    </div>

    <div class="field">
        <label for="available_to">Verfügbar bis</label>
        <div class="ui calendar">
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input name="available_to" type="text" placeholder="Bitte geben Sie ein Datum ein." ref="available_to">
            </div>
        </div>
    </div>

</div>

<div class="field">
        <label for="authorized_users">Benutzer, die das Seminar administrieren dürfen</label>

        <div class="ui info message">
            Die Person, die das Seminar erstellt, ist automatisch Administrator/in.
        </div>

        <select name="authorized_users[]" ref="authorized_users" multiple class="ui dropdown">

        <option value="">Zusätzliche Administrator/in oder Lehrperson auswählen</option>

        @foreach( $admins as $admin )

            @if( $admin->username !== Auth::user()->username &&  $admin->username !== 'root')
                <option value="{{ $admin->username }}">{{ $admin->firstname }} {{ $admin->lastname }} ({{ $admin->username }})</option>
            @endif

        @endforeach

        @foreach( $teachers as $teacher )

            @if( $teacher->username !== Auth::user()->username )
                <option value="{{ $teacher->username }}">{{ $teacher->firstname }} {{ $teacher->lastname }} ({{ $teacher->username }})</option>
            @endif

        @endforeach

    </select>
</div>
