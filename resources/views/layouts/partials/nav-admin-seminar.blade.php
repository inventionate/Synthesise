{{-- <div class="item">
    Aktionen:
</div> --}}

<div class="item">
    <button class="ui teal button" id="message-new">Neue Nachricht</button>
</div>

<div class="item">
    <button class="ui teal button" id="section-new">Neuer Themenbereich</button>
</div>

<div class="complex item">

    <div class="ui tiny teal buttons">

        <button class="ui teal button" id="lection-new">Neue</button>

        <div class="or" data-text="oder"></div>

        <button class="ui teal button" id="lection-attach">vorhandene online-Lektion</button>

    </div>
</div>

<div class="item">
    <button class="ui teal button" id="infoblock-new">Neue Information</button>
</div>

<div class="item">
    <a class="ui teal button @if ( Request::segment(3) === 'users' ) active @endif" href="{{ route( 'seminar-users', ['name' => $seminar_name ] ) }}">Teilnehmer/innen verwalten</a>
</div>

<div class="item">
    <a class="ui teal button @if ( Request::segment(3) === 'settings' ) active @endif" href="{{ route( 'seminar-settings', ['name' => $seminar_name] ) }}">Einstellungen</a>
</div>

@if ( Auth::user()->role === 'Admin' )

    <div class="complex item">

        <form id="seminar-delete" role="form" method="POST" action="{{ action('SeminarController@destroy', ['name' => $seminar_name]) }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <button class="ui tiny red button" type="submit">Seminar löschen</button>

        </form>

    </div>

@endif
