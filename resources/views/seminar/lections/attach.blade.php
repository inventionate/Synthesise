<form role="form" method="POST" action="{{ action('LectionController@attach') }} }}" id="lection-attach-modal" class="ui modal form">

    {{ method_field('PATCH') }}

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

                    <option value="{{ $all_lection->name}}">{{ $all_lection->name}}</option>

                @endforeach

            </select>

        </div>

    </div>
    <div class="actions">
        <div class="ui black cancel button">
            Abbrechen
        </div>

        <div class="ui right green labeled icon submit button">
            Aktualisieren
            <i class="checkmark icon"></i>
        </div>
    </div>

</form>
