<a class="item seminar-name @if ( urldecode(Request::segment(2)) === $seminar_name && in_array(Request::segment(3), [null, 'users', 'settings' ]) ) active @endif" href="{{ route('seminar', ['name' => $seminar_name]) }}">{{ $seminar_name }}</a>

<div class="ui dropdown item">

    online-Lektionen

    <i class="dropdown icon"></i>

    <div class="green menu">

        @foreach ( $sections as $section )

            <div class="header">
                {{ $section->name }}
            </div>

            @foreach ( Section::getAllLections($section->id) as $lection )

                <a class="item" href="{{ route('lection', ['name' => $seminar_name, 'lection_name' => rawurlencode($lection->name), 'sequence' => 1]) }}">{{ $lection->name }}</a>

            @endforeach

        @endforeach

        <div class="divider"></div>

        <a class="item rechtshinweise" href="{{ url('impressum') . '#rechtshinweise' }}">Rechtshinweise</a>

    </div>
</div>

<a class="item @if ( urldecode(Request::segment(2)) === $seminar_name && Request::segment(3) === 'faq' ) active @endif" href="{{ route('seminar-faqs', ['name' => $seminar_name]) }}">Häufig gestellte Fragen</a>

<a class="item @if ( urldecode(Request::segment(2)) === $seminar_name && Request::segment(3) === 'contact' ) active @endif" href="{{ route('seminar-contact', ['name' => $seminar_name]) }}">Kontakt</a>
