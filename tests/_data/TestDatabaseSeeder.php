<?php

use \FunctionalTester;

class TestDatabaseSeeder {
  /**
   * Ein fiktives Beispielvideo.
   *
   * @var     array
   */
  protected $videoAttributes;

  /**
   * Ein fiktiver Beispieltext .
   *
   * @var     array
   */
  protected $paperAttributes;

  /**
   * Eine fiktive Beispielnotiz.
   *
   * @var     array
   */
  protected $noteAttributes;

  /**
   * Ein fiktiver Beispielcuepoint.
   *
   * @var     array
   */
  protected $cuepointAttributes;

  /**
   * Ein fiktiver Beispielnutzer.
   *
   * @var     array
   */
  protected $userAttributes;

  /**
   * Eine fiktive Beispielnachricht.
   *
   * @var     array
   */
  protected $messageAttributes;

  /**
   * Ein fiktives Beispiel-FAQ.
   *
   * @var     array
   */
  protected $faqAttributes;

  /**
   * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor.
   *
   * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
   * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
   *
   */
  public function __construct()
  {
    $this->userAttributes = TestCommons::$userAttributes;
    $this->faqAttributes = TestCommons::$faqAttributes;
    $this->videoAttributes = TestCommons::$videoAttributes;
    $this->paperAttributes = TestCommons::$paperAttributes;
    $this->noteAttributes = TestCommons::$noteAttributes;
    $this->cuepointAttributes = TestCommons::$cuepointAttributes;
    $this->messageAttributes = TestCommons::$messageAttributes;
  }

  /**
   * Beispielcuepoints generieren.
   *
   * @param     FunctionalTester $I
   */
  public function seedCuepoints(FunctionalTester $I)
  {
    $this->cuepointAttributes['id'] = 1;
    $this->cuepointAttributes['cuepoint'] = '100';
    $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
    $this->cuepointAttributes['content'] = 'Fähnchen 1';
    $I->haveRecord('cuepoints', $this->cuepointAttributes);

    $this->cuepointAttributes['id'] = 2;
    $this->cuepointAttributes['cuepoint'] = '300';
    $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
    $this->cuepointAttributes['content'] = 'Fähnchen 2';
    $I->haveRecord('cuepoints', $this->cuepointAttributes);

    $this->cuepointAttributes['id'] = 3;
    $this->cuepointAttributes['cuepoint'] = '700';
    $this->cuepointAttributes['video_videoname'] = 'Sozialgeschichte 1';
    $this->cuepointAttributes['content'] = 'Fähnchen 3';
    $I->haveRecord('cuepoints', $this->cuepointAttributes);
  }

  /**
   * Beispiel-FAQs generieren.
   *
   * @param     FunctionalTester $I
   */
  public function seedFaqs(FunctionalTester $I)
  {
    $this->faqAttributes['id'] = 1;
    $this->faqAttributes['area'] = 'A';
    $this->faqAttributes['subject'] = 'Anwesenheit';
    $this->faqAttributes['question'] = 'Besteht Anwesenheitspflicht in den Präsenzveranstaltungen?';
    $this->faqAttributes['answer'] = 'Es besteht keine Verpflichtung. Die regelmäßige Teilnahme wird dringend empfohlen.';
    $I->haveRecord('faqs', $this->faqAttributes);

    $this->faqAttributes['id'] = 2;
    $this->faqAttributes['area'] = 'B';
    $this->faqAttributes['subject'] = 'Belegungspflicht';
    $this->faqAttributes['question'] = 'Ist die M1-Veranstaltung eine Pflichtveranstaltung?';
    $this->faqAttributes['answer'] = 'Das Besuch der Veranstaltung ist verpflichtend. Das Bestehen der Akademischen Vorprüfung ist Voraussetzung für das Weiterstudium an der PH Karlsruhe.</p>
    <h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>
    <ol>
    <li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>
    <li>Die Akademische Vorprüfung wird in den Studienbereichen BW, 1. HF und dem 2. HF abgelegt.</li>
    <li>Wer alle in Absatz 2 genannten studienbegleitenden Modulprüfungen bestanden hat, hat die Akademische Vorprüfung bestanden. Die studienbegleitenden Modulprüfungen, die gemäß Absatz 2 die Akademische Vorprüfung bilden, können gemäß § 18 jeweils einmal wiederholt werden.</li>
    </ol><p>';
    $I->haveRecord('faqs', $this->faqAttributes);

    $this->faqAttributes['id'] = 3;
    $this->faqAttributes['area'] = 'W';
    $this->faqAttributes['subject'] = 'Weiterführende Literatur';
    $this->faqAttributes['question'] = 'Welche Bedeutung haben die allgemeinen und weiterführenden Literaturhinweise?';
    $this->faqAttributes['answer'] = 'Die aufgeführte Literatur kann, wie die in den online-Lektionen eingeblendeten Buchtitel, zur Vertiefung der in der Vorlesung behandelten Themen herangezogen werden. Es sind Empfehlungen für das weitere Studium. Die Inhalte der Studien sind kein Gegenstand der Klausur.';
    $I->haveRecord('faqs', $this->faqAttributes);
  }

}
