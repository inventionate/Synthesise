@extends('layouts.default')

@section('title')
  <title>Informationen über das e:t:p:M® Konzept</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui stackable container grid vue">
    <!-- Besser mit Segmenten arbeiten  -->
    <div class="one column row">
    	<div class="center aligned column">
            {{-- An dieser Stelle das Logo anzeigen --}}
            <h1>Informationen über das e:t:p:M® Konzept</h1>

            <p>
            Das Blended Learning Konzept <span class="etpM">e:t:p:M</span> ist für regelmäßig stattfindende Lehrveranstaltungen (z.B. Einführungsvorlesungen) mit großer und sehr großer Teilnehmerzahl von <a href="#kontakt">Apl. Prof. Dr. Timo Hoyer</a> und <a href="#kontakt">Fabian Mundt, M.A.</a> entwickelt worden. Es trägt in besonderem Maße dem Umstand Rechnung, dass sich die Studierenden am Übergang von der schulischen zur akademischen Lehr-Lern-Kultur befinden.
            </p>
            <p>
                Eine ausführliche Darstellung des Gesamtkonzepts finden Sie im Sammelband <a href="http://www.waxmann.com/index.php?id=buecher&no_cache=1&tx_p2waxmann_pi1%5Boberkategorie%5D=OKA100022&tx_p2waxmann_pi1%5Breihe%5D=REI100145&tx_p2waxmann_pi1%5Bbuch%5D=BUC123898" target="_blank"><em>Lernräume gestalten – Bildungskontexte vielfältig denken (2014)</em></a>.
            </p>
        </div>
    </div>

    <div class="ui hidden divider"></div>

    <div class="four column row">
        <div class="column">
            <div class="ui circular segment">
                <h2 class="ui icon header">
                    <a href="#elearning">
                    <i class="ui laptop icon"></i>
                    <div class="sub header">eLearning</div>
                    </a>
                </h2>
            </div>
        </div>

        <div class="column">
            <div class="ui circular segment">
                <h2 class="ui icon header">
                    <a href="#theorie">
                    <i class="ui file text outline icon"></i>
                    <div class="sub header">Theorie</div>
                    </a>
                </h2>
            </div>
        </div>

        <div class="column">
            <div class="ui circular segment">
                <h2 class="ui icon header">
                    <a href="#präsenz">
                    <i class="ui university icon"></i>
                    <div class="sub header">Präsenz</div>
                    </a>
                </h2>
            </div>
        </div>

        <div class="column">
            <div class="ui circular segment">
                <h2 class="ui icon header">
                    <a href="#mentoring">
                    <i class="ui users icon"></i>
                    <div class="sub header">Mentoring</div>
                    </a>
                </h2>
            </div>
        </div>
    </div>

    <div id="elearning" class="ui horizontal header divider"><i class="ui laptop icon"></i>eLearning</div>

    <div class="ui basic segment">
    <div class="ui stackable relaxed vertically divided grid">

        <div class="row">
        <div class="seven wide column">
            <h2 class="ui header">online-Lektionen</h2>
            <p>
                Das Zentrum des eLearning Angebots von <span class="etpM">e:t:p:M</span> bilden im Studio aufgenommene und umfangreich nachbearbeitete Videos mit einer Länge von rund 30 Minuten. Damit dauern die sog. online-Lektionen einerseits erheblich länger als die Videoanteile der derzeit viel diskutierten MOOCs, POOCs oder SPOCs. Andererseits sind die einzelnen Lektionen deutlich kürzer als übliche Hörsaalvorlesungen. Der zeitliche Umfang von ca. 30 Minuten ist theoretisch mit den Aufmerksamkeitskapazitäten von Studierenden zu begründen. Die Dauer hat sich, wie die Evaluationen belegen, in der Praxis bewährt.
            </p>
            <p>
                Jede online-Lektion ist das Ergebnis einer umfassenden Produktions- und Postproduktionsphase. Neben einem auf das jeweilige Thema visuell vorbereitenden Intro und einem standardisierten Abspann besitzt jede Lektion wiederkehrende formalästhetische Merkmale, die den Vortrag ergänzen, vertiefen und die Rezeption sowohl intensivieren als auch erleichtern.
            </p>
            <p>
                <b id="playdemo">Schauen Sie sich den Anfang der online-Lektion »Mittelalter« an!</b>
            </p>
        </div>
        <div class="nine wide column">

            <interactive-video name="Demo Video" path="video/promo.mp4" markers="{{
                json_encode([
                    ['time' => 30, 'text' => 'Völkerwanderung'],
                    ['time' => 75, 'text' => 'Aufstieg des Christentums'],
                    ['time' => 125, 'text' => 'Hoch- und Spätmittelalter'],
                    ])
            }}"
            poster="/images/ol_title.jpg" v-bind:notes="false"></interactive-video>

        </div>
        </div>

        <div class="row">
        <div class="nine wide column">
            <img class="ui image" src="/images/notizfunktion.png">
        </div>
        <div class="seven wide column">
            <h2 class="ui header">Notizfunktion</h2>
            <p>
                Die interaktive Timeline der <span class="etpM">e:t:p:M</span> Web-App ermöglicht es, je nach Bedürfnis direkt zu einem »Fähnchen« (und somit zu einer Themeneinheit) der online-Lektion zu springen (siehe Demo). Es ist außerdem möglich über ein eingeblendetes Feld zu jedem »Fähnchen« eine individuelle Notiz (Querverbindungen, Eselsbrücken, Anmerkungen etc.) zu verfassen (max. 500 Zeichen). Diese wird verschlüsselt und personalisiert in einer Datenbank gespeichert und lässt sich jederzeit ergänzen, ändern, löschen. Damit solche Videoannotationen auch in den Präsenzveranstaltungen fruchtbar gemacht werden können, besteht jederzeit die Möglichkeit, diese als PDF Dokument herunterzuladen.
            </p>
        </div>
        </div>

        {{-- <div class="row">
        <div class="seven wide column">
            <h2 class="ui header">Sequenzen</h2>
            <p>
                Die online-Lektionen lassen sich problemlos in <em>Sequenzen</em> einteilen, die gesodnerte Diskussionsräume und spezifische Fähnchen ermöglichen.
            </p>
        </div>
        <div class="nine wide column">
            <img class="ui huge image" src="/images/sequenzen.png" alt="Sequenzen" />
        </div>
        </div> --}}

        {{-- <div class="row">
        <div class="nine wide column">
            <img class="ui image" src="/images/disqus.png" alt="disqus">
        </div>
        <div class="seven wide column">
            <h2 class="ui header">Diskussionsräume</h2>
            <p>
                Die Web-App ermöglicht die Integraton von <b>disqus™</b> Diskussionräumen. Je nach Intention können diese entweder anonym verwendet werden, oder aber personalisiert und über die Anwendung hinausweisend.
            </p>
        </div>
        </div> --}}

        <div class="row">
        <div class="seven wide column">
            <h2 class="ui header">Responsive Web-App</h2>
            <p>
                Der Funktionsumfang der Web-App umfasst vier Bereiche. Erstens macht sie die digitalen Inhalte (online-Lektionen und Literatur) zugänglich. Zweitens ermöglicht sie einen einfachen Zugriff auf allgemeine Informationen. Drittens bietet sie einen umfassenden »Häufig gestellte Fragen«-Bereich an und viertens erlaubt sie eine einfache Kommunikation zwischen Studierenden und Dozierenden (Meldungen, Kontaktformulare).
            </p>
            <p>
            </p>
            <h3 class="ui header">Basierend auf modernen Open Source Technologien</h3>
            <div class="ui list">
              <div class="item">
                <img class="ui avatar image" src="/images/laravel_logo.png" alt="Laravel Logo">
                <div class="content">
                  <a class="header" href="http://laravel.com" target="_blank">Laravel</a>
                  <div class="description">»The PHP Framework For Web Artisans«</div>
                </div>
              </div>
              <div class="item">
                <img class="ui avatar image" src="/images/vue_logo.png" alt="Vue.js Logo">
                <div class="content">
                  <a class="header" href="http://vuejs.org" target="_blank">Vue.js</a>
                  <div class="description">»A Library For Building Modern Web Interfaces«</div>
                </div>
              </div>
              <div class="item">
                <img class="ui avatar image" src="/images/videojs_logo.png" alt="Video.js Logo">
                <div class="content">
                  <a class="header" href="http://videojs.com/" target="_blank">Video.js</a>
                  <div class="description">»The Player Framework«</div>
                </div>
              </div>
              <div class="item">
                <img class="ui avatar image" src="/images/semantic_ui_logo.png" alt="Semantic UI Logo">
                <div class="content">
                  <a class="header" href="http://semantic-ui.com/" target="_blank">Semantic UI</a>
                  <div class="description">»A UI Component Framework Designed For Theming«</div>
                </div>
              </div>
            </div>
        </div>
        <div class="nine wide column">
            <img class="ui huge image" src="/images/responsive_webapp.png" alt="Responsive Web-App">
        </div>
        </div>

    </div>
    </div>

    <div id="theorie" class="ui horizontal header divider"><i class="ui file text outline icon"></i>Theorie</div>

    <div class="ui basic segment">
    <div class="ui stackable relaxed grid">

        <div class="nine wide column">
            <img class="ui image" src="/images/texte.png" alt="Texte">
        </div>
        <div class="seven wide column">
            <h2 class="ui header">Primär- und Sekundärliteratur</h2>
            <p>
                Zu jeder online-Lektion wird den Studierenden ein Text zur Verfügung gestellt, der die in der Lektion angesprochene Thematik weiterführt. Hierbei handelt es sich um Primär- oder Sekundärliteratur unterschiedlicher Gattungen (wissenschaftliche Texte, Essays, literarische Texte, Vorträge). Bewährt hat sich ein Gesamtumfang von rund 200 bis 230 Seiten. Jedem Text werden Bearbeitungshinweise, spezifische Fragen und Aufgaben sowie weiterführende Literaturangaben hinzugefügt. Sämtliche Texte werden einheitlich typographiert (keine eingescannten Texte), mit einer durchgehenden Seitenzählung und laufenden Zeilennummerierungen versehen, was die Lektüre und die gemeinsame Bearbeitung erleichtert.
            </p>
        </div>

    </div>
    </div>


    <div id="präsenz" class="ui horizontal header divider"><i class="ui university icon"></i>Präsenz</div>


    <div class="ui basic segment">
    <div class="ui stackable relaxed grid">

        <div class="seven wide column">
            <h2 class="ui header">Präsenzphasen</h2>
            <p>
                Insgesamt können hier drei verschiedene Typen unterschieden werden:
            </p>
            <div class="ui list">
              <a class="item">
                <i class="top aligned right triangle icon"></i>
                <div class="content">
                  <div class="header">Informationsveranstaltungen</div>
                  <div class="description">Hierbei handelt es sich um eine einführende und eine abschließende Veranstaltung.  </div>
                </div>
              </a>
              <a class="item">
                <i class="top aligned right triangle icon"></i>
                <div class="content">
                  <div class="header">Mentoriate</div>
                  <div class="description">Im wöchentlichen Rhythmus betreut ein Mentorentandem eine Kleingruppe von Studierenden.</div>
                </div>
              </a>
              <a class="item">
                <i class="top aligned right triangle icon"></i>
                <div class="content">
                  <div class="header">»HGF«-Veranstaltungen</div>
                  <div class="description">Nach jeder thematischen Einheit findet eine »Häufig gestellte Fragen«-Veranstaltung statt.</div>
                </div>
              </a>
            </div>
        </div>

        <div class="nine wide column">
            <img class="ui image" src="/images/etpm_schema.png" alt="Texte">
        </div>

    </div>
    </div>


    <div id="mentoring" class="ui horizontal header divider"><i class="ui users icon"></i>Mentoring</div>


    <div class="ui basic segment">
    <div class="ui stackable relaxed grid">

        <div class="nine wide column">
            <img class="ui image" src="/images/mentoring.jpg" alt="Mentoring" />
        </div>
        <div class="seven wide column">
            <h2 class="ui header">Mentoring Zertifikat</h2>
            <p>
                Mentoren sind Studierende höherer Semester, die die Erstsemesterstudierenden bei der Aneignung der Lehr-Lern-Inhalte, beim Umgang mit wissenschaftlichen Texten und beim Studieneinstieg unterstützen. Untersuchungen zeigen, dass das Mentoring in der Studieneingangsphase verglichen mit vorlesungs- und dozentenzentrierten Lehrformen das aktive Lernen stärker erhöht und die psychischen Belastungen der Studierenden verringern hilft. Die Qualifikation der Mentoren erfolgt in einem <a href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/mentoring/" target="_blank">»Zertifikatsstudium Mentoring«</a> (15 CP).
            </p>
        </div>

    </div>
    </div>


    <div class="ui horizontal header divider"><i class="ui bar chart icon"></i>Feedback</div>


    <div class="ui basic segment">
    <div class="ui stackable relaxed grid">

        <div class="seven wide column">
            <h2 class="ui header">Evaluation</h2>
            <p>
                Jedes Semester wird eine umfangreiche <a href="https://etpm-dev.ph-karlsruhe.de/etpm-evaluation/" target="_blank">Abschlussevaluationen</a> durchgeführt. Bislang sind es drei. Die Teilnehmerzahl lag im Wintersemester 2012/2013 bei 40% (n = 285), im Wintersemester 2013/2014 bei 27% (n = 185) und im Wintersemester 2014/2015 bei 43% (n = 189). In allen Evaluationen bescheinigen die Studierenden dem Gesamtkonzept eine sehr gelungene Integration der digitalen und präsenzbasierten Bestandteile. Die Tragweite dieser Bewertung wird noch deutlicher, wenn man nach der nachhaltigen Wirkung des Blended Learning Konzepts im Hinblick auf das eigenverantwortliche Lernen – eine »Schlüsselkompetenz« erfolgreichen Studierens – fragt. Nahezu alle Studierende gaben an, durch <span class="etpM">e:t:p:M</span> in ihrem eigenverantwortlichen Lernen erheblich gefördert worden zu sein.
            </p>
        </div>
        <div class="nine wide column">
            <img class="ui bordered image" src="/images/evaluation.jpg" alt="Evaluation" />
        </div>

        <div class="nine wide column">
            <img class="ui bordered image" src="/images/analytics.jpg" alt="Analytics" />
        </div>
        <div class="seven wide column">
            <h2 class="ui header">Analytics</h2>
            <p>
                In die <span class="etpM">e:t:p:M</span> Web-App ist ein Diagnosewerkzeug integriert, das auf der Open Source Software <a href="http://piwik.org/" target="_blank">Piwik</a> basiert. Da die Software auf hochschuleigenen Serven betrieben wird, ist ein rechtlich abgesicherter Rahmen gegeben. Alle <a href="{{ url('impressum') }}">freiwillig</a> erhobenen Daten verbleiben innerhalb des Hochschulnetzes. Die Software ermöglicht es, die Interaktionen der Studierenden mit der Web-App (den Lektionen, Texten etc.) anonymisiert aufzuzeichnen. Die Interaktionsanalyse erlaubt somit laufend Rückschlüsse auf das Lernverhalten und die Nutzung der Materialien. Erkennbar wird z. B., dass manche Lektionen und Passagen häufiger bearbeitet werden als andere, was auf Unterschiede im Schwierigkeitsgrad deutet, worauf sich die Mentoriate und HGF-Vorlesungen einstellen. Zudem werden die Interaktionsanalysen in Beziehung zu der Abschlussevaluation gesetzt: Die über einen online Fragebogen abgegebenen Bewertungen am Ende des Semesters lassen sich im Kontext des prozessualen Umgangs mit den eLearning Angeboten interpretieren.
            </p>
        </div>

    </div>
    </div>

    <div id="kontakt" class="ui horizontal header divider"><i class="ui send icon"></i>Kontakt</div>

    <div class="stackable relaxed centered row">
        <div class="center aligned five wide column">
            <img class="ui small avatar image" src="/images/hoyer.jpg">
            <h3 class="ui header"><a href="mailto:hoyer@ph-karlsruhe.de">Apl. Prof. Dr. Timo Hoyer</a></h3>
        </div>
        <div class="center aligned five wide column">
            <img class="ui small avatar image" src="/images/mundt.jpg">
            <h3 class="ui header"><a href="mailto:mundt@ph-karlsruhe.de">Fabian Mundt, M.A.</a></h3>
        </div>
    </div>

</main>
@stop

@section('scripts')
    <script>
        var videoplayer = videojs('videoplayer');

        $('#playdemo').on('click', function () {
            videoplayer.play();
        });
    </script>
@stop
