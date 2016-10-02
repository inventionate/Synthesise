<div class="ui red message">
    Der Name der online-Lektion kann nicht mehr verändert werden und muss eindeutig sein!
</div>

<div class="required field">
    <label for="lections_name">Name</label>
    <input id="lections_name" name="name" placeholder="Bitte geben Sie einen Namen ein." type="text">
</div>

<div class="required field">
    <label for="lections_section">Themenbereich auswählen.</label>

    <div class="ui selection dropdown">

        <input type="hidden" name="section_id" id="lections_section">

        <i class="dropdown icon"></i>

        <div class="default text">Themenbereich wählen.</div>

        <div class="menu">

            @foreach( $sections as $section )

                <div class="item" data-value="{{ $section->id }}">
                    {{ $section->name}}
                </div>

            @endforeach

        </div>

    </div>

</div>

<div class="required fields">

    <div class="field">
        <label for="lections_author">Autor/in</label>
        <input id="lections_author" name="author" placeholder="Bitte geben Sie einen Namen ein." type="text">
    </div>

    <div class="field">
        <label for="lections_contact">Kontaktadresse</label>
        <input id="lections_contact" name="contact" placeholder="Bitte geben Sie eine Kontaktadresse ein." type="text">
    </div>

</div>

<div class="required fields">

    <div class="field">
        <label for="lections_text">Text</label>
        <div class="ui action input">
                <label for="lections_text_filepath" class="hide">Dateipfad</label>
                <input id="lections_text_filepath" type="text" placeholder="Bitte wählen Sie einen Text." name="text_filepath" readonly>

                <input id="lections_text" type="file" name="text">

                <div class="ui primary icon button">
                    <i class="cloud upload icon"></i>
                </div>
        </div>
    </div>

    <div class="field">
        <label for="lections_text_name">Titel des Textes</label>
        <input id="lections_text_name" name="text_name" placeholder="Bitte geben Sie den Titel des Textes ein." type="text">
    </div>

    <div class="field">
        <label for="lections_text_author">Autor des Textes</label>
        <input id="lections_text_author" name="text_author" placeholder="Bitte geben Sie den/die Autor/in des Textes ein." type="text">
    </div>

</div>

    <div class="required field">
        <label for="lections_image">Titelbild</label>
        <div class="ui action input">
                <label for="lections_image_filepath" class="hide">Dateipfad</label>
                <input id="lections_image_filepath" type="text" placeholder="Bitte wählen Sie ein Titelbild." name="image_filepath" readonly>

                <input id="lections_image" type="file" name="image">

                <div class="ui primary icon button">
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
        <label for="seminar_authorized_users">Benutzer, die die online Lektion bearbeiten dürfen</label>

        <div class="ui info message">
            Alle Administrator/innen und die Person, die das Seminar erstellt, dürfen die online-Lektion bearbeiten.
        </div>

        <select name="authorized_users[]" id="seminar_authorized_users" multiple class="ui dropdown">

        <option value="">Zusätzliche Administrator/in oder Lehrperson auswählen.</option>

        @foreach( $teachers as $teacher )

            @if( $teacher->username !== Auth::user()->username )
                <option value="{{ $teacher->username }}">{{ $teacher->firstname }} {{ $teacher->lastname }} ({{ $teacher->username }})</option>
            @endif

        @endforeach

    </select>
</div>

{{-- Hidden fields --}}
<div class="hide field">
    <label for="lections_seminar_name">Seminarname</label>
    <input id="lections_seminar_name" type="text" name="seminar_name" value="{{ $seminar_name }}">
</div>
