<div class="required field">
    <label for="seminar_title">Titel</label>
    <input id="seminar_title" name="title" placeholder="Bitte geben Sie einen Titel ein." type="text">
</div>

<div class="required fields">

    <div class="field">
        <label for="seminar_author">Autor</label>
        <input id="seminar_author" name="author" placeholder="Bitte geben Sie den Autor ein." type="text">
    </div>

    <div class="field">
        <label for="seminar_contact">Kontakt E-Mail Adresse</label>
        <input id="seminar_contact" name="contact" placeholder="Bitte geben Sie den E-Mail Adresse als Kontakt ein." type="text">
    </div>

    <div class="field">
        <label for="seminar_subject">Disziplin</label>
        <input id="seminar_subject" name="subject" placeholder="Bitte geben Sie eine Disziplin ein." type="text">
    </div>

    <div class="field">
        <label for="seminar_module">Modul</label>
        <input id="seminar_module" name="module" placeholder="Bitte geben Sie ein Modul ein." type="text">
    </div>

</div>

<div class="required field">
    <label for="seminar_description">Beschreibung</label>
    <textarea id="seminar_description" name="description" placeholder="Bitte geben Sie eine kurze Beschreibung ein." maxlength="500" rows="3"></textarea>
</div>

<div class="required field">
    <label for="seminar_image">Titelbild hochladen</label>
    <div class="ui action input">
            <label for="seminar_filepath" class="hide">Dateipfad</label>
            <input id="seminar_filepath" type="text" placeholder="Bitte laden Sie ein Titelbild hoch." name="filepath" readonly>

            <input id="seminar_image" type="file" name="image">

            <div class="ui primary icon button" data-tooltip="Laden Sie ein Titelbild hoch.">
                <i class="cloud upload icon"></i>
            </div>
    </div>
</div>

<div class="required fields">

    <div class="field">
        <label for="seminar_available_from">Verfügbar ab</label>
        <div class="ui calendar">
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input name="available_from" type="text" placeholder="Bitte geben Sie ein Datum ein." id="seminar_available_from">
            </div>
        </div>
    </div>

    <div class="field">
        <label for="seminar_available_to">Verfügbar bis</label>
        <div class="ui calendar">
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input name="available_to" type="text" placeholder="Bitte geben Sie ein Datum ein." id="seminar_available_to">
            </div>
        </div>
    </div>

</div>

<div class="field">
        <label for="seminar_authorized_users">Benutzer, die das Seminar administrieren dürfen</label>

        <div class="ui info message">
            Die Person, die das Seminar erstellt, ist automatisch Administrator/in.
        </div>

        <select name="authorized_users[]" id="seminar_authorized_users" multiple class="ui dropdown">

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

<div class="field">
    <label for="seminar_disqus">Disqus™ Kurzname</label>
    <input id="seminar_disqus" name="disqus_shortname" placeholder="Wenn Sie Disqus™ verwenden wollen, geben Sie den entsprechenden Kurznamen an." type="text">
</div>
