<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    {{-- Brand and toggle get grouped for better mobile display --}}
      <div class="navbar-header">
        <a class="etpM navbar-brand" href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/" target="_blank">e:t:p:M</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h1 class="nav-event-title hidden-md hidden-lg"><a href="{{ url('') }}">Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns</a></h1>
      </div>
    {{-- Collect the nav links, forms, and other content for toggling --}}
    <div class="collapse navbar-collapse" id="main-navbar">
      <ul class="nav navbar-nav">
        <li @if ( Request::is('dashboard') ) class="active" @endif><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li class="dropdown @if ( Request::segment(1) === 'online-lektionen' ) active @endif">
          <a href="{{ url('online-lektionen') }}" class="dropdown-toggle" data-toggle="dropdown">online-Lektionen <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li role="presentation" class="dropdown-header">Sozialgeschichte der Erziehung und Bildung</li>
            <li><a href="{{ route('lektion','Griechisch-römische Antike') }}">Griechisch-römische Antike</a></li>
            <li><a href="{{ route('lektion', 'Mittelalter') }}">Mittelalter</a></li>
            <li><a href="{{ route('lektion', 'Frühe Neuzeit') }}">Frühe Neuzeit</a></li>
            <li role="presentation" class="dropdown-header">Ideen- und Personengeschichte der Pädagogik</li>
            <li><a href="{{ route('lektion', 'Jean-Jacques Rousseau') }}">Jean-Jacques Rousseau</a></li>
            <li><a href="{{ route('lektion', 'Johann Heinrich Pestalozzi') }}">Johann Heinrich Pestalozzi</a></li>
            <li><a href="{{ route('lektion', 'Wilhelm von Humboldt') }}">Wilhelm von Humboldt</a></li>
            <li role="presentation" class="dropdown-header">Erziehung und Schule</li>
            <li><a href="{{ route('lektion', 'Erziehung und Unterricht') }}">Erziehung und Unterricht</a></li>
            <li><a href="{{ route('lektion', 'Heterogenität') }}">Heterogenität</a></li>
            <li role="presentation" class="dropdown-header">Bildung – Glück – Gerechtigkeit</li>
            <li><a href="{{ route('lektion', 'Wozu ist die Bildung da%3F') }}">Wozu ist die Bildung da?</a></li>
            <li><a href="{{ route('lektion', 'Bildung und Glück') }}">Bildung und Glück</a></li>
            <li><a href="{{ route('lektion', 'Bildung und Gerechtigkeit') }}">Bildung und Gerechtigkeit</a></li>
            <li class="divider"></li>
            <li><a class="rechtshinweise" href="{{ url('impressum') . '#rechtshinweise' }}">Rechtshinweise</a></li>
          </ul>
        </li>
        <li @if ( Request::segment(1) === 'hgf' ) class="active" @endif ><a href="{{ url('hgf') }}">Häufig gestellte Fragen</a></li>
        <li @if ( Request::is('kontakt') ) class="active" @endif ><a href="{{ url('kontakt') }}">Kontakt</a></li>
      </ul>
      <a href="{{ url('logout') }}" id="btn-logout" class="btn btn-primary btn-block navbar-right hidden-print" data-no-turbolink>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} abmelden</a>
    </div>
  </div>
</nav>
