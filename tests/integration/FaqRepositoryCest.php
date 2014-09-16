<?php
use \IntegrationTester;

class FaqRepositoryCest
{
    protected $dummyFaq;

    /**
     * Bereitet die virtuelle Datenbank und virtuelle E-Mails vor
     *
     * Migriert alle Strukturen in eine virtuelle SQLite Datenbank und
     * setzt die E-Mail auf 'pretend' um sie in der Logfile zu verzeichnen.
     *
     */
    public function _before()
    {
      TestCommons::prepareLaravel();
      $this->dummyFaq = TestCommons::dummyFaq();
    }

    public function getFaqLetters(IntegrationTester $I)
    {

      /**
       * Beispieldatensatz generieren
       *
       */
      $this->dummyFaq['id'] = 1;
      $this->dummyFaq['area'] = 'A';
      $I->haveRecord('faqs', $this->dummyFaq);
      $this->dummyFaq['id'] = 2;
      $this->dummyFaq['area'] = 'V';
      $I->haveRecord('faqs', $this->dummyFaq);

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
    public function getAllFaqs(IntegrationTester $I)
    {

      /**
       * Beispieldatensatz generieren
       *
       */
      $this->dummyFaq['id'] = 1;
      $this->dummyFaq['area'] = 'Z';
      $I->haveRecord('faqs', $this->dummyFaq);
      $this->dummyFaq['id'] = 2;
      $this->dummyFaq['area'] = 'V';
      $I->haveRecord('faqs', $this->dummyFaq);
      $this->dummyFaq['id'] = 3;
      $this->dummyFaq['area'] = 'F';
      $I->haveRecord('faqs', $this->dummyFaq);
      $this->dummyFaq['id'] = 4;
      $this->dummyFaq['area'] = 'A';
      $I->haveRecord('faqs', $this->dummyFaq);

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

    /**
     * Testet die Abfrage in Abhängigkeit eines Buchstabens (area)
     *
     */
    public function getFaqsByLetter(IntegrationTester $I)
    {

      /**
       * Beispieldatensatz generieren
       *
       */
      $this->dummyFaq['id'] = 1;
      $this->dummyFaq['area'] = 'A';
      $I->haveRecord('faqs', $this->dummyFaq);
      $this->dummyFaq['id'] = 2;
      $this->dummyFaq['area'] = 'A';
      $I->haveRecord('faqs', $this->dummyFaq);
      $this->dummyFaq['id'] = 3;
      $this->dummyFaq['area'] = 'X';
      $I->haveRecord('faqs', $this->dummyFaq);
      $this->dummyFaq['id'] = 4;
      $this->dummyFaq['area'] = 'B';
      $I->haveRecord('faqs', $this->dummyFaq);

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