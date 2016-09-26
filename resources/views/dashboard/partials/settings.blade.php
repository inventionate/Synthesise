<form class="ui equal width form">

    <h3 class="ui dividing header">Datenbank</h3>

    <div class="required fields">

        <div class="field">
            <label for="db_host">Datenbank Server</label>
            <input ref="db_host" type="text" placeholder="Bitte geben Sie die URL des Datenbankservers ein." value="{{ $db_host }}">
        </div>

        <div class="field">
            <label for="db_name">Datenbank Name</label>
            <input ref="db_name" type="text" placeholder="Bitte geben Sie den Namen der Datenbank ein." value="{{ $db_database }}">
        </div>

        <div class="field">
            <label for="db_username">Datenbank Benutzer/innename</label>
            <input ref="db_username" type="text" placeholder="Bitte geben Sie den Namen des/der Benutzer/in ein." value="{{ $db_username }}">
        </div>

        <div class="field">
            <label for="db_password">Datenbank Password</label>
            <input ref="db_password" type="password" placeholder="Bitte geben Sie das Datenbankpasswort ein" value="{{ bcrypt( $db_password ) }}">
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
            <label for="ldap_domain">LDAP Server</label>
            <input ref="ldap_domain" type="text" placeholder="Bitte geben Sie die LDAP-Server URL ein." value="{{ $ldap_domain }}">
        </div>

        <div class="field">
            <label for="ldap_port">LDAP Port</label>
            <input ref="ldap_port" type="text" placeholder="Bitte geben Sie den LDAP Port ein." value="{{ $ldap_port }}">
        </div>

        <div class="field">
            <label for="ldap_base_dn">LDAP Base DN</label>
            <input ref="ldap_base_dn" type="text" placeholder="Bitte geben Sie die LDAP Base DN ein." value="{{ $ldap_base_dn }}">
        </div>

    </div>

    <div class="required fields">

        <div class="field">
            <label for="ldap_bind_dn">LDAP Bind DN</label>
            <input ref="ldap_bind_dn" type="text" placeholder="Bitte geben Sie die LDAP Bind-DN ein." value="{{ $ldap_bind_dn }}">
        </div>

        <div class="field">
            <label for="ldap_bind_password">LDAP Bind Passwort</label>
            <input ref="ldap_bind_password" type="password" placeholder="Bitte geben Sie das LDAP Bind-Passwort ein." value="{{ bcrypt( $ldap_bind_pwd ) }}">
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

    <button class="ui positive fluid submit button" type="submit">Speichern</button>

</form>
