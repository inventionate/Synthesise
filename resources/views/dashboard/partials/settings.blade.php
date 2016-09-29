<div class="ui info message">
    <div class="header">
        Kontaktieren Sie für Änderungen der Einstellungen den Systemadministartor
    </div>
    <p>
        Änderungen am System sind Momentan nur über Veränderungen der .env Datei möglich. Hierzu muss das System in den Maintenance Modus versetzt werden. Kontaktieren Sie für diesen Vorgang bitte Ihren <a href="#support">Systemadministartor</a> oder führen Sie die Änderungen gemäß der <a href="https://laravel.com/docs/5.3/configuration" target="_blank">Laravel Dokumentation</a> durch.
    </p>
</div>

<form class="ui equal width form">

    <h3 class="ui dividing header">Datenbank</h3>

    <div class="required fields">

        <div class="field">
            <label for="synthesise_db_host">Datenbank Server</label>
            <input id="synthesise_db_host" type="text" placeholder="Bitte geben Sie die URL des Datenbankservers ein." value="{{ $db_host }}" readonly>
        </div>

        <div class="field">
            <label for="synthesise_db_name">Datenbank Name</label>
            <input id="synthesise_db_name" type="text" placeholder="Bitte geben Sie den Namen der Datenbank ein." value="{{ $db_database }}" readonly>
        </div>

        <div class="field">
            <label for="synthesise_db_username">Datenbank Benutzer/innename</label>
            <input id="synthesise_db_username" type="text" placeholder="Bitte geben Sie den Namen des/der Benutzer/in ein." value="{{ $db_username }}" readonly>
        </div>

        <div class="field">
            <label for="synthesise_db_password">Datenbank Password</label>
            <input id="synthesise_db_password" type="password" placeholder="Bitte geben Sie das Datenbankpasswort ein" value="{{ bcrypt( $db_password ) }}" readonly>
        </div>

    </div>

    @if ( $database_connection )
        <div class="ui green message">
            <div class="header">Datenbankverbindung hergestellt</div>
            <p>Die Verbindung zu einer Datenbank konnte erfolgreich hergestellt werden.</p>
        </div>
    @else
        <div class="ui red message">
            <div class="header">Datenbankverbindung fehlgeschlagen</div>
            <p>Die Verbindung zu einer Datenbank konnte nicht hergestellt werden.</p>
        </div>
    @endif

    <h3 class="ui dividing header">LDAP Authentifizierung</h3>

    <div class="required fields">

        <div class="field">
            <label for="synthesise_ldap_domain">LDAP Server</label>
            <input id="synthesise_ldap_domain" type="text" placeholder="Bitte geben Sie die LDAP-Server URL ein." value="{{ $ldap_domain }}" readonly>
        </div>

        <div class="field">
            <label for="synthesise_ldap_port">LDAP Port</label>
            <input id="synthesise_ldap_port" type="text" placeholder="Bitte geben Sie den LDAP Port ein." value="{{ $ldap_port }}" readonly>
        </div>

        <div class="field">
            <label for="synthesise_ldap_base_dn">LDAP Base DN</label>
            <input id="synthesise_ldap_base_dn" type="text" placeholder="Bitte geben Sie die LDAP Base DN ein." value="{{ $ldap_base_dn }}" readonly>
        </div>

    </div>

    <div class="required fields">

        <div class="field">
            <label for="synthesise_ldap_bind_dn">LDAP Bind DN</label>
            <input id="synthesise_ldap_bind_dn" type="text" placeholder="Bitte geben Sie die LDAP Bind-DN ein." value="{{ $ldap_bind_dn }}" readonly>
        </div>

        <div class="field">
            <label for="synthesise_ldap_bind_password">LDAP Bind Passwort</label>
            <input id="synthesise_ldap_bind_password" type="password" placeholder="Bitte geben Sie das LDAP Bind-Passwort ein." value="{{ bcrypt( $ldap_bind_pwd ) }}" readonly>
        </div>

    </div>

    @if ( $ldap_connection )
        <div class="ui green message">
            <div class="header">LDAP-Serververbindung hergestellt</div>
            <p>Die Verbindung zu einem LDAP-Server konnte erfolgreich hergestellt werden.</p>
        </div>
    @else
        <div class="ui red message">
            <div class="header">LDAP-Verbindung fehlgeschlagen</div>
            <p>Die Verbindung zu einem LDAP-Server konnte nicht hergestellt werden.</p>
        </div>
    @endif

    {{-- <button class="ui positive fluid submit button" type="submit">Speichern</button> --}}

</form>
