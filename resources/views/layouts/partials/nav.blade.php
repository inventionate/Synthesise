<nav id="mainnav" role="navigation">
    <div class="ui grid container">

        {{-- @TODO Responsives Menü erstellen!!! --}}

        {{-- COMPUTER NAVIGATION --}}
        @if ( !Agent::isMobile() )

        <div class="computer only row">
            <div class="column">
                <div id="user-actions" class="ui fixed huge inverted green menu">

                    {{-- @TODO Den Link in Abhängigkeit von der Anzahl der Seminare setzen! --}}

                    <a class="etpM-branding item @if ( Request::is('/') ) active @endif" href="{{ route('dashboard') }}" >e:t:p:M</a>

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

        @endif

        {{-- MOBILE NAVIGATION --}}
        @if ( Agent::isMobile() )

        <div class="mobile tablet only row">

            <div class="column">

                <div class="ui fluid green large icon toggle button">
                    <span class="etpM">e:t:p:M</span>
                </div>

                @if ( in_array(Auth::user()->role, ['Admin', 'Teacher']) )

                    <div class="ui info message">
                        Sie können die Web-App mit Ihrem Mobilgerät nicht administrieren. Bitte verwenden Sie einen Computer.
                    </div>

                    @if ( in_array(Auth::user()->role, ['Admin', 'Teacher']) )

                        <div id="admin-actions" class="ui fixed tiny fitted secondary menu hide">

                            @if ( Request::is('/') )

                                @include('layouts.partials.nav-admin')

                            @elseif( Request::segment(1) === 'seminars' )

                                @include('layouts.partials.nav-admin-seminar')

                            @endif

                        </div>

                    @endif

                @endif

                <div class="ui left vertical inverted sidebar labeled icon menu">

                  <a class="item @if ( urldecode(Request::segment(2)) === $seminar_name && in_array(Request::segment(3), [null, 'users', 'settings' ]) ) active @endif" href="{{ route('seminar', ['name' => $seminar_name]) }}"><i class="home icon"></i> Dashboard</a>

                  @if ( Request::segment(1) === 'seminars' )


                      <div class="ui inverted vertical accordion menu item">
                        <div class="title">
                            <i class="video icon"></i>
                            online-Lektionen
                        </div>
                        <div class="content">

                                @foreach ( $sections as $section )

                                    {{-- <div class="header">
                                        {{ $section->name }}
                                    </div> --}}

                                    @foreach ( Section::getAllLections($section->id) as $lection )

                                        <a class="item" href="{{ route('lection', ['name' => $seminar_name, 'lection_name' => rawurlencode($lection->name), 'sequence' => 1]) }}">{{ $lection->name }}</a>

                                    @endforeach

                                @endforeach

                                <div class="divider"></div>

                                <a class="item rechtshinweise" href="{{ url('impressum') . '#rechtshinweise' }}">Rechtshinweise</a>

                        </div>
                      </div>

                      <a class="item @if ( urldecode(Request::segment(2)) === $seminar_name && Request::segment(3) === 'faq' ) active @endif" href="{{ route('seminar-faqs', ['name' => $seminar_name]) }}"><i class="help circle icon"></i> Häufig gestellte Fragen</a>

                      <a class="item @if ( urldecode(Request::segment(2)) === $seminar_name && Request::segment(3) === 'contact' ) active @endif" href="{{ route('seminar-contact', ['name' => $seminar_name]) }}"><i class="send icon"></i> Kontakt</a>

                  @endif

                </div>

            </div>

        </div>

        @endif


    </div>
</nav>
