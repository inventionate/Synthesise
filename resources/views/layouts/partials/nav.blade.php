<nav id="mainnav" role="navigation">
    <div class="ui grid container">

        {{-- @TODO Responsives Menü erstellen!!! --}}

        {{-- COMPUTER NAVIGATION --}}
        <div class="computer only row">
            <div class="column">
                <div id="user-actions" class="ui fixed huge inverted green menu">

                    {{-- @TODO Den Link in Abhängigkeit von der Anzahl der Seminare setzen! --}}

                    <a class="etpM item @if ( Request::is('/') ) active @endif" href="{{ route('dashboard') }}" >e:t:p:M</a>

                    @if ( Request::segment(1) === 'seminars' )

                        @include('layouts.partials.nav-seminar')

                    @endif

                    <div class="right item"><a class="ui inverted submit button" href="{{ url('logout') }}">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} @if ( Auth::user()->role != 'Student' ) (<b>{{ Auth::user()->role }}</b>) @endif abmelden</a></div>

                </div>

                @if ( in_array(Auth::user()->role, ['Admin', 'Teacher']) )

                    <div id="admin-actions" class="ui fixed tiny fitted secondary menu">

                        @if ( Request::is('/') )

                            @include('layouts.partials.nav-admin')

                        @elseif( Request::segment(1) === 'seminars' )

                            @include('layouts.partials.nav-admin-seminar')

                        @endif

                    </div>

                @endif

            </div>
        </div>





{{-- MOBILE NAVIGATION KOMMT ERST WENN DIE PC UI UND(!) FUNKTIONALITÄT GEWÄHRLEITSTET IST!!! --}}



        {{-- MOBILE NAVIGATION --}}
        <div class="mobile tablet only row">
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
                        <a class="item" href="{{ url('logout') }}">
                            <i class="sign out icon"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</nav>
