<form role="form" method="POST" action="{{ action('LectionController@attach') }}" id="lection-attach-modal" class="ui equal width modal form lection-attach-validator">

    {{ csrf_field() }}

    <div class="header">
        online-Lektion hinzufügen
    </div>

    <div class="content">

        <div class="required field">
            <label for="lections_attach_section">Themenbereich auswählen.</label>

            <div class="ui selection dropdown">

                <input type="hidden" name="section_id" id="lections_attach_section">

                <i class="dropdown icon"></i>

                <div class="default text">Themenbereich</div>

                <div class="menu">

                    @foreach( $sections as $section )

                        <div class="item" data-value="{{ $section->id }}">
                            {{ $section->name}}
                        </div>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="required field">

            <label for="lections_attach_name">Vorhandene online-Lektion</label>

            <select class="ui search dropdown" name="name" id="lections_attach_name">

                <option value="">Online-Lektion auswählen.</option>

                @foreach( $all_lections as $all_lection )

                    {{-- Only not attached lections! --}}

                    <option value="{{ $all_lection->name}}">{{ $all_lection->name}}</option>

                @endforeach

            </select>

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

    </div>
    <div class="actions">
        <div class="ui black cancel button">
            Abbrechen
        </div>

        <button class="ui right green labeled icon submit button" type="submit">
            Aktualisieren
            <i class="checkmark icon"></i>
        </button>
    </div>

</form>
