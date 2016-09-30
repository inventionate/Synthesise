@extends('layouts.default')

@section('title')
  <title>e:t:p:M – Seminar Einstellungen</title>
@stop

@section('content')
    <main id="main-content-seminar-settings" class="ui grid container">

    <div class="sixteen wide column">

        <h1 class="ui header">
            Seminareinstellungen
        </h1>

        <form role="form" method="POST" action="{{ action('SeminarController@update', ['name' => $seminar_name]) }}" id="seminar-edit" class="ui equal width form seminar-edit-validator" enctype="multipart/form-data">

            {{ method_field('PATCH') }}

            {{ csrf_field() }}

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

            {{-- Hidden general info input --}}
            <div class="hide fields">

                <div class="field">
                    <label for="info_intro">Informationen: Einleitung</label>
                    <input id="info_intro" name="info_intro" type="text" value="{{ $seminar->info_intro }}" readonly>
                </div>

                <div class="field">
                    <label for="info_lections">Informationen: online-Lektionen</label>
                    <input id="info_lections" name="info_lections" type="text" value="{{ $seminar->info_lections }}" readonly>
                </div>

                <div class="field">
                    <label for="info_texts">Informationen: Texte</label>
                    <input id="info_texts" name="info_texts" type="text" value="{{ $seminar->info_texts }}" readonly>
                </div>

                <div class="field">
                    <label for="info_exam">Informationen: Prüfung</label>
                    <input id="info_exam" name="info_exam" type="text" value="{{ $seminar->info_exam }}" readonly>
                </div>

                <div class="field">
                    <label for="info">Informationen: Infodokument</label>
                    <input id="info" name="info" type="file"  readonly>
                </div>

            </div>

            <button type="submit" class="ui green right labeled icon submit button right floated">
                Speichern
                <i class="checkmark icon"></i>
            </button>

        </form>

    </div>

    </main>

    {{-- @include ADMIN BACKEND --------------------------------------------------}}
    @if( Seminar::authorizedEditor($seminar_name) )

        {{-- Load create and edit Modals --}}

        @include('seminar.messages.create')

		@include('seminar.messages.edit')

		@include('seminar.infoblocks.create')

		@include('seminar.infoblocks.edit')

    @endif
@stop
