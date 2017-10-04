<?php

namespace _data;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

//use FunctionalTester;

class TestDatabaseSeeder
{

    /**
     * Beispielcuepoints generieren.
     *
     * @param     FunctionalTester $I
     */
    public function seedCuepoints(\FunctionalTester $I)
    {

        $I->have('Synthesise\Cuepoint', [
          'id'          => 1,
          'cuepoint'    => 100,
          'sequence_id' => 1,
          'content'     => 'Fähnchen 1'
        ]);

        $I->have('Synthesise\Cuepoint', [
          'id'          => 2,
          'cuepoint'    => 300,
          'sequence_id' => 1,
          'content'     => 'Fähnchen 2'
        ]);

        $I->have('Synthesise\Cuepoint', [
          'id'          => 3,
          'cuepoint'    => 700,
          'sequence_id' => 1,
          'content'     => 'Fähnchen 3'
        ]);
    }

    /**
     * Beispiel-FAQs generieren.
     *
     * @param     FunctionalTester $I
     */
    public function seedFaqs(\FunctionalTester $I)
    {
        $I->have('Synthesise\Faq', [
          'id'           => 1,
          'area'         => 'A',
          'subject'      => 'Anwesenheit',
          'question'     => 'Besteht Anwesenheitspflicht in den Präsenzveranstaltungen?',
          'answer'       => 'Es besteht keine Verpflichtung. Die regelmäßige Teilnahme wird dringend empfohlen.',
          'seminar_name' => 'Sozialgeschichte 1'
        ]);

        $I->have('Synthesise\Faq', [
          'id'           => 2,
          'area'         => 'B',
          'subject'      => 'Belegungspflicht',
          'question'     => 'Ist die M1-Veranstaltung eine Pflichtveranstaltung?',
          'answer'       => 'Das Besuch der Veranstaltung ist verpflichtend. Das Bestehen der Akademischen Vorprüfung ist Voraussetzung für das Weiterstudium an der PH Karlsruhe.</p>
        <h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>
        <ol>
        <li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>
        <li>Die Akademische Vorprüfung wird in den Studienbereichen BW, 1. HF und dem 2. HF abgelegt.</li>
        <li>Wer alle in Absatz 2 genannten studienbegleitenden Modulprüfungen bestanden hat, hat die Akademische Vorprüfung bestanden. Die studienbegleitenden Modulprüfungen, die gemäß Absatz 2 die Akademische Vorprüfung bilden, können gemäß § 18 jeweils einmal wiederholt werden.</li>
        </ol><p>',
          'seminar_name' => 'Sozialgeschichte 1'
        ]);

        $I->have('Synthesise\Faq', [
          'id'           => 3,
          'area'         => 'W',
          'subject'      => 'Weiterführende Literatur',
          'question'     => 'Welche Bedeutung haben die allgemeinen und weiterführenden Literaturhinweise?',
          'answer'       => 'Die aufgeführte Literatur kann, wie die in den online-Lektionen eingeblendeten Buchtitel, zur Vertiefung der in der Vorlesung behandelten Themen herangezogen werden. Es sind Empfehlungen für das weitere Studium. Die Inhalte der Studien sind kein Gegenstand der Klausur.',
          'seminar_name' => 'Sozialgeschichte 1'
        ]);
    }

    /**
     * Beispiel-Messages generieren.
     *
     * @param     FunctionalTester $I
     */
    public function seedMessages(\FunctionalTester $I)
    {

        $I->have('Synthesise\Message', [
            'id'           => 1,
            'title'        => 'Titel',
            'content'      => 'Das ist eine normale Informationsnachricht.',
            'colour'       => 'green',
            'seminar_name' => 'Sozialgeschichte 1'
        ]);

        $I->have('Synthesise\Message', [
            'id'           => 2,
            'title'        => 'Titel',
            'content'      => 'Das ist eine warnende Informationsnachricht.',
            'colour'       => 'red',
            'seminar_name' => 'Sozialgeschichte 1'
        ]);

        $I->have('Synthesise\Message', [
            'id'           => 3,
            'title'        => 'Titel',
            'content'      => 'Das ist eine kritische Informationsnachricht.',
            'colour'       => 'purple',
            'seminar_name' => 'Sozialgeschichte 1'
        ]);
    }

  /**
   * Beispiel-Notes generieren.
   *
   * @param     FunctionalTester $I
   */
    public function seedNotes(\FunctionalTester $I)
    {
        $I->have('Synthesise\Note', [
            'id'           => 1,
            'note'         => Crypt::encrypt('Das ist die ERSTE Notiz.'),
            'user_id'      => 1,
            'cuepoint_id'  => 1,
            'lection_name' => 'Mittelalter',
            'seminar_name' => 'Sozialgeschichte 1'
        ]);

        $I->have('Synthesise\Note', [
            'id'           => 2,
            'note'         => Crypt::encrypt('Das ist die ZWEITE Notiz.'),
            'user_id'      => 1,
            'cuepoint_id'  => 2,
            'lection_name' => 'Mittelalter',
            'seminar_name' => 'Sozialgeschichte 1'
        ]);

        $I->have('Synthesise\Note', [
            'id'           => 3,
            'note'         => Crypt::encrypt('Das ist die DRITTE Notiz.'),
            'user_id'      => 2,
            'cuepoint_id'  => 1,
            'lection_name' => 'Mittelalter',
            'seminar_name' => 'Sozialgeschichte 1'
        ]);
    }

  /**
   * Beispiel-Papers generieren.
   *
   * @param     FunctionalTester $I
   */
    public function seedPapers(\FunctionalTester $I)
    {
        $I->have('Synthesise\Paper', [
            'id'           => 1,
            'name'         => 'Zeit-Raum Studium!',
            'author'       => 'Fabian Mundt',
            'path'         => 'path/to/text',
            'lection_name' => 'Mittelalter'
        ]);
    }

  /**
   * Beispiel-Lektionen generieren.
   *
   * @param     FunctionalTester $I
   */
    public function seedLections(\FunctionalTester $I)
    {
        $I->have('Synthesise\Lection', [
            'name'               => 'Mittelalter',
            'author'             => 'Timo Hoyer',
            'contact'            => 'hoyer@ph-karlsruhe.de',
            'authorized_editors' => 'hoyerka',
            'image_path'         => 'path/to/image',
        ]);
    }

  /**
   * Beispiel-User generieren.
   *
   * @param     FunctionalTester $I
   */
    public function seedUsers(\FunctionalTester $I)
    {
        $I->have('Synthesise\User', [
            'id'        => 1,
            'username'  => 'studentka',
            'password'  => Hash::make('Zelda'),
            'firstname' => 'Test',
            'lastname'  => 'Student',
            'role'      => 'Student',
            'email'     => 'test@test.de'
        ]);

        $I->have('Synthesise\User', [
            'id'        => 2,
            'username'  => 'teacherka',
            'password'  => Hash::make('Hyrule'),
            'firstname' => 'Test',
            'lastname'  => 'Teacher',
            'role'      => 'Teacher',
            'email'     => 'test@test.de'
        ]);

        $I->have('Synthesise\User', [
            'id'        => 3,
            'username'  => 'adminka',
            'password'  => Hash::make('Link'),
            'firstname' => 'Test',
            'lastname'  => 'Admin',
            'role'      => 'Admin',
            'email'     => 'test@test.de'
        ]);

    }
}
