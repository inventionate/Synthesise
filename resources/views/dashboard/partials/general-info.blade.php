<section id="general-info" class="ui stackable grid">

    <div class="one column row">
        <div class="column">

            <h2 class="ui header">Allgemeine Informationen</h2>

            <p>
                Die Lehrveranstaltung »Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns« führt in Themen und Fragestellungen der Allgemeinen und Historischen Erziehungswissenschaft ein. Sie setzt sich folgendermaßen zusammen:
            </p>

            <div class="ui styled fluid accordion">

                <div class="title">
                    <i class="dropdown icon"></i>
                    Online-Lektionen
                </div>
                <div class="content">
                    <p>
                        Die online-Lektionen vermitteln in verdichteter, visualisierter Form Theoriezugänge zu elementaren Themenfeldern und Forschungszweigen der Allgemeinen und Historischen Erziehungswissenschaft.<br>
                        Die einzelnen Lektionen werden in festgelegten, zumeist wöchentlichen Abständen zugänglich gemacht (Daten der Freischaltung siehe unter »Zugänglich ab« in der Tabelle weiter unten). Die einmal freigeschalteten Lektionen bleiben bis zum Tag der Prüfung geöffnet und können jederzeit angeschaut werden.<br>
                        An den mit roten Fähnchen gekennzeichneten Stellen der online-Lektionen können Sie individuelle Notizen (Stichworte, kurze Erläuterungen, Eselsbrücken, Querverweise etc.) einfügen, die automatisch gespeichert werden und als PDF ausdruckbar sind.<br>
                        <em>Die Lektionen sind <a href="{{ url('impressum') . '#rechtshinweise' }}" target="_blank">urheberrechtlich geschützt</a> und ausschließlich im vorgegebenen Rahmen der Lehrveranstaltung zu nutzen. Der Download oder die Verbreitung in irgendeiner Form ist nicht gestattet.</em>
            		</p>
                </div>

                <div class="title">
                    <i class="dropdown icon"></i>
                    Texte
                </div>
                <div class="content">
                    <p>
            		Digitalisierte Medien sind eine Erweiterung herkömmlicher Lehr-Lern-Medien, sollen diese aber nicht zum Verschwinden bringen. Wissenschaftliche, hermeneutische Textarbeit bleibt eine bedeutsame Praxis, die Studierende gerade in stark von Theoriedebatten geprägten Fächern, wie die Erziehungswissenschaft, erlernen und ausüben müssen.<br>
            		Zu jeder online-Lektion gibt es (mindestens) einen prüfungsrelevanten Text (Primär- oder Sekundärliteratur), der die in der Lektion angesprochenen Themen mit neuen Gesichtspunkten ergänzt, vertieft oder weiterführt. <br>
            		Den Texten sind Bearbeitungsaufgaben und Fragen beigefügt (<a href="{{ url('hgf/T') }}">Hinweise zur Bearbeitung der Texte</a>).<br>
            		In den wöchentlichen Veranstaltungen (Mentoriate) besteht die Gelegenheit, die Inhalte zu reflektieren, Verknüpfungen zwischen Lektion und Text herzustellen sowie Abweichungen, Widersprüche und eigene Erfahrungen zu diskutieren.<br>
            		Allgemeine und weiterführende Literaturhinweise zu den vier großen Themenblöcken der Vorlesung bieten die Möglichkeiten, sich über die Veranstaltung hinaus mit den darin angesprochenen Fragen auseinanderzusetzen.
            		</p>
                </div>

                {{--
                <div class="title">
                    <i class="dropdown icon"></i>
                    Präsenzveranstaltungen
                </div>
                <div class="content">
                    <p>
            		Digitale oder virtuelle Lektionen können und sollen nicht den realen, zwischenmenschlichen Kontakt ersetzen. Präsenzveranstaltungen sind und bleiben deshalb unverzichtbar. In Vorort-Veranstaltungen finden Gruppen-, Kommunikations-, Aneignungs- und Bildungsprozesse statt, die in einer anregungsreichen, auf wechselseitigen Austausch und gemeinsamen Initiativen fußenden akademischen Lehr-Lern-Kultur von alternativloser Bedeutung sind.<br>
            		Der Einsatz virtueller Medien gestattet die Bildung von kleineren Lehr-Lern-Gruppen, in denen eine unmittelbarere, kommunikative und handlungsorientierte Bearbeitung der Themen möglich ist.  <a href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/" target="_blank"><span class="etpM">e:t:p:M</span></a> beinhaltet folgende Präsensveranstaltungen (<a class="download-info" data-name="Allgemeine Informationen und Termine" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => 'Allgemeine Informationen und Termine']) }}">Informationen zu Terminen und Räumen <span class="glyphicon glyphicon-file"></span></a>):
                    </p>
            		<ul class="ui list">
            		<li>Einführungsvorlesung und Prüfungsvorbereitung: In der ersten Woche nach der Einführungswoche wird in der Aula über das Format, den Ablauf und den inhaltlichen »roten Faden« der Gesamtveranstaltung informiert. Gegen Ende der Vorlesungszeit findet eine Vorlesung speziell zum Ablauf der Prüfung statt.</li>
            		<li>HGF-Vorlesungen: Mehrmals im Semester finden in der Aula »Häufig gestellte Fragen«-Vorlesungen für sämtliche Studierende statt. Hierfür sammeln die Mentoren im Vorfeld inhaltsbezogene Fragen der Studierenden, reichen sie an den Dozenten weiter, der sie in den Vorlesungen bespricht. (Zudem können sich die Studierenden unter <a href="{{url('hgf')}}">»Häufig gestellte Fragen«</a> jederzeit über wesentliche Fragen zum formalen Ablauf der Gesamtveranstaltung und zur Klausur informieren).</li>
            		<li>Mentoriate: Über das Zuordnungssystem von LSF sind Kleingruppen gebildet worden. Die Gruppen (Mentoriate) treffen sich wöchentlich zu den angegebenen Zeiten. Studentische Mentoren (meistens Tandems), die zusätzlich zu ihrem Lehramtsstudium das <a href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/mentoring/" target="_blank">Zertifikatsstudium Mentoring</a> absolvieren, unterstützen und beraten die Studierenden bei der Aneignung der Stoffe, beim Umgang mit wissenschaftlichen Texten, bei generellen Fragen zum Studium und bei der Prüfungsvorbereitung.</li>
                    </ul>
            		<div class="ui info message"><a href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/mentoring/" target="_blank">Wer Interesse an der Zusatzqualifikation des Mentorings hat und selbst Mentor/Mentorin werden möchte, kann sich nach bestandener Prüfung zum Zertifikatsstudium anmelden</a>.</div>
                </div>

                --}}

                <div class="title">
                    <i class="dropdown icon"></i>
                    Prüfung
                </div>
                <div class="content">
                    <p>
              		Die Modul 1-Veranstaltung wird in der Prüfungswoche mit einer 90minütigen schriftlichen Klausur abgeschlossen, die aus drei gleichwertigen Teilen besteht: Allgemeine und Historische Erziehungswissenschaft, Schulpädagogik, Psychologie.<br>
              		Der Teil der Allgemeinen und Historischen Erziehungswissenschaft setzt sich aus Single Choice- und Multiple Choice-Aufgaben zusammen. Die Klausurmodalitäten werden rechtzeitig in einer Vorlesung (siehe Präsenzveranstaltungen) besprochen.<br>
              		Insgesamt sind in der Klausur (die drei Prüfungsteile werden zusammengerechnet) 300 Punkte zu erreichen. Ab einer Gesamtpunktzahl von 150 gilt die Prüfung als bestanden. Über die Ergebnisse der Klausur informiert das Prüfungsamt.<br>
              		Die Klausureinsicht ist anschließend nach Absprache mit dem zuständigen Dozenten möglich. Für Einsicht in den Prüfungsteil der Allgemeinen und Historischen Erziehungswissenschaft wenden Sie sich bitte an <a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/albert-berger/" target="_blank">Dr. Albert Berger</a>.<br>
              		Weitere allgemeine Informationen zur Akademischen Vorprüfung finden Sie auf der Website des <a href="http://www.ph-karlsruhe.de/studium-lehre/studien-service-zentrum/pruefungsaemter/">Prüfungsamts</a>.
              	  </p>
                </div>

            </div>

            <div class="ui hidden divider"></div>

            <p>Sie können sich diese Informationen und die Termine der Veranstaltung auch als PDF Dokument herunterladen:</p>

            <a class="fluid ui blue icon labeled button download-info" data-name="Allgemeine Informationen und Termine" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => 'Allgemeine Informationen und Termine']) }}">Allgemeine Informationen und Termine <i class="download icon"></i></a>

        </div>
    </div>

</section>
