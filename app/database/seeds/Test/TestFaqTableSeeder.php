<?php

use Illuminate\Database\Seeder;
use Synthesise\Faq;

class TestFaqTableSeeder extends Seeder {

	public function run()
	{
		DB::table('faqs')->delete();

		Faq::create(array(
			'area' => 'A',
			'subject' => 'Anwesenheit',
			'question' => 'Besteht Anwesenheitspflicht in den Präsenzveranstaltungen?',
			'answer' => 'Es besteht keine Verpflichtung. Die regelmäßige Teilnahme wird dringend empfohlen.'
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
			</ol><p>'
		));

		Faq::create(array(
			'area' => 'W',
			'subject' => 'Weiterführende Literatur',
			'question' => 'Welche Bedeutung haben die allgemeinen und weiterführenden Literaturhinweise?',
			'answer' => 'Die aufgeführte Literatur kann, wie die in den online-Lektionen eingeblendeten Buchtitel, zur Vertiefung der in der Vorlesung behandelten Themen herangezogen werden. Es sind Empfehlungen für das weitere Studium. Die Inhalte der Studien sind kein Gegenstand der Klausur.'
		));


	}
}
