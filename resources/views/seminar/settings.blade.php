@extends('layouts.default')

@section('title')
  <title>e:t:p:M – Seminar Einstellungen</title>
@stop

@section('content')
    <main id="main-content-seminar-settings" class="ui grid container">

        <div class="fourteen wide column">

        <h1 class="ui header">
            Seminareinstellungen
        </h1>

        <form role="form" method="POST" action="{{ action('SeminarController@store') }}" id="seminar-edit" class="ui equal width form seminar-edit-validator" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="required fields">

                <div class="field">
                    <label for="author">Autor</label>
                    <input name="author" placeholder="Bitte geben Sie den Autor ein." ref="author" type="text" value="{{ $seminar->author }}">
                </div>

                <div class="field">
                    <label for="subject">Disziplin</label>
                    <input name="subject" placeholder="Bitte geben Sie eine Disziplin ein." ref="subject" type="text" value="{{ $seminar->subject }}">
                </div>

                <div class="field">
                    <label for="module">Modul</label>
                    <input name="module" placeholder="Bitte geben Sie ein Modul ein." ref="module" type="text" value="{{ $seminar->module }}">
                </div>

                </div>

                <div class="required field">
                    <label for="description">Beschreibung</label>
                    <textarea name="description" placeholder="Bitte geben Sie eine kurze Beschreibung ein." ref="description" maxlength="500" rows="3">{{ $seminar->description }}  </textarea>
                </div>

                    <div class="required field">
                        <label for="image">Titelbild hochladen</label>
                        <div class="ui action input">
                                <label for="filepath" class="hide">Dateipfad</label>
                                <input type="text" placeholder="Bitte laden Sie ein Titelbild hoch." name="filepath" readonly value="{{ substr($seminar->image_path, 13) }}">

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
                                    <input name="available_from" type="text" ="Bitte geben Sie ein Datum ein." ref="available_from" value="{{ $seminar->available_from }}">
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="available_to">Verfügbar bis</label>
                            <div class="ui calendar">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    <input name="available_to" type="text" placeholder="Bitte geben Sie ein Datum ein." ref="available_to" value="{{ $seminar->available_to }}">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="actions">

                    <div class="ui black cancel button">
                        Abbrechen
                    </div>

                    <button type="submit" class="ui right green labeled submit icon button">
                        Speichern
                        <i class="checkmark icon"></i>
                    </button>

                </div>

            </form>

        </div>
    </main>

    {{-- @include ADMIN BACKEND --------------------------------------------------}}
    @if( Seminar::authorizedEditor($seminar_name) )

        {{-- Load create and edit Modals --}}

        @include('seminar.messages.create')

        @include('seminar.messages.edit')

    @endif
@stop
