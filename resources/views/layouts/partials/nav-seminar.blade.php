<a class="item @if ( urldecode(Request::segment(2)) === $seminar_name && in_array(Request::segment(3), [null, 'users', 'settings' ]) ) active @endif" href="{{ route('seminar', ['name' => $seminar_name]) }}">{{ $seminar_name }}</a>

<div class="ui dropdown item">

    online-Lektionen

    <i class="dropdown icon"></i>

    <div class="green menu">

        @foreach ( $sections as $section )

            <div class="header">
                {{ $section->name }}
            </div>

            @foreach ( Section::getAllLections($section->name) as $lection )

                <a class="item" href="{{ route('lektion',[$lection->name, 1]) }}">{{ $lection->name }}</a>

            @endforeach

        @endforeach

        <div class="divider"></div>

        <a class="item rechtshinweise" href="{{ url('impressum') . '#rechtshinweise' }}">Rechtshinweise</a>

    </div>
</div>

<a class="item @if ( Request::segment(1) === 'hgf' ) active @endif" href="{{ route('faq') }}">Häufig gestellte Fragen</a>

<a class="item @if ( Request::is('kontakt') ) active @endif" href="{{ route('kontakt') }}">Kontakt</a>
