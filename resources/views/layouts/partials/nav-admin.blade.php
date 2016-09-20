<div id="admin-actions" class="ui fixed tiny secondary menu">

    <div class="item">
        Aktionen:
    </div>

    <div class="item">
        <button class="ui teal button" id="message-new">Neue Nachricht</button>
    </div>

    <div class="item">
        <a class="ui teal button @if ( Request::is('user') ) active @endif" href="{{ route('users') }}">TeilnehmerInnen verwalten</a>
    </div>

    <div class="item">
        <button class="ui teal button @if ( Request::is('settings') ) active @endif">Einstellungen</button>
    </div>

    <div class="item">
        <button class="ui teal button @if ( Request::is('delete') ) active @endif">Seminar löschen</button>
    </div>

</div>
