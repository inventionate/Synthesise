<?php

use Illuminate\Database\Seeder;

use Synthesise\Seminar;

class SeminarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('seminars')->delete();

        // AHEW

        Seminar::create(array(
            'name' => 'Grundlagen pädagogischen Denkens und Handelns',
            'subject' => 'Allgemeine und Historische Erziehungswissenschaft',
            'description' => 'Hier geht es um die Grundlagen von Erziehung und Bildung.',
            'module' => 'M1',
            'author' => 'Apl. Prof. Dr. Timo Hoyer',
            'contact' => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => ["dozent", "root"],
            'image_path' => 'storage/seminars/2f85bce36f69738b5fa85b25e6e9a728.jpg',
            'info_intro' => '<p>
            Die Lehrveranstaltung »Grundlagen pädagogischen Denkens und Handelns« führt in Themen und Fragestellungen der Allgemeinen und Historischen Erziehungswissenschaft ein. Sie setzt sich folgendermaßen zusammen:</p>',
            'info_lections' => '<p>
                Die online-Lektionen vermitteln in verdichteter, visualisierter Form Theoriezugänge zu elementaren Themenfeldern und Forschungszweigen der Allgemeinen und Historischen Erziehungswissenschaft.<br>
                Die einzelnen Lektionen werden in festgelegten, zumeist wöchentlichen Abständen zugänglich gemacht (Daten der Freischaltung siehe unter »Zugänglich ab« in der Tabelle weiter unten). Die einmal freigeschalteten Lektionen bleiben bis zum Tag der Prüfung geöffnet und können jederzeit angeschaut werden.<br>
                An den mit roten Fähnchen gekennzeichneten Stellen der online-Lektionen können Sie individuelle Notizen (Stichworte, kurze Erläuterungen, Eselsbrücken, Querverweise etc.) einfügen, die automatisch gespeichert werden und als PDF ausdruckbar sind.<br>
                <em>Die Lektionen sind <a href="/impressum#rechtshinweise" target="_blank">urheberrechtlich geschützt</a> und ausschließlich im vorgegebenen Rahmen der Lehrveranstaltung zu nutzen. Der Download oder die Verbreitung in irgendeiner Form ist nicht gestattet.</em>
            </p>',
            'info_texts' => '<p>
            Digitalisierte Medien sind eine Erweiterung herkömmlicher Lehr-Lern-Medien, sollen diese aber nicht zum Verschwinden bringen. Wissenschaftliche, hermeneutische Textarbeit bleibt eine bedeutsame Praxis, die Studierende gerade in stark von Theoriedebatten geprägten Fächern, wie die Erziehungswissenschaft, erlernen und ausüben müssen.<br>
            Zu jeder online-Lektion gibt es (mindestens) einen prüfungsrelevanten Text (Primär- oder Sekundärliteratur), der die in der Lektion angesprochenen Themen mit neuen Gesichtspunkten ergänzt, vertieft oder weiterführt. <br>
            Den Texten sind Bearbeitungsaufgaben und Fragen beigefügt (<a href="/seminar/Grundlagen%20pädagogischen%20Denkens%20und%20Handelns/faq/T">Hinweise zur Bearbeitung der Texte</a>).<br>
            In den wöchentlichen Veranstaltungen (Mentoriate) besteht die Gelegenheit, die Inhalte zu reflektieren, Verknüpfungen zwischen Lektion und Text herzustellen sowie Abweichungen, Widersprüche und eigene Erfahrungen zu diskutieren.<br>
            Allgemeine und weiterführende Literaturhinweise zu den vier großen Themenblöcken der Vorlesung bieten die Möglichkeiten, sich über die Veranstaltung hinaus mit den darin angesprochenen Fragen auseinanderzusetzen.
            </p>',
            'info_exam' => '<p>
            Die Modul 1-Veranstaltung wird in der Prüfungswoche mit einer 90minütigen schriftlichen Klausur abgeschlossen, die aus zwei gleichwertigen Teilen besteht: Allgemeine/Historische Erziehungswissenschaft und Schulpädagogik.<br>
            Der Teil der Allgemeinen und Historischen Erziehungswissenschaft setzt sich aus Single Choice- und Multiple Choice-Aufgaben zusammen. Die Klausurmodalitäten werden rechtzeitig in einer Vorlesung (siehe Präsenzveranstaltungen) besprochen.<br>
            Weitere allgemeine Informationen zur Akademischen Vorprüfung finden Sie auf der Website des <a href="http://www.ph-karlsruhe.de/studium-lehre/studien-service-zentrum/pruefungsaemter/">Prüfungsamts</a>.
          </p>',
            'info_path' => NULL,
            'available_from' => '2016-10-25',
            'available_to' => '2017-02-08',
            'disqus_shortname' => NULL,
        ));

        // FRÜHPÄDAGOGIK
        Seminar::create(array(
            'name' => 'Geschichte(n) und Theorien (früh-)kindlicher Bildung und Entwicklung',
            'subject' => 'Frühpädagogik',
            'description' => 'Hier geht es um die frühpädagogischen Grundlagen von Erziehung und Bildung.',
            'module' => 'M1',
            'author' => 'Prof. Dr. Ulrich Wehner',
            'contact' => 'wehner@ph-karlsruhe.de',
            'authorized_editors' => ["dozent", "root"],
            'image_path' => 'storage/seminars/59d1c268a763eb7d28cdefa5274b1d2a.jpg',
            'info_intro' => NULL,
            'info_lections' => NULL,
            'info_texts' => NULL,
            'info_exam' => NULL,
            'info_path' => NULL,
            'available_from' => '2016-10-30',
            'available_to' => '2017-03-01',
            'disqus_shortname' => NULL
        ));

    }
}
