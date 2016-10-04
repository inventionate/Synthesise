<div class="ui info message">

    <div class="header">
        Live Analytics
    </div>

    <p>
    Learning Analytics können Sie momentan lediglich über die <a href="http://{{ $piwik_url }}" target="_blank">separate Piwik Installation</a> nutzen. In einer künftigen Synthesise Version werden Learning Analytics Funktionen direkt integriert.
    </p>

</div>

@if ( Auth::user()->role === 'Admin')

    <form class="ui equal width form">

        <h3 class="ui dividing header">Piwik 2 Einstellungen</h3>

        <div class="required fields">

            <div class="field">
                <label for="piwik_db_host">Piwik Server</label>
                <input id="piwik_db_host" type="text" placeholder="Bitte geben Sie die URL einer Piwik Installation ein." value="{{ $piwik_url }}" readonly>
            </div>

            <div class="field">
                <label for="piwik_db_name">Piwik Site ID</label>
                <input id="piwik_db_name" type="text" placeholder="Bitte geben Sie ihre Piwik Site ID ein." value="{{ $piwik_site_id }}" readonly>
            </div>

        </div>

        @if ( $piwik_connection )
            <div class="ui green message">
                <div class="header">Piwik-Verbindung hergestellt</div>
                <p>Die Verbindung zu einer Piwik Analytics Installation konnte erfolgreich hergestellt werden..</p>
            </div>
        @else
            <div class="ui red message">
                <div class="header">Piwik-Verbindung fehlgeschlagen</div>
                <p>Die Verbindung zu einer Piwik Analytics Installation konnte nicht hergestellt werden.</p>
            </div>
        @endif

        {{-- <button class="ui positive fluid submit button" type="submit">Speichern</button> --}}

    </form>

@endif
