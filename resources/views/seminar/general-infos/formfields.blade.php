<div class="required field">
    <label for="info_intro">Einleitungstext</label>
    <textarea id="info_intro" name="info_intro" placeholder="Bitte geben Sie einen einleitenden Text ein." maxlength="1000" class="info-wysiwyg">{{ $seminar->info_intro }}</textarea>
</div>

<div class="required field">
    <label for="info_lections">Hinsweise zu den online-Lektionen</label>
    <textarea id="info_lections" name="info_lections" placeholder="Bitte geben Sie Hinweise zum Umgang mit den online-Lektionen ein." maxlength="2000" class="info-wysiwyg">{{ $seminar->info_lections }}</textarea>
</div>

<div class="required field">
    <label for="info_texts">Hinsweise zu den Texten</label>
    <textarea id="info_texts" name="info_texts" placeholder="Bitte geben Sie Hinweise zum Umgang mit Texten ein." maxlength="2000" class="info-wysiwyg">{{ $seminar->info_texts }}</textarea>
</div>

<div class="required field">
    <label for="info_exam">Hinsweise zur Prüfung</label>
    <textarea id="info_exam" name="info_exam" placeholder="Bitte geben Sie Hinweise zur Prüfung ein." maxlength="2000" class="info-wysiwyg">{{ $seminar->info_exam }}</textarea>
</div>

<div class="required field">
    <label for="info_dates">Hinsweise zu den Terminen</label>
    <textarea id="info_dates" name="info_dates" placeholder="Bitte geben Sie Hinweise zu den Terminen ein." maxlength="2000" class="info-wysiwyg">{{ $seminar->info_dates }}</textarea>
</div>

<div class="field">
    <label for="info_pdf">Infodokument hochladen</label>
    <div class="ui action input">
            <label for="info_filepath" class="hide">Dateipfad</label>
            <input id="info_filepath" type="text" placeholder="Bitte laden Sie ein Infodokument (PDF) hoch." name="filepath" readonly value="{{ $seminar->info_path }}">

            <input id="info_pdf" type="file" name="info">

            <div class="ui primary icon button" data-tooltip="Laden Sie ein Infodokument hoch.">
                <i class="cloud upload icon"></i>
            </div>
    </div>
</div>

{{-- Hidden seminar data --}}

<div class="hide fields">

    <div class="required fields">

        <div class="field">
            <label for="seminar_author">Autor</label>
            <input name="author" placeholder="Bitte geben Sie den Autor ein." id="seminar_author" type="text" value="{{ $seminar->author }}">
        </div>

        <div class="field">
            <label for="seminar_contact">Kontakt E-Mail Adresse</label>
            <input name="contact" placeholder="Bitte geben Sie eine Kontakt E-Mail Adresse ein." id="seminar_contact" type="text" value="{{ $seminar->contact }}">
        </div>

        <div class="field">
            <label for="seminar_subject">Disziplin</label>
            <input name="subject" placeholder="Bitte geben Sie eine Disziplin ein." id="seminar_subject" type="text" value="{{ $seminar->subject }}">
        </div>

        <div class="field">
            <label for="seminar_module">Modul</label>
            <input name="module" placeholder="Bitte geben Sie ein Modul ein." id="seminar_module" type="text" value="{{ $seminar->module }}">
        </div>

    </div>

    <div class="required field">
        <label for="seminar_description">Beschreibung</label>
        <textarea name="description" placeholder="Bitte geben Sie eine kurze Beschreibung ein." id="seminar_description" maxlength="500" rows="3">{{ $seminar->description }}</textarea>
    </div>

    <div class="required field">
        <label for="seminar_image">Titelbild hochladen</label>
        <div class="ui action input">
            <label for="seminar_filepath" class="hide">Dateipfad</label>
                <input id="seminar_filepath" type="text" placeholder="Bitte laden Sie ein Titelbild hoch." name="filepath" readonly value="{{ substr($seminar->image_path, 13) }}">

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
                    <input name="available_from" type="text" ="Bitte geben Sie ein Datum ein." id="seminar_available_from" value="{{ $seminar->available_from }}">
                </div>
            </div>
        </div>

        <div class="field">
            <label for="seminar_available_to">Verfügbar bis</label>
            <div class="ui calendar">
                <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input name="available_to" type="text" placeholder="Bitte geben Sie ein Datum ein." id="seminar_available_to" value="{{ $seminar->available_to }}">
                </div>
            </div>
        </div>

    </div>

    <div class="field">
        <label for="seminar_disqus">Disqus™ Kurzname</label>
        <input id="seminar_disqus" name="disqus_shortname" placeholder="Wenn Sie Disqus™ verwenden wollen, geben Sie den entsprechenden Kurznamen an." type="text" value="{{ $seminar->disqus_shortname }}">
    </div>

</div>
