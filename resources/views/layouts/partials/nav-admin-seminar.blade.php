<div class="item">
    Aktionen:
</div>

<div class="item">
    <button class="ui teal button" id="message-new">Neue Nachricht</button>
</div>

<div class="item">
    <button class="ui teal button" id="lection-new">Neue online-Lektion</button>
</div>

<div class="item">
    <a class="ui teal button @if ( Request::is('user') ) active @endif" href="{{ route( 'seminar-users', ['name' => $seminar_name ] ) }}">Teilnehmer/innen verwalten</a>
</div>

<div class="item">
    <button class="ui teal button" id="info-new">Neue weiterführende Information</button>
</div>

<div class="item">
    <a class="ui teal button @if ( Request::is('settings') ) active @endif" href="{{ route( 'seminar-settings', ['name' => $seminar_name] ) }}">Einstellungen</a>
</div>

<div class="item">
    <button id="delete-seminar" class="ui teal button @if ( Request::is('delete') ) active @endif">Seminar löschen</button>
</div>
