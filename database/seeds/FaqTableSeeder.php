<?php

use Illuminate\Database\Seeder;
use Synthesise\Faq;

class FaqTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('faqs')->delete();

        Faq::create(array(
            'area' => 'A',
            'subject' => 'Anmeldung für die wöchentlichen Mentoriate',
            'question' => 'Wie melde ich mich an?',
            'answer' => 'Über LSF. Bitte lesen Sie dort zuvor die Bemerkungen.',
        ));

        Faq::create(array(
            'area' => 'A',
            'subject' => 'Anmeldung für Klausur',
            'question' => 'Wie und wann melde ich mich für die Klausur an?',
            'answer' => 'Die Anmeldung organisiert das <a href="http://www.ph-karlsruhe.de/de/studium-lehre/studien-service-zentrum/pruefungsaemter/">Prüfungsamt</a>.',
        ));

        Faq::create(array(
            'area' => 'A',
            'subject' => 'Anwesenheit',
            'question' => 'Besteht Anwesenheitspflicht in den Präsenzveranstaltungen?',
            'answer' => 'Es besteht keine Verpflichtung. Die regelmäßige Teilnahme wird dringend empfohlen.',
        ));

        Faq::create(array(
            'area' => 'B',
            'subject' => 'Belegungspflicht',
            'question' => 'Ist die M1-Veranstaltung eine Pflichtveranstaltung?',
            'answer' => 'Das Besuch der Veranstaltung ist verpflichtend. Das Bestehen der Akademischen Vorprüfung ist Voraussetzung für das Weiterstudium an der PH Karlsruhe.</p>
			<h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>
			<ol>
			<li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>
			<li>Die Akademische Vorprüfung wird in den Studienbereichen BW, 1. HF und dem 2. HF abgelegt.</li>
			<li>Wer alle in Absatz 2 genannten studienbegleitenden Modulprüfungen bestanden hat, hat die Akademische Vorprüfung bestanden. Die studienbegleitenden Modulprüfungen, die gemäß Absatz 2 die Akademische Vorprüfung bilden, können gemäß § 18 jeweils einmal wiederholt werden.</li>
			</ol><p>',
        ));

        Faq::create(array(
            'area' => 'B',
            'subject' => 'Belegungszeitraum',
            'question' => 'Bis zu welchem Semester muss ich die M1-Veranstaltung besucht bzw. die Klausur bestanden haben?',
            'answer' => '</p><h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>
			<ol>
			<li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>
			</ol><p>',
        ));

        Faq::create(array(
            'area' => 'D',
            'subject' => 'Durchgefallen',
            'question' => 'Was passiert, wenn ich die Klausur nicht bestehe?',
            'answer' => 'Die Klausur kann im folgenden Semester einmal wiederholt werden. Im Sommersemester werden von den einzelnen Fachgebieten Repetitorien (Wiederholungsveranstaltungen) angeboten.</p>
			<h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>
			<ol>
			<li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>
			<li>Die Akademische Vorprüfung wird in den Studienbereichen BW, 1. HF und dem 2. HF abgelegt.</li>
			<li>Wer alle in Absatz 2 genannten studienbegleitenden Modulprüfungen bestanden hat, hat die Akademische Vorprüfung bestanden. Die studienbegleitenden Modulprüfungen, die gemäß Absatz 2 die Akademische Vorprüfung bilden, können gemäß § 18 jeweils einmal wiederholt werden.</li>
			</ol><p>',
        ));

        Faq::create(array(
            'area' => 'E',
            'subject' => 'e:t:p:M',
            'question' => 'Was bedeutet e:t:p:M?',
            'answer' => 'Alles Wissenswerte zum e:t:p:M-Konzept erfahren Sie auf der <a href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/" target="_blank">e:t:p:M Website</a>.',
        ));

        Faq::create(array(
            'area' => 'E',
            'subject' => 'Evaluation',
            'question' => 'Wie kann man zur Veranstaltung Rückmeldung geben?',
            'answer' => 'Gegen Ende der Vorlesungszeit erhalten Sie die Gelegenheit, die Veranstaltung zu evaluieren. Der genaue Zeitraum der Evaluation wird Ihnen rechtzeitig auf dem Dashboard bekannt gegeben. Wir möchten Sie bitten, sich daran zu beteiligen.',
        ));

        Faq::create(array(
            'area' => 'I',
            'subject' => 'Infoveranstaltung',
            'question' => 'Gibt es eine Informationsveranstaltung, in der ich über den Aufbau und Ablauf der Veranstaltung informiert werde?',
            'answer' => 'Die Informationsveranstaltung findet in der Woche nach der Einführungswoche statt. Den Termin erfahren Sie über LSF bzw. unter »Termine«.',
        ));

        Faq::create(array(
            'area' => 'I',
            'subject' => 'Inhalte',
            'question' => 'Welche Inhalte hat die Veranstaltung?',
            'answer' => 'Die Gesamtveranstaltung gibt einen Einblick in zentrale Fragestellungen und Forschungsbereiche der Allgemeinen und Historischen Erziehungswissenschaft. Die Vorlesung besteht aus Einführungen in die Sozial-, Ideen- und Personengeschichte der Pädagogik sowie aus erziehungs- und bildungstheoretischen Themenblöcken. Für die Inhalte sind die jeweiligen Dozenten – Mitglieder des <a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/" target="_blank">Instituts für Allgemeine und Historische Erziehungswissenschaft</a> – verantwortlich.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausuraufbau',
            'question' => 'Wie ist die Klausur aufgebaut?',
            'answer' => 'Die Klausur besteht aus zwei gleichwertigen Teilen: Allgemeine/Historische Erziehungswissenschaft und Schulpädagogik. Der Teil der Allgemeinen/Historischen Erziehungswissenschaft setzt sich aus Single Choice- und Multiple Choice-Aufgaben zusammen.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausurbewertung',
            'question' => 'Wie wird die Klausur bewertet?',
            'answer' => 'Die Klausur wird benotet.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausurdauer',
            'question' => 'Wie lange dauert die Klausur?',
            'answer' => 'Insgesamt 90 Minuten.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausureinsicht',
            'question' => 'Kann ich meine Klausur einsehen?',
            'answer' => 'Die Einsicht in die eigene Klausur ist nach Bekanntgabe der Ergebnisse möglich. Bitte wenden Sie sich an die zuständigen Dozenten. Für den Klausurteil der Allgemeinen und Historischen Erziehungswissenschaft: <a href="http://www.ph-karlsruhe.de/institute/ph/ew/personen/timo-hoyer/" target="_blank">Apl. Prof. Dr. Timo Hoyer</a>.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausurergebnisse',
            'question' => 'Wann und wie erfahre ich die Ergebnisse der Klausur?',
            'answer' => 'Die Ergebnisse werden in der vorlesungsfreien Zeit mitgeteilt. Der genaue Zeitpunkt der Bekanntgabe steht nicht fest.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausurformalitäten',
            'question' => 'Wer ist für den formalen Ablauf, für rechtliche und technische Fragen zuständig?',
            'answer' => 'Formale und rechtliche Fragen zur Prüfung beantwortet das <a href="http://www.ph-karlsruhe.de/studium-lehre/studien-service-zentrum/pruefungsaemter/" target="_blank">Prüfungsamt</a>.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausurtermin',
            'question' => 'Kann ich die Klausur im Wintersemester und im Sommersemester schreiben?',
            'answer' => 'Die Klausur wird im ersten Studiensemester nach dem Besuch der M1-Veranstaltung in der Prüfungswoche abgelegt (meistens also im Wintersemester). Wer sie nicht bestanden hat, kann sie im darauffolgenden Semester wiederholen.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausurwiederholung',
            'question' => 'Was geschieht, wenn ich die Klausur nicht bestanden habe?',
            'answer' => 'Die Klausur (bestehend aus drei Teilen) kann im folgenden Semester einmal wiederholt werden. Im Sommersemester werden von den einzelnen Fachgebieten Repetitorien (Wiederholungsveranstaltungen) angeboten, die sinnvollerweise zu besuchen sind.
			<h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>
			<ol>
			<li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>
			<li>Die Akademische Vorprüfung wird in den Studienbereichen BW, 1. HF und dem 2. HF abgelegt.</li>
			<li>Wer alle in Absatz 2 genannten studienbegleitenden Modulprüfungen bestanden hat, hat die Akademische Vorprüfung bestanden. Die studienbegleitenden Modulprüfungen, die gemäß Absatz 2 die Akademische Vorprüfung bilden, können gemäß § 18 jeweils einmal wiederholt werden.</li>
			</ol>',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Klausurinhalt',
            'question' => 'Bezieht sich die Klausur nur auf die Inhalte der online-Lektionen?',
            'answer' => 'Die online-Lektionen und die Texte sind gleichwertig. Die Klausurfragen können sich auf beide Inhalte beziehen.',
        ));

        Faq::create(array(
            'area' => 'K',
            'subject' => 'Kontakt zu den Dozenten',
            'question' => 'Wie kann ich Kontakt zu den Dozenten aufnehmen?',
            'answer' => 'Die Dozenten haben wöchentliche Sprechstunden (ohne Voranmeldung zu besuchen), und sie sind über Email zu erreichen. Weitere Angaben finden Sie unter <a href="http://home.ph-karlsruhe.de/etpM/kontakt">Kontakt</a>.',
        ));

        Faq::create(array(
            'area' => 'M',
            'subject' => 'Mentoren',
            'question' => 'Wer und was sind Mentoren?',
            'answer' => 'Mentoren sind Studierende der PH Karlsruhe, die zusätzlich zu ihrem Lehramtsstudium das <a href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/mentoring/" target="_blank">Zertifikatsstudium Mentoring</a> absolvieren. Sie qualifizieren sich in der Gestaltung von Lehrveranstaltungen und wissenschaftlichen Arbeiten, sie erwerben Schlüsselqualifikationen des selbstorganisierten Studiums, und sie vertiefen sich in die inhaltlichen Angebote der Allgemeinen und Historischen Erziehungswissenschaft. Mit ihren Kompetenzen tragen sie im Mentoriat dazu bei, Studienanfänger/innen den Übergang von der Schule auf die Hochschule zu erleichtern, sie begleiten und unterstützen Erstsemesterstudierende bei der selbstständigen Aneignung der fachwissenschaftlichen Studieninhalte und sie beraten bei Fragen rund ums Studium. Mentoren sind Experten für den Einstieg in die akademische Lehr-Lern-Kultur, aber sie sind nicht verantwortlich für die Inhalte der Veranstaltung oder der Prüfung.',
        ));

        Faq::create(array(
            'area' => 'M',
            'subject' => 'Mentorenausbildung',
            'question' => 'Wie kann ich Mentor/in werden?',
            'answer' => 'Nach bestandener Prüfung können Sie sich jederzeit zum Zertifikatsstudium Mentoring anmelden. Alle Informationen finden Sie auf der Seite des <a href="http://www.ph-karlsruhe.de/institute/ph/ew/etpm/mentoring/" target="_blank">Zertifikatsstudium Mentoring</a>.',
        ));

        Faq::create(array(
            'area' => 'M',
            'subject' => 'Mentoriatswechsel',
            'question' => 'Darf ich meine Mentoriatsgruppe wechseln?',
            'answer' => 'Über LSF sind sie einer von Ihnen priorisierten Mentoriatsgruppe zugeteilt worden. Um die Organisation der Veranstaltung zu gewährleisten, sollte ein Wechsel unterbleiben. In gut begründeten Ausnahmefälle, sprechen sie den Wechsel bitte mit den jeweils davon betroffenen Mentoren ab. Deren Zustimmung ist Voraussetzung für den Wechsel.',
        ));

        Faq::create(array(
            'area' => 'N',
            'subject' => 'Notizfunktion',
            'question' => 'Was ist die Notizfunktion des Videoplayers?',
            'answer' => 'Mit Hilfe der Notizfunktion der Web-App können Sie ihr individuelles Skript für jede online-Lektion erstellen. Sobald Sie auf ein sog. »Fähnchen« (rote Punkte auf der Videotimeline) klicken können Sie zu diesem eine Notiz verfassen (max. 500 Zeichen). Diese Notiz wird verschlüsselt gespeichert. D. h., nur Sie haben Zugriff darauf. Es ist acuh problemlos möglich die Notiz im Nachhinein zu verändern. Dazu einfach erneut auf das entsprechende Fähnchen klicken. Über »Notizen herunterladen« können Sie sich alle Notizen als PDF herunterladen, um diese z. B. handschriflich zu bearbeiten.<br><br>
            Sie können Ihre Notizen auch semantisch auszeichnen. Das Eingabefeld interpretiert alle grudnlegenden HTML Tags:
            <dl>
                <dt>Fett</dt>
                <dd><code>&lt;b&gt;Ihr Text&lt;/b&gt;</code> wird zu: <b>Ihr Text</b></dd>
                <dt>Kursiv</dt>
                <dd><code>&lt;i&gt;Ihr Text&lt;/i&gt;</code> wird zu: <i>Ihr Text</i></dd>
                <dt>Unterstrichen</dt>
                <dd><code>&lt;u&gt;Ihr Text&lt;/u&gt;</code> wird zu: <u>Ihr Text</u></dd>
                <dt>Absatz</dt>
                <dd><code>&lt;br&gt;</code></dd>
            </dl>
            ',
        ));

        Faq::create(array(
            'area' => 'O',
            'subject' => 'Online-Lektionen Download',
            'question' => 'Darf ich die online-Lektionen auf meinem PC speichern oder sie anderen zur Verfügung stellen?',
            'answer' => 'Die online-Lektionen sind urheberrechtlich geschützt. Ihre Verwendung ist ausschließlich im Rahmen der Lehrveranstaltung gestattet. Der Download oder die Weitergabe sind untersagt. Siehe <a href="http://home.ph-karlsruhe.de/etpM/impressum#rechtshinweise" target="_blank">Rechtshinweise</a>.',
        ));

        Faq::create(array(
            'area' => 'O',
            'subject' => 'Online-Lektionen Probleme',
            'question' => 'An wen kann ich mich wenden, wenn ich mit der online Vorlesung ein technisches Problem habe?',
            'answer' => 'An Fabian Mundt. Nutzen Sie bitte das Formular unter <a href="http://home.ph-karlsruhe.de/etpM/kontakt">Kontakt</a>.',
        ));

        Faq::create(array(
            'area' => 'O',
            'subject' => 'Online-Lektionen Sichtbarkeit',
            'question' => 'Sind alle online-Lektionen sofort und ständig sichtbar?',
            'answer' => 'Die Lektionen werden nacheinander in festgelegten Abständen geöffnet und bleiben ab dann bis zur Klausur geöffnet. Danach besteht kein Zugang mehr.',
        ));

        Faq::create(array(
            'area' => 'P',
            'subject' => 'Passwortverlust',
            'question' => 'Was passiert, wenn ich mich nicht an mein Passwort erinnern kann?',
            'answer' => 'Bei Verlust des persönlichen Passwortes wenden Sie sich bitte an das ZIM. Die Web-App verwendet Ihre LSF-Zugangsdaten.',
        ));

        Faq::create(array(
            'area' => 'P',
            'subject' => 'Präsenszveranstaltungen',
            'question' => 'Was sind Präsenzveranstaltungen?',
            'answer' => 'Alle Informationen hierzu finden Sie auf dem <a href="http://home.ph-karlsruhe.de/etpM/dashboard">Dashboard</a> unter den »Allgemeinen Informationen«.',
        ));

        Faq::create(array(
            'area' => 'R',
            'subject' => 'Repetitorium',
            'question' => 'Was ist ein Repetitorium?',
            'answer' => 'Repetitorien sind Seminare, in denen im Sommersemester die Inhalte der Lehrveranstaltung wiederholt werden. Repetitorien sind in der Hauptsache für Studierende gedacht, die die Akademische Vorprüfung nicht bestanden haben und sich erneut darauf vorbereiten wollen.',
        ));

        Faq::create(array(
            'area' => 'S',
            'subject' => 'Stud.IP Materialien',
            'question' => 'Wie lade ich Materialien / Dateien auf Stud.IP hoch?',
            'answer' => 'Die Stud.IP Dokumentation liefert hierzu eine ausführliche Beschreibung: <a href="http://hilfe.studip.de/index.php/Basis/Dateien" target="_blank">Stud.IP Dokumentation > Dateiverwaltung</a>.',
        ));

        Faq::create(array(
            'area' => 'S',
            'subject' => 'Stud.IP Lerngruppe',
            'question' => 'Wie kann ich auf Stud.IP eine Lerngruppe erstellen?',
            'answer' => 'Die Stud.IP Dokumentation liefert hierzu eine ausführliche Beschreibung: <a href="http://hilfe.studip.de/index.php/Basis/Studiengruppen" target="_blank">Stud.IP Dokumentation > Studiengruppen</a>.',
        ));

        Faq::create(array(
            'area' => 'T',
            'subject' => 'Termine',
            'question' => 'Wie erfahre ich die Termine der Veranstaltung?',
            'answer' => 'Die Termine stehen in LSF, Stud.IP und sind auf dem <a href="http://home.ph-karlsruhe.de/etpM/dashboard" target="_blank">Dashboard</a> verfügbar.',
        ));

        Faq::create(array(
            'area' => 'T',
            'subject' => 'Textbearbeitung',
            'question' => 'Wie sollte ich die Texte und die online-Lektionen bearbeiten?',
            'answer' => '</p><ol>
			<li>Notieren Sie sich offene Fragen, Verständnisschwierigkeiten, Ungereimtheiten. Versuchen Sie zunächst eigenhändig, Unklarheiten zu beseitigen. Ungeklärt bleibende Fragen können in den Mentoriaten aufgeworfen werden.</li>
			<li>Notieren Sie sich Personennamen, von denen in den online-Lektionen und den Texten die Rede ist. Recherchieren Sie, wer sich hinter den Namen verbirgt.</li>
			<li>Zeichnen Sie den Argumentationsgang von online-Lektion und Text (am besten Absatz für Absatz) schriftlich nach.</li>
			<li>Fassen Sie in eigenen Sätzen Kernaussagen zusammen.</li>
			<li>Halten Sie inhaltliche Zusammenhänge, Übereinstimmungen und Abweichungen zwischen dem Text und den online-Lektionen fest.</li>
			</ol><p>',
        ));

        Faq::create(array(
            'area' => 'W',
            'subject' => 'Weiterführende Literatur',
            'question' => 'Welche Bedeutung haben die allgemeinen und weiterführenden Literaturhinweise?',
            'answer' => 'Die aufgeführte Literatur kann, wie die in den online-Lektionen eingeblendeten Buchtitel, zur Vertiefung der in der Vorlesung behandelten Themen herangezogen werden. Es sind Empfehlungen für das weitere Studium. Die Inhalte der Studien sind kein Gegenstand der Klausur.',
        ));
    }
}
