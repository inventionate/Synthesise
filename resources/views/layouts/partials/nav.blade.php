<nav id="mainnav" role="navigation">
    <div class="ui grid container">

        {{-- COMPUTER NAVIGATION --}}
        <div class="computer only row">
            <div class="column">
                <div class="ui fixed large inverted green menu">

                    <a class="etpM item" href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/" target="_blank">e:t:p:M</a>

                    <a class="item @if ( Request::is('/') ) active @endif" href="{{ url('/') }}">Dashboard</a>

                    @if ( Auth::user()->role === 'Admin' )
                        @include('layouts.partials.nav-admin')
                    @endif

                    <div class="ui dropdown item">
                        online-Lektionen
                        <i class="dropdown icon"></i>
                        <div class="green menu">
                            <div class="header">Sozialgeschichte der Erziehung und Bildung</div>
                            <a class="item" href="{{ route('lektion',['Griechisch-römische Antike']) }}">Griechisch-römische Antike</a>
                            <a class="item" href="{{ route('lektion', ['Mittelalter']) }}">Mittelalter</a>
                            <a class="item" href="{{ route('lektion', ['Frühe Neuzeit']) }}">Frühe Neuzeit</a></li>
                            <div class="header">Ideen- und Personengeschichte der Pädagogik</div>
                            <a class="item" href="{{ route('lektion', ['Jean-Jacques Rousseau']) }}">Jean-Jacques Rousseau</a>
                            <a class="item" href="{{ route('lektion', ['Johann Heinrich Pestalozzi']) }}">Johann Heinrich Pestalozzi</a>
                            <a class="item" href="{{ route('lektion', ['Wilhelm von Humboldt']) }}">Wilhelm von Humboldt</a>
                            <div class="header">Erziehung und Schule</div>
                            <a class="item" href="{{ route('lektion', ['Erziehung und Unterricht']) }}">Erziehung und Unterricht</a>
                            <a class="item" href="{{ route('lektion', ['Heterogenität']) }}">Heterogenität</a>
                            <div class="header">Bildung – Glück – Gerechtigkeit</div>
                            <a class="item" href="{{ route('lektion', ['Wozu ist die Bildung da%3F']) }}">Wozu ist die Bildung da?</a>
                            <a class="item" href="{{ route('lektion', ['Bildung und Glück']) }}">Bildung und Glück</a>
                            <a class="item" href="{{ route('lektion', ['Bildung und Gerechtigkeit']) }}">Bildung und Gerechtigkeit</a>
                            <div class="divider"></div>
                            <a class="item rechtshinweise" href="{{ url('impressum') . '#rechtshinweise' }}">Rechtshinweise</a>
                        </div>
                    </div>

                    <a class="item @if ( Request::segment(1) === 'hgf' ) active @endif" href="{{ url('hgf') }}">Häufig gestellte Fragen</a>

                    <a class="item @if ( Request::is('kontakt') ) active @endif" href="{{ url('kontakt') }}">Kontakt</a>

                    <div class="right item"><a class="ui inverted submit button" href="{{ url('auth/logout') }}">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} @if ( Auth::user()->role != 'Student' ) (<b>{{ Auth::user()->role }}</b>) @endif abmelden</a></div>

                </div>
            </div>
        </div>

        {{-- MOBILE NAVIGATION --}}
        <div class="mobile only row">
            <div class="column">
                <div class="ui fixed large inverted green menu">

                    <a class="etpM item" href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/" target="_blank">e:t:p:M</a>

                    <div class="right item">
                        <div id="submenu" class="ui inverted icon button">
                            <i class="icon content"></i> Menü
                        </div>
                    </div>
                <div>

                <div id="subnav-container" class="ui fixed large inverted menu">

                    <div id="subnav" class="ui secondary vertical fluid menu">
                        <a class="item @if ( Request::is('/') ) active @endif" href="{{ url('/') }}">
                            <i class="home icon"></i> Dashboard
                        </a>
                        <a class="item" href="{{ url('/') }}#all-lections">
                            <i class="film icon"></i> online-Lektionen
                        </a>
                        <a class="item @if ( Request::is('hgf') ) active @endif" href="{{ url('hgf') }}">
                            <i class="help circle icon"></i> Häufig gestellte Fragen
                        </a>
                        <a class="item @if ( Request::is('kontakt') ) active @endif" href="{{ url('kontakt') }}">
                            <i class="send icon"></i> Kontakt
                        </a>
                        <a class="item" href="{{ url('auth/logout') }}">
                            <i class="sign out icon"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</nav>
