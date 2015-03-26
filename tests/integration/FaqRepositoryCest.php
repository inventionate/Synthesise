<?php
use \IntegrationTester;

class FaqRepositoryCest {

    /**
     * Eine fiktive Beispielfaq.
     *
     * @var     array
     */
    protected $faqAttributes;

    /**
     * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
     *
     * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
     * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
     *
     */
    public function _before()
    {
      $this->faqAttributes = TestCommons::$faqAttributes;
    }

    public function testGetFaqLetters(IntegrationTester $I)
    {

      $I->wantTo('get FAQ letters');
      /**
       * Beispieldatensatz generieren
       *
       */
      $this->faqAttributes['id'] = 1;
      $this->faqAttributes['area'] = 'A';
      $I->haveRecord('faqs', $this->faqAttributes);
      $this->faqAttributes['id'] = 2;
      $this->faqAttributes['area'] = 'V';
      $I->haveRecord('faqs', $this->faqAttributes);

      /**
       * Abfrage durchführen
       *
       */
      $areas = FAQ::getLetters();

      /**
       * Testergebnis auswerten
       *
       */
      $I->AssertEquals('AV',$areas);

    }

    /**
     * Testet die Abfrage aller vorhandenen Einträge
     *
     */
    public function testGetAllFaqs(IntegrationTester $I)
    {

      $I->wantTo('get all flags');

      /**
       * Beispieldatensatz generieren
       *
       */
      $this->faqAttributes['id'] = 1;
      $this->faqAttributes['area'] = 'Z';
      $I->haveRecord('faqs', $this->faqAttributes);
      $this->faqAttributes['id'] = 2;
      $this->faqAttributes['area'] = 'V';
      $I->haveRecord('faqs', $this->faqAttributes);
      $this->faqAttributes['id'] = 3;
      $this->faqAttributes['area'] = 'F';
      $I->haveRecord('faqs', $this->faqAttributes);
      $this->faqAttributes['id'] = 4;
      $this->faqAttributes['area'] = 'A';
      $I->haveRecord('faqs', $this->faqAttributes);

      /**
       * Abfrage durchführen
       *
       */
      $entries = FAQ::getAll();

      /**
       * Testergebnis auswerten
       *
       */
      $I->AssertEquals(count($entries),4);

    }

    // /**
    //  * Testet die Abfrage in Abhängigkeit eines Buchstabens (area)
    //  *
    //  */
    public function testGetFaqsByLetter(IntegrationTester $I)
    {

      $I->wantTo('get flags by letter');

      /**
       * Beispieldatensatz generieren
       *
       */
      $this->faqAttributes['id'] = 1;
      $this->faqAttributes['area'] = 'A';
      $I->haveRecord('faqs', $this->faqAttributes);
      $this->faqAttributes['id'] = 2;
      $this->faqAttributes['area'] = 'A';
      $I->haveRecord('faqs', $this->faqAttributes);
      $this->faqAttributes['id'] = 3;
      $this->faqAttributes['area'] = 'X';
      $I->haveRecord('faqs', $this->faqAttributes);
      $this->faqAttributes['id'] = 4;
      $this->faqAttributes['area'] = 'B';
      $I->haveRecord('faqs', $this->faqAttributes);

      /**
       * Abfrage durchführen
       *
       */
      $entries = FAQ::getByLetter('A');

      /**
       * Testergebnis auswerten
       *
       */
      $I->AssertEquals(count($entries),2);

    }

}
