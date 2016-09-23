<a class="item @if ( Request::is('/') ) active @endif" href="{{ route('dashboard') }}">EWM1</a>

<div class="ui dropdown item">
    online-Lektionen
    <i class="dropdown icon"></i>
    <div class="green menu">
        <div class="header">Sozialgeschichte der Erziehung und Bildung</div>
        <a class="item" href="{{ route('lektion',['Griechisch-römische Antike', 1]) }}">Griechisch-römische Antike</a>
        <a class="item" href="{{ route('lektion', ['Mittelalter', 1]) }}">Mittelalter</a>
        <a class="item" href="{{ route('lektion', ['Frühe Neuzeit', 1]) }}">Frühe Neuzeit</a></li>
        <div class="header">Ideen- und Personengeschichte der Pädagogik</div>
        <a class="item" href="{{ route('lektion', ['Jean-Jacques Rousseau', 1]) }}">Jean-Jacques Rousseau</a>
        <a class="item" href="{{ route('lektion', ['Johann Heinrich Pestalozzi', 1]) }}">Johann Heinrich Pestalozzi</a>
        <a class="item" href="{{ route('lektion', ['Wilhelm von Humboldt', 1]) }}">Wilhelm von Humboldt</a>
        <div class="header">Erziehung und Schule</div>
        <a class="item" href="{{ route('lektion', ['Erziehung und Unterricht', 1]) }}">Erziehung und Unterricht</a>
        <a class="item" href="{{ route('lektion', ['Heterogenität', 1]) }}">Heterogenität</a>
        <div class="header">Bildung – Glück – Gerechtigkeit</div>
        <a class="item" href="{{ route('lektion', [rawurlencode('Wozu ist die Bildung da?'), 1]) }}">Wozu ist die Bildung da?</a>
        <a class="item" href="{{ route('lektion', ['Bildung und Glück', 1]) }}">Bildung und Glück</a>
        <a class="item" href="{{ route('lektion', ['Bildung und Gerechtigkeit', 1]) }}">Bildung und Gerechtigkeit</a>
        <div class="divider"></div>
        <a class="item rechtshinweise" href="{{ url('impressum') . '#rechtshinweise' }}">Rechtshinweise</a>
    </div>
</div>

<a class="item @if ( Request::segment(1) === 'hgf' ) active @endif" href="{{ route('faq') }}">Häufig gestellte Fragen</a>

<a class="item @if ( Request::is('kontakt') ) active @endif" href="{{ route('kontakt') }}">Kontakt</a>
