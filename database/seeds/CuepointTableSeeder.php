<?php

use Illuminate\Database\Seeder;
use Synthesise\Cuepoint;

class CuepointTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cuepoints')->delete();

        // NOTE ANTIKE -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '29',
            'sequence_id' => 1,
            'content' => 'Beginn pädagogischer Geschichte',
        ));

        Cuepoint::create(array(
            'cuepoint' => '66',
            'sequence_id' => 1,
            'content' => 'Periodisierung der Antike',
        ));

        Cuepoint::create(array(
            'cuepoint' => '100',
            'sequence_id' => 1,
            'content' => 'Entdeckte Kindheit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '129',
            'sequence_id' => 1,
            'content' => 'Kinder: unfertige Menschen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '158',
            'sequence_id' => 1,
            'content' => 'Haus, oíkos, familia',
        ));

        Cuepoint::create(array(
            'cuepoint' => '199',
            'sequence_id' => 1,
            'content' => 'Heirat und Schwangerschaft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '221',
            'sequence_id' => 1,
            'content' => 'paideía, educatio, formatio',
        ));

        Cuepoint::create(array(
            'cuepoint' => '294',
            'sequence_id' => 1,
            'content' => 'Fehlendes Erziehungsinteresse',
        ));

        Cuepoint::create(array(
            'cuepoint' => '316',
            'sequence_id' => 1,
            'content' => 'Umgang mit Kindern',
        ));

        Cuepoint::create(array(
            'cuepoint' => '368',
            'sequence_id' => 1,
            'content' => 'Disziplinierung und Prügel',
        ));

        Cuepoint::create(array(
            'cuepoint' => '409',
            'sequence_id' => 1,
            'content' => 'Kleinkinderpflege: Frauensache',
        ));

        Cuepoint::create(array(
            'cuepoint' => '446',
            'sequence_id' => 1,
            'content' => 'Der Vater erzieht',
        ));

        Cuepoint::create(array(
            'cuepoint' => '470',
            'sequence_id' => 1,
            'content' => 'paidagogós',
        ));

        Cuepoint::create(array(
            'cuepoint' => '514 ',
            'sequence_id' => 1,
            'content' => 'Elementare Knabenbildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '584',
            'sequence_id' => 1,
            'content' => 'Keine Institution Schule',
        ));

        Cuepoint::create(array(
            'cuepoint' => '630',
            'sequence_id' => 1,
            'content' => 'Organisation des Unterrichts',
        ));

        Cuepoint::create(array(
            'cuepoint' => '710',
            'sequence_id' => 1,
            'content' => 'Alphabetisierung ',
        ));

        Cuepoint::create(array(
            'cuepoint' => '733',
            'sequence_id' => 1,
            'content' => 'Disziplinen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '770',
            'sequence_id' => 1,
            'content' => 'Unterricht',
        ));

        Cuepoint::create(array(
            'cuepoint' => '802',
            'sequence_id' => 1,
            'content' => 'Bildungsangebote',
        ));

        Cuepoint::create(array(
            'cuepoint' => '861',
            'sequence_id' => 1,
            'content' => 'Anfänge des Studiums',
        ));

        Cuepoint::create(array(
            'cuepoint' => '922',
            'sequence_id' => 1,
            'content' => 'enkýklios paideía',
        ));

        Cuepoint::create(array(
            'cuepoint' => '956',
            'sequence_id' => 1,
            'content' => 'septem artes liberales',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1015',
            'sequence_id' => 1,
            'content' => 'Römische Schulen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1070',
            'sequence_id' => 1,
            'content' => 'Schule als Spiel und Muße?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1096',
            'sequence_id' => 1,
            'content' => 'Gehobener Unterricht',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1166',
            'sequence_id' => 1,
            'content' => 'Untergang der Antike',
        ));

        // NOTE MITTELALTER -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '30',
            'sequence_id' => 2,
            'content' => 'Völkerwanderung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '75',
            'sequence_id' => 2,
            'content' => 'Aufstieg des Christentums',
        ));

        Cuepoint::create(array(
            'cuepoint' => '125',
            'sequence_id' => 2,
            'content' => 'Hoch- und Spätmittelalter',
        ));

        Cuepoint::create(array(
            'cuepoint' => '200',
            'sequence_id' => 2,
            'content' => 'Kinder: Noch-nicht-Erwachsene',
        ));

        Cuepoint::create(array(
            'cuepoint' => '269',
            'sequence_id' => 1,
            'content' => 'Fürsorge und Misshandlungen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '314',
            'sequence_id' => 2,
            'content' => 'Achtlosigkeit und Gefahren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '359',
            'sequence_id' => 2,
            'content' => 'Frei von Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '411',
            'sequence_id' => 2,
            'content' => 'Verbessert die Erziehung!',
        ));

        Cuepoint::create(array(
            'cuepoint' => '444',
            'sequence_id' => 2,
            'content' => 'Altersstufen spielen geringe Rolle',
        ));

        Cuepoint::create(array(
            'cuepoint' => '491',
            'sequence_id' => 2,
            'content' => 'Einteilung der Altersgruppen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '529',
            'sequence_id' => 2,
            'content' => 'Kinder als Rechtspersonen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '586',
            'sequence_id' => 2,
            'content' => 'Christliche Vorstellungen vom Kind',
        ));

        Cuepoint::create(array(
            'cuepoint' => '638',
            'sequence_id' => 2,
            'content' => 'Ambivalentes Verhältnis zum Kind',
        ));

        Cuepoint::create(array(
            'cuepoint' => '676',
            'sequence_id' => 2,
            'content' => 'Stellenwert der Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '727',
            'sequence_id' => 2,
            'content' => 'Aufbau aus Trümmern',
        ));

        Cuepoint::create(array(
            'cuepoint' => '767',
            'sequence_id' => 2,
            'content' => 'Initiativen Karls des Großen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '807',
            'sequence_id' => 2,
            'content' => 'Schulpflicht',
        ));

        Cuepoint::create(array(
            'cuepoint' => '823',
            'sequence_id' => 2,
            'content' => 'Ablehnung des klassischen Curriculums',
        ));

        Cuepoint::create(array(
            'cuepoint' => '855',
            'sequence_id' => 2,
            'content' => 'Alphabetisierung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '890',
            'sequence_id' => 2,
            'content' => 'Ausbau von Schulen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '917',
            'sequence_id' => 2,
            'content' => 'Klosterschulen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '945',
            'sequence_id' => 2,
            'content' => 'Lehr-Lern-Gemeinschaften',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1028',
            'sequence_id' => 2,
            'content' => 'Unterricht ohne Klassenstufen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1058',
            'sequence_id' => 2,
            'content' => 'Dauer des Schul- und Universitätsbesuchs',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1111',
            'sequence_id' => 2,
            'content' => 'Schulunterricht',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1177',
            'sequence_id' => 2,
            'content' => 'Universitäten',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1243',
            'sequence_id' => 2,
            'content' => 'Universitätslehre',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1287',
            'sequence_id' => 2,
            'content' => 'Fächerspektrum an der Universität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1380',
            'sequence_id' => 2,
            'content' => 'Weltliche Schulen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1429',
            'sequence_id' => 2,
            'content' => 'Christentum in Bedrängnis',
        ));

        // NOTE FRÜHE NEUZEIT -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '30',
            'sequence_id' => 3,
            'content' => 'Eingrenzung der Epoche',
        ));

        Cuepoint::create(array(
            'cuepoint' => '122',
            'sequence_id' => 3,
            'content' => 'Verstaatlichung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '175',
            'sequence_id' => 3,
            'content' => 'Konfessionalisierng',
        ));

        Cuepoint::create(array(
            'cuepoint' => '227',
            'sequence_id' => 3,
            'content' => 'Säkularisierung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '276',
            'sequence_id' => 3,
            'content' => 'Patriarchat',
        ));

        Cuepoint::create(array(
            'cuepoint' => '342',
            'sequence_id' => 3,
            'content' => 'Veränderungen im Familienleben',
        ));

        Cuepoint::create(array(
            'cuepoint' => '375',
            'sequence_id' => 3,
            'content' => 'Familiengröße',
        ));

        Cuepoint::create(array(
            'cuepoint' => '416',
            'sequence_id' => 3,
            'content' => 'Privatisierung des Hauses',
        ));

        Cuepoint::create(array(
            'cuepoint' => '448',
            'sequence_id' => 3,
            'content' => 'Geburt',
        ));

        Cuepoint::create(array(
            'cuepoint' => '467',
            'sequence_id' => 3,
            'content' => 'Freiheit und Reglements',
        ));

        Cuepoint::create(array(
            'cuepoint' => '513',
            'sequence_id' => 3,
            'content' => 'Erziehungsgeräte',
        ));

        Cuepoint::create(array(
            'cuepoint' => '564',
            'sequence_id' => 3,
            'content' => 'Arbeit der Kinder',
        ));

        Cuepoint::create(array(
            'cuepoint' => '682',
            'sequence_id' => 3,
            'content' => 'Spiele und Spielzeug',
        ));

        Cuepoint::create(array(
            'cuepoint' => '728',
            'sequence_id' => 3,
            'content' => 'Erziehungsalltag',
        ));

        Cuepoint::create(array(
            'cuepoint' => '790',
            'sequence_id' => 3,
            'content' => 'Züchtigungen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '858',
            'sequence_id' => 3,
            'content' => 'Väter- und Müterrollen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '913',
            'sequence_id' => 3,
            'content' => 'Hofmeister und Gouvernanten',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1038',
            'sequence_id' => 3,
            'content' => 'Schule als Kampfschauplatz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1116',
            'sequence_id' => 3,
            'content' => 'Wer die Schule hat, hat die Zukunft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1170',
            'sequence_id' => 3,
            'content' => 'Alphabetisierung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1342',
            'sequence_id' => 3,
            'content' => 'Landesherrliche Schulinitiativen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1384',
            'sequence_id' => 3,
            'content' => 'Schul- oder Unterrichtspflicht',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1448',
            'sequence_id' => 3,
            'content' => 'Deutsche Schulen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1552',
            'sequence_id' => 3,
            'content' => 'Höhere Schulen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1617',
            'sequence_id' => 3,
            'content' => 'Veränderungen des Curriculums',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1668',
            'sequence_id' => 3,
            'content' => 'Neuer Schultyp: Realschule',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1769',
            'sequence_id' => 3,
            'content' => 'Mädchenbildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1860',
            'sequence_id' => 3,
            'content' => 'Katholische Gelehrtenschulen der Jesuiten',
        ));

        // NOTE JEAN-JACQUES ROUSSEAU -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '71',
            'sequence_id' => 4,
            'content' => 'Rousseau als Erzieher',
        ));

        Cuepoint::create(array(
            'cuepoint' => '217',
            'sequence_id' => 4,
            'content' => 'Möglichkeiten und Grenzen von Eduktion ',
        ));

        Cuepoint::create(array(
            'cuepoint' => '303',
            'sequence_id' => 4,
            'content' => 'Eduktion: Veränderte Wahrnehmung ermöglicht neue Erfahrung ',
        ));

        Cuepoint::create(array(
            'cuepoint' => '347',
            'sequence_id' => 4,
            'content' => 'Beriffsprobleme',
        ));

        Cuepoint::create(array(
            'cuepoint' => '361',
            'sequence_id' => 4,
            'content' => 'Kritisches Denken als Notwendigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '405',
            'sequence_id' => 4,
            'content' => 'Eduktion',
        ));

        Cuepoint::create(array(
            'cuepoint' => '429',
            'sequence_id' => 4,
            'content' => 'Der Vorrang allgemeiner Menschenbildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '499',
            'sequence_id' => 4,
            'content' => 'Das Problem des Bürgertums',
        ));

        Cuepoint::create(array(
            'cuepoint' => '587',
            'sequence_id' => 4,
            'content' => 'Das Plädoyer für eine Natur-gemäße Eduktion',
        ));

        Cuepoint::create(array(
            'cuepoint' => '633',
            'sequence_id' => 4,
            'content' => 'Rousseaus Vertrauensanthropologie',
        ));

        Cuepoint::create(array(
            'cuepoint' => '881',
            'sequence_id' => 4,
            'content' => 'Rousseaus weiter Erziehungsbegriff',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1005',
            'sequence_id' => 4,
            'content' => 'Die Natur als Erzieher',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1052',
            'sequence_id' => 4,
            'content' => 'Der Entwicklungsaspekt der Natur',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1147',
            'sequence_id' => 4,
            'content' => 'Die Bedeutung des Entwicklungsaspekts',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1194',
            'sequence_id' => 4,
            'content' => 'Die Dynamik des Rousseauschen Naturbegriffs',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1251',
            'sequence_id' => 4,
            'content' => 'Entwicklung - Freiheit - Vervollkommnungsfähigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1342',
            'sequence_id' => 4,
            'content' => 'Die Doppelseitigkeit der Vervollkommnungsfähigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1383',
            'sequence_id' => 4,
            'content' => 'Der »Mensch« als Erzieher',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1428',
            'sequence_id' => 4,
            'content' => 'Die »Dinge« als Erzieher',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1494',
            'sequence_id' => 4,
            'content' => 'Fazit zum Begriff einer Natur-gemäßen Eduktion',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1594',
            'sequence_id' => 4,
            'content' => 'Negative Eduktion vor positiver Eduktion',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1633',
            'sequence_id' => 4,
            'content' => 'Die Perspektive des Kindes einnehmen können',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1737',
            'sequence_id' => 4,
            'content' => 'Freiheit und Selbsttätigkeit des Kindes  ',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1868',
            'sequence_id' => 4,
            'content' => 'Erfolgserlebnisse: Wichtigkeit und Problematik',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1903',
            'sequence_id' => 4,
            'content' => 'Die Freiheit des Kindes als Gefühl der Freiheit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1949',
            'sequence_id' => 4,
            'content' => 'Die vorbereitete Lernumgebung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2001',
            'sequence_id' => 4,
            'content' => 'Verzicht auf Herrschaft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2045',
            'sequence_id' => 4,
            'content' => 'Das anspornend realistische Selbstbild des Kindes',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2129',
            'sequence_id' => 4,
            'content' => 'Plädoyer für Selbsttätigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2187',
            'sequence_id' => 4,
            'content' => 'Bildung der Urteilskraft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2225',
            'sequence_id' => 4,
            'content' => 'Positive Eduktion erst nach Entwicklung der Vernunft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2290',
            'sequence_id' => 4,
            'content' => 'Negative und positive Eduktion',
        ));

        // NOTE JOHANN HEINRICH PESTALOZZI -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '45',
            'sequence_id' => 5,
            'content' => 'Pestalozzis Geburtshaus',
        ));

        Cuepoint::create(array(
            'cuepoint' => '93',
            'sequence_id' => 5,
            'content' => 'Pestalozzi und seine Frau Anna beim Unterrichten',
        ));

        Cuepoint::create(array(
            'cuepoint' => '107',
            'sequence_id' => 5,
            'content' => 'Der Neuhoff bei Birr',
        ));

        Cuepoint::create(array(
            'cuepoint' => '225',
            'sequence_id' => 5,
            'content' => 'Die Abendstunde eines Einsiedlers (1780)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '247',
            'sequence_id' => 5,
            'content' => 'Über Gesetzgebung und Kindermord (1783)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '254',
            'sequence_id' => 5,
            'content' => 'Lienhard und Gertrud (1781–1787)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '262',
            'sequence_id' => 5,
            'content' => 'Meine Nachforschungen… (1797)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '354',
            'sequence_id' => 5,
            'content' => 'Grundlage der Bildung im Inneren unserer Natur',
        ));

        Cuepoint::create(array(
            'cuepoint' => '368',
            'sequence_id' => 5,
            'content' => 'Familie als ›Haushimmel‹',
        ));

        Cuepoint::create(array(
            'cuepoint' => '615',
            'sequence_id' => 5,
            'content' => '»Schule der Sitten und des Staates«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '558',
            'sequence_id' => 5,
            'content' => 'Problem des »Kindermords«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '634',
            'sequence_id' => 5,
            'content' => 'Karl V: »Carolina« (1532)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '773',
            'sequence_id' => 5,
            'content' => 'Die Rolle des Staates',
        ));

        Cuepoint::create(array(
            'cuepoint' => '801',
            'sequence_id' => 5,
            'content' => 'Die Notwendigkeit staatlichen Eingreifens',
        ));

        Cuepoint::create(array(
            'cuepoint' => '871',
            'sequence_id' => 5,
            'content' => 'Leidenschaften und Triebe der menschlichen Natur',
        ));

        Cuepoint::create(array(
            'cuepoint' => '959',
            'sequence_id' => 5,
            'content' => 'Das Dorf Bonnal: »vollendete Sündhaftigkeit«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '983',
            'sequence_id' => 5,
            'content' => 'Gertrud und Junker Arner',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1022',
            'sequence_id' => 5,
            'content' => 'Voght und armer Mann',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1036',
            'sequence_id' => 5,
            'content' => 'Der Pfarrer spricht mit dem Vogt',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1090',
            'sequence_id' => 5,
            'content' => '  Auswirkungen der Industrialisierung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1189',
            'sequence_id' => 5,
            'content' => 'Die Notwendigkeit der Schule',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1293',
            'sequence_id' => 5,
            'content' => 'Kindererziehung: »hart und unerbittlich«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1350',
            'sequence_id' => 5,
            'content' => 'Gleiche Erziehung zur Herstellung der ›Ordnung‹',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1503',
            'sequence_id' => 5,
            'content' => 'Überwindung des dualistischen Menschenbilds',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1535',
            'sequence_id' => 5,
            'content' => 'Die Abfolge der Zustände',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1517',
            'sequence_id' => 5,
            'content' => 'Die drei Zustände im Menschen vereint',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1649',
            'sequence_id' => 5,
            'content' => 'Weder naiv-harmonistisch, noch dualistisch ',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1699',
            'sequence_id' => 5,
            'content' => '»Das Werk meiner selbst«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1763',
            'sequence_id' => 5,
            'content' => '»ganzheitliche Bildung«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1817',
            'sequence_id' => 5,
            'content' => 'Die Trias: »Kopf, Herz und Hand«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1868',
            'sequence_id' => 5,
            'content' => 'Die sittliche Erziehung',
        ));

        // NOTE WILHELM VON HUMBOLDT -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '71',
            'sequence_id' => 6,
            'content' => 'Epoche des Neuhumanismus',
        ));

        Cuepoint::create(array(
            'cuepoint' => '363',
            'sequence_id' => 6,
            'content' => 'Studium und Beruf',
        ));

        Cuepoint::create(array(
            'cuepoint' => '411',
            'sequence_id' => 6,
            'content' => 'Alexander von Humboldt',
        ));

        Cuepoint::create(array(
            'cuepoint' => '455',
            'sequence_id' => 6,
            'content' => 'Humboldt-Universität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '497',
            'sequence_id' => 6,
            'content' => '»Theorie der Bildung des Menschen« (~1793)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '520',
            'sequence_id' => 6,
            'content' => '»Ideen zu einem Versuch, die Grenzen
		der Wirksamkeit des Staates zu bestimmen« (1792)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '564',
            'sequence_id' => 6,
            'content' => '»Über Religion« (1798)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '584',
            'sequence_id' => 6,
            'content' => '»Theorie der Bildung des Menschen«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '739',
            'sequence_id' => 6,
            'content' => 'Die Schule',
        ));

        Cuepoint::create(array(
            'cuepoint' => '778',
            'sequence_id' => 6,
            'content' => 'Struktur des Bildungsvorgangs',
        ));

        Cuepoint::create(array(
            'cuepoint' => '897',
            'sequence_id' => 6,
            'content' => 'Studium als ›Bildungsaufgabe‹',
        ));

        Cuepoint::create(array(
            'cuepoint' => '988',
            'sequence_id' => 6,
            'content' => 'Humboldts Schulpläne',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1057',
            'sequence_id' => 6,
            'content' => 'horizontale vs. vertikale Dreistufigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1131',
            'sequence_id' => 6,
            'content' => 'möglichst langer, allgemeinbildender Schulweg',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1163',
            'sequence_id' => 6,
            'content' => '»allseitige Kräftebildung«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1362',
            'sequence_id' => 6,
            'content' => 'Souveränität der Studierenden',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1390',
            'sequence_id' => 6,
            'content' => '»Wissen-schaffen«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1446',
            'sequence_id' => 6,
            'content' => 'Bedeutungsänderung des Bildungsbegriffs',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1475',
            'sequence_id' => 6,
            'content' => 'Einfluss der OECD ',
        ));

        // NOTE ERZIEHUNG UND UNTERRICHT -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '30',
            'sequence_id' => 7,
            'content' => 'Erziehung ⇔ Unterricht',
        ));

        Cuepoint::create(array(
            'cuepoint' => '84',
            'sequence_id' => 7,
            'content' => 'Lehreralltag',
        ));

        Cuepoint::create(array(
            'cuepoint' => '212',
            'sequence_id' => 7,
            'content' => 'Prange: Pädagogisches Handeln',
        ));

        Cuepoint::create(array(
            'cuepoint' => '337',
            'sequence_id' => 7,
            'content' => 'Lernen?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '821',
            'sequence_id' => 7,
            'content' => 'Historische Verortungen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1290',
            'sequence_id' => 7,
            'content' => 'Unterricht und Erziehung als Ordnungshilfe',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1554',
            'sequence_id' => 7,
            'content' => 'Erziehender Unterricht',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1694',
            'sequence_id' => 7,
            'content' => 'Lernen: Vertiefung und Besinnung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1743',
            'sequence_id' => 7,
            'content' => 'Vertiefung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1766',
            'sequence_id' => 7,
            'content' => 'Besinnung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1822',
            'sequence_id' => 7,
            'content' => 'Lernprozesse: geistige Tätigkeiten',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1888',
            'sequence_id' => 7,
            'content' => 'Vielseitigkeit des Interesses',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1928',
            'sequence_id' => 7,
            'content' => 'Zusammenhänge herstellen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1971',
            'sequence_id' => 7,
            'content' => 'Charakterstärke der Sittlichkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2143',
            'sequence_id' => 7,
            'content' => '»ästhetische Notwendigkeit«',
        ));

        // NOTE HETEROGENITÄT -------------------------------------------------

       Cuepoint::create(array(
            'cuepoint' => '47',
            'sequence_id' => 8,
            'content' => 'Facetten von Gleichheit und Verschiedenheit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '148',
            'sequence_id' => 8,
            'content' => 'Der Kontext einer Pädagogik der Vielfalt',
        ));

        Cuepoint::create(array(
            'cuepoint' => '211',
            'sequence_id' => 8,
            'content' => 'Verschiedenheit als pädagogische Herausforderung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '535',
            'sequence_id' => 8,
            'content' => 'Heterogenität in der Schule',
        ));

        Cuepoint::create(array(
            'cuepoint' => '958',
            'sequence_id' => 8,
            'content' => 'Konstitutive Prinzipien pädagogischen Handelns',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1196',
            'sequence_id' => 8,
            'content' => 'Didaktische Überleungen im Kontext von Heterogenität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1265',
            'sequence_id' => 8,
            'content' => 'Eine »Inklusive Didaktik«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1584',
            'sequence_id' => 8,
            'content' => 'Strukturelle Überlegungen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1655',
            'sequence_id' => 8,
            'content' => 'Inklusion',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1870',
            'sequence_id' => 8,
            'content' => 'Inklusives Schulsystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1954',
            'sequence_id' => 8,
            'content' => 'Gemeinschaftsschule',
        ));

        // NOTE WOZU IST DIE BILDUNG DA? -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '30',
            'sequence_id' => 9,
            'content' => 'Schlüsselbegriff der Pädagogik',
        ));

        Cuepoint::create(array(
            'cuepoint' => '38',
            'sequence_id' => 9,
            'content' => 'Ein Chamäleon unter den Begriffen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '48',
            'sequence_id' => 9,
            'content' => 'Ringvorlesung 2010',
        ));

        Cuepoint::create(array(
            'cuepoint' => '86',
            'sequence_id' => 9,
            'content' => 'Doppeldeutigkeit des Begriffs',
        ));

        Cuepoint::create(array(
            'cuepoint' => '129',
            'sequence_id' => 9,
            'content' => 'Zeitkern der Bildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '200',
            'sequence_id' => 9,
            'content' => 'Objektive und subjektive Bildungszeiten',
        ));

        Cuepoint::create(array(
            'cuepoint' => '210',
            'sequence_id' => 9,
            'content' => 'Kein allgemeines Zeitmaß der Bildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '235',
            'sequence_id' => 9,
            'content' => 'Bildung im Raum',
        ));

        Cuepoint::create(array(
            'cuepoint' => '252',
            'sequence_id' => 9,
            'content' => 'Schularchitektur',
        ));

        Cuepoint::create(array(
            'cuepoint' => '326',
            'sequence_id' => 9,
            'content' => 'Komplexität von Bildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '365',
            'sequence_id' => 9,
            'content' => 'Grenzen der Vorhersagbarkeit und Steuerbarkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '412',
            'sequence_id' => 9,
            'content' => 'Erziehung – intentional',
        ));

        Cuepoint::create(array(
            'cuepoint' => '443',
            'sequence_id' => 9,
            'content' => 'Man wird erzogen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '504',
            'sequence_id' => 9,
            'content' => 'Man bildet sich selbst',
        ));

        Cuepoint::create(array(
            'cuepoint' => '537',
            'sequence_id' => 9,
            'content' => 'Zur Geschichte der Aus- und Fortbildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '560',
            'sequence_id' => 9,
            'content' => 'Aus- und Fortbildung als Teilbereich der Bildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '632',
            'sequence_id' => 9,
            'content' => 'Bildungswert von Arbeit und Beruf',
        ));

        Cuepoint::create(array(
            'cuepoint' => '710',
            'sequence_id' => 9,
            'content' => 'Berufsausbildung als vollwertige Bildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '771',
            'sequence_id' => 9,
            'content' => 'Bildung ohne Zweck und Nutzen?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '810',
            'sequence_id' => 9,
            'content' => 'Neuhumanistische Bildungsidee',
        ));

        Cuepoint::create(array(
            'cuepoint' => '869',
            'sequence_id' => 9,
            'content' => 'Gegen gesellschaftliche Instrumentalisierung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '909',
            'sequence_id' => 9,
            'content' => 'Bildung im Interessenstreit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '933',
            'sequence_id' => 9,
            'content' => 'Verantwortung der Bildungs-Politik',
        ));

        Cuepoint::create(array(
            'cuepoint' => '969',
            'sequence_id' => 9,
            'content' => 'Eine Art Präambel',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1024',
            'sequence_id' => 9,
            'content' => 'Glück als Bildungskategorie',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1054',
            'sequence_id' => 9,
            'content' => 'Glück eines gelingenden Lebens',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1075',
            'sequence_id' => 9,
            'content' => 'Formale Voraussetzungen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1104',
            'sequence_id' => 9,
            'content' => 'Pädagogische Aufgaben',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1142',
            'sequence_id' => 9,
            'content' => 'Gerechtigkeit setzt Grenzen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1209',
            'sequence_id' => 9,
            'content' => 'Gerechtigkeitsbildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1242',
            'sequence_id' => 9,
            'content' => 'Glück der Bildung',
        ));

        // NOTE BILDUNG UND GLÜCK -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '56',
            'sequence_id' => 10,
            'content' => 'Inhalte des Glücks sind individuell',
        ));

        Cuepoint::create(array(
            'cuepoint' => '97',
            'sequence_id' => 10,
            'content' => 'Zwei Bedeutungen, ein Wort',
        ));

        Cuepoint::create(array(
            'cuepoint' => '149',
            'sequence_id' => 10,
            'content' => 'Glück als Strebens- und Lebensziel',
        ));

        Cuepoint::create(array(
            'cuepoint' => '171',
            'sequence_id' => 10,
            'content' => 'Glück als Erfüllung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '218',
            'sequence_id' => 10,
            'content' => 'Flow',
        ));

        Cuepoint::create(array(
            'cuepoint' => '315',
            'sequence_id' => 10,
            'content' => 'Negatives, episodisches Glück',
        ));

        Cuepoint::create(array(
            'cuepoint' => '373',
            'sequence_id' => 10,
            'content' => 'Flow: Lust oder Last',
        ));

        Cuepoint::create(array(
            'cuepoint' => '394',
            'sequence_id' => 10,
            'content' => 'Positives Glück',
        ));

        Cuepoint::create(array(
            'cuepoint' => '435',
            'sequence_id' => 10,
            'content' => 'Liebes-Glück',
        ));

        Cuepoint::create(array(
            'cuepoint' => '490',
            'sequence_id' => 10,
            'content' => 'Glück ist temporär',
        ));

        Cuepoint::create(array(
            'cuepoint' => '517',
            'sequence_id' => 10,
            'content' => 'Glück: Maßstab des Humanen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '564',
            'sequence_id' => 10,
            'content' => 'Subjektive Bedingungen des Glücks',
        ));

        Cuepoint::create(array(
            'cuepoint' => '590',
            'sequence_id' => 10,
            'content' => 'Objektive Bedingungen des Glücks',
        ));

        Cuepoint::create(array(
            'cuepoint' => '620',
            'sequence_id' => 10,
            'content' => 'Übergreifendes Glück',
        ));

        Cuepoint::create(array(
            'cuepoint' => '688',
            'sequence_id' => 10,
            'content' => 'Wunschlos glücklich',
        ));

        Cuepoint::create(array(
            'cuepoint' => '737',
            'sequence_id' => 10,
            'content' => 'Glück als Ziel von Bildung?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '818',
            'sequence_id' => 10,
            'content' => 'Glück als Voraussetzung von Bildung?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '873',
            'sequence_id' => 10,
            'content' => 'Glück im Lernen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '930',
            'sequence_id' => 10,
            'content' => 'Bildung als Voraussetzung von Glück?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '968',
            'sequence_id' => 10,
            'content' => 'Bildung: Erweiterung von Glücksmöglichkeiten',
        ));

        Cuepoint::create(array(
            'cuepoint' => '980',
            'sequence_id' => 10,
            'content' => 'Negative Bildungsprozesse',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1036',
            'sequence_id' => 10,
            'content' => 'Positive Bildungsprozesse',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1080',
            'sequence_id' => 10,
            'content' => 'Orte der Bildung – Orte des Glücks',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1114',
            'sequence_id' => 10,
            'content' => 'Selbsterkenntnis',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1158',
            'sequence_id' => 10,
            'content' => 'Glück ist nicht lernbar!',
        ));

        // NOTE BILDUNG UND GERECHTIGKEIT -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '30',
            'sequence_id' => 11,
            'content' => 'Keine Demokratie ohne Gerechtigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '58',
            'sequence_id' => 11,
            'content' => 'Drei Formen des Gerechtigkeitssinns',
        ));

        Cuepoint::create(array(
            'cuepoint' => '94',
            'sequence_id' => 11,
            'content' => 'Personale und institutionelle Gerechtigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '180',
            'sequence_id' => 11,
            'content' => 'Elemente der Gerechtigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '197',
            'sequence_id' => 11,
            'content' => 'Gleichheit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '334',
            'sequence_id' => 11,
            'content' => 'Neutralität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '360',
            'sequence_id' => 11,
            'content' => 'Befolgung von Gesetzen und Wechselseitigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '405',
            'sequence_id' => 11,
            'content' => 'Egalität, Neutralität, Legalität und Reziprozität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '456',
            'sequence_id' => 11,
            'content' => 'Gerechtigkeit in der Pädagogik',
        ));

        Cuepoint::create(array(
            'cuepoint' => '556',
            'sequence_id' => 11,
            'content' => 'Gerechte Grundstruktur der Gesellschaft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '597',
            'sequence_id' => 11,
            'content' => 'Die allgemeine Gerechtigkeitsvorstellung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '633',
            'sequence_id' => 11,
            'content' => 'Die speziellen Gerechtigkeitsgrundsätze',
        ));

        Cuepoint::create(array(
            'cuepoint' => '670',
            'sequence_id' => 11,
            'content' => 'Pädagogische Konsequenz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '723',
            'sequence_id' => 11,
            'content' => 'Begründung der Grundsätze',
        ));

        Cuepoint::create(array(
            'cuepoint' => '800',
            'sequence_id' => 11,
            'content' => 'Bildung des Gerechtigkeitssinn',
        ));

        Cuepoint::create(array(
            'cuepoint' => '863',
            'sequence_id' => 11,
            'content' => 'Moralstufenmodell',
        ));

        Cuepoint::create(array(
            'cuepoint' => '906',
            'sequence_id' => 11,
            'content' => 'Erstes Niveau: Vorkonventionell',
        ));

        Cuepoint::create(array(
            'cuepoint' => '975',
            'sequence_id' => 11,
            'content' => 'Zweites Niveau: Konventionell',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1018',
            'sequence_id' => 11,
            'content' => 'Drittes Niveau: Postkonventionell',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1083',
            'sequence_id' => 11,
            'content' => 'Stufe 6 ein Postulat
		',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1111',
            'sequence_id' => 11,
            'content' => 'Erziehung zur Gerechtigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1142',
            'sequence_id' => 11,
            'content' => 'Stimulation durch Diskussion statt Indoktrination',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1210',
            'sequence_id' => 11,
            'content' => 'Gerechte Schulgemeinschaft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1265',
            'sequence_id' => 11,
            'content' => 'Kritik an Kohlberg
		',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1330',
            'sequence_id' => 11,
            'content' => 'Gerechtigkeitsbildung durch aktive Partizipation',
        ));


        // NOTE WISSENSCHAFT -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '38',
            'sequence_id' => 12,
            'content' => 'Wissenschaft in empirischer Ausprägung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '70',
            'sequence_id' => 12,
            'content' => 'PISA-Schock',
        ));

        Cuepoint::create(array(
            'cuepoint' => '100',
            'sequence_id' => 12,
            'content' => 'Entdeckte Kindheit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '96',
            'sequence_id' => 12,
            'content' => 'Wissenschaft und Praxis',
        ));

        Cuepoint::create(array(
            'cuepoint' => '149',
            'sequence_id' => 12,
            'content' => 'Gesellschaft und Wissenschaft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '244',
            'sequence_id' => 12,
            'content' => 'Das Wechselspiel von Gesellschaft und Wissenschaft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '270',
            'sequence_id' => 12,
            'content' => 'Der wissenschaftliche Blick',
        ));

        Cuepoint::create(array(
            'cuepoint' => '469',
            'sequence_id' => 12,
            'content' => 'Ziel von Wissenschaft',
        ));

        Cuepoint::create(array(
            'cuepoint' => '496',
            'sequence_id' => 12,
            'content' => 'Analytische und normative wissenschaftliche Zugänge',
        ));

        Cuepoint::create(array(
            'cuepoint' => '517',
            'sequence_id' => 12,
            'content' => 'Der analytisch-beschreibende Zugang',
        ));

        Cuepoint::create(array(
            'cuepoint' => '541',
            'sequence_id' => 12,
            'content' => 'Der normativ-programmatische Zugang',
        ));

        Cuepoint::create(array(
            'cuepoint' => '619',
            'sequence_id' => 12,
            'content' => 'Kritik an analytischen Zugängen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '687',
            'sequence_id' => 12,
            'content' => 'Kritik an normativen Zugängen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '780 ',
            'sequence_id' => 12,
            'content' => 'Theorietyp 1 und 2 in Beziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '810',
            'sequence_id' => 12,
            'content' => 'Beispiel: Erziehung im Dritten Reich',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1022',
            'sequence_id' => 12,
            'content' => 'Pädagogische Grundlagentheorie: Erziehung identifizieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1044',
            'sequence_id' => 12,
            'content' => 'Praktische Pädagogik: Erziehung bewerten ',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1085',
            'sequence_id' => 12,
            'content' => 'Systematische Kombination beider Theorietypen notwendig',
        ));

        // NOTE ERZIEHUNG -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '44',
            'sequence_id' => 13,
            'content' => 'Erziehung als anthropologisches Grundphänomen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '71',
            'sequence_id' => 13,
            'content' => 'Wolfgang Sünkels »Allgemeine Theorie der Erziehung«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '134',
            'sequence_id' => 13,
            'content' => '»Wolfskinder«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '155',
            'sequence_id' => 13,
            'content' => 'Hospitalismusforschung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '212',
            'sequence_id' => 13,
            'content' => 'Zum Satz der Kulturalität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '247',
            'sequence_id' => 13,
            'content' => 'Kulturalität jenseits von Menschen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '317',
            'sequence_id' => 13,
            'content' => 'Unterschiede zwischen Menschen und Tieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '354',
            'sequence_id' => 13,
            'content' => 'Zum Satz der Mortalität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '394',
            'sequence_id' => 13,
            'content' => 'das nichtgenetische Erbe',
        ));

        Cuepoint::create(array(
            'cuepoint' => '438',
            'sequence_id' => 13,
            'content' => 'Disposition zu einer Tätigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '526',
            'sequence_id' => 13,
            'content' => 'Kritische Auseinandersetzung mit Sünkels Theorie der Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '567',
            'sequence_id' => 13,
            'content' => 'Filmausschnitt »Benjamin Button«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '763',
            'sequence_id' => 13,
            'content' => 'Interpretation »Benjamin Button«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '832',
            'sequence_id' => 13,
            'content' => 'Von der Notwendigkeit der Ergänzung des Satzes der Natalität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '889',
            'sequence_id' => 13,
            'content' => 'Zum Satz der Natalität',
        ));

        Cuepoint::create(array(
            'cuepoint' => '961',
            'sequence_id' => 13,
            'content' => 'Natalität – zwei Lehrstücke biologischer Anthropologie',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1009',
            'sequence_id' => 13,
            'content' => 'Jenseits von »Nesthockern« und »Nestflüchtern«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1071',
            'sequence_id' => 13,
            'content' => 'Menschliche Säuglinge als »Traglinge«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1299',
            'sequence_id' => 13,
            'content' => 'Konsequenzen aus der Bestimmung des Säuglings als »Tragling«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1519',
            'sequence_id' => 13,
            'content' => 'Relevanz der evolutionsbiologischen Ausführungen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1575',
            'sequence_id' => 13,
'content' => 'Satz der Natalität und die Sorgestruktur von Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1671',
            'sequence_id' => 13,
            'content' => 'Natalität als Moment einer lebensalterssensiblen Anthropologie',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1732',
            'sequence_id' => 13,
            'content' => 'Enges vs. weites Verständnis von Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1759',
            'sequence_id' => 13,
            'content' => 'Erziehungsbegriff begrenzen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1786',
            'sequence_id' => 13,
            'content' => 'Grundriss einer operativen Pädagogik',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1177',
            'sequence_id' => 13,
            'content' => 'Universitäten',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1836',
            'sequence_id' => 13,
            'content' => 'Zur Zeigestruktur von Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1863',
            'sequence_id' => 13,
            'content' => 'Vermittlung ohne Aneignung?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1881',
            'sequence_id' => 13,
            'content' => 'Aneignung ohne Vermittlung?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1902',
            'sequence_id' => 13,
            'content' => 'Zur funktionellen Gleichwertigkeit der Aktivitäten Aneignung und Vermittlung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1949',
            'sequence_id' => 13,
            'content' => 'Zur triangulären Struktur von Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1991',
            'sequence_id' => 13,
            'content' => 'Intentionale Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2003',
            'sequence_id' => 13,
            'content' => 'Funktionelle Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2043',
            'sequence_id' => 1,
            'content' => 'Die Zeigestruktur von Erziehung nach Klaus Prange',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2094',
            'sequence_id' => 13,
            'content' => 'Zeiträume der Erziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2126',
            'sequence_id' => 13,
            'content' => 'Erziehung in der Gestalt von Lehre',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2153',
            'sequence_id' => 13,
            'content' => 'Erziehung in der Gestalt von Gelegenheitserziehung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2177',
            'sequence_id' => 13,
            'content' => 'Erziehung in der Gestalt von direktivem Appellieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2188',
            'sequence_id' => 13,
            'content' => 'Erziehung in der Gestalt von Evokation',
        ));

        // NOTE TOLERANZ

        Cuepoint::create(array(
            'cuepoint' => '26',
            'sequence_id' => 14,
            'content' => 'Eine relativ junge Zielbestimmung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '87',
            'sequence_id' => 14,
            'content' => 'Eine umstrittene Tugend',
        ));

        Cuepoint::create(array(
            'cuepoint' => '142',
            'sequence_id' => 14,
            'content' => 'Toleranz als Bestandteil eines Strebens nach Gerechtigkeit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '180',
            'sequence_id' => 14,
            'content' => 'Gegner von Toleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '223',
            'sequence_id' => 14,
            'content' => 'Zum Begriff der Toleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '261',
            'sequence_id' => 14,
            'content' => 'Das paradoxe Grundschema von Toleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '293',
            'sequence_id' => 14,
            'content' => 'Beispiele für Ablehnung und Toleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '379',
            'sequence_id' => 14,
            'content' => 'Intolerante Personen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '514',
            'sequence_id' => 14,
            'content' => 'Fazit Intoleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '609',
            'sequence_id' => 14,
            'content' => 'Vier Konzeptionen von Toleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '667',
            'sequence_id' => 14,
            'content' => 'Lisette und der Kinderstreit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '899',
            'sequence_id' => 14,
            'content' => 'Erlaubniskonzeption',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1030',
            'sequence_id' => 14,
            'content' => 'Koexistenzkonzeption',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1173',
            'sequence_id' => 14,
            'content' => 'Konsequenzen der Koexistenzkonzeption',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1257',
            'sequence_id' => 14,
            'content' => 'Wertschätzungskonzeption',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1352',
            'sequence_id' => 14,
            'content' => 'Respektkonzeption',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1421',
            'sequence_id' => 14,
            'content' => 'Gerechtigkeit und Toleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1488',
            'sequence_id' => 14,
            'content' => 'Fazit Respektkonzeption',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1692',
            'sequence_id' => 14,
            'content' => 'Glück und Toleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1893',
            'sequence_id' => 14,
            'content' => 'No to Racism',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1976',
            'sequence_id' => 14,
            'content' => 'Pädagogisches Fazit',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2028',
            'sequence_id' => 14,
            'content' => 'Erste Schritte auf dem Weg zur Toleranz',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2090',
            'sequence_id' => 14,
            'content' => 'Kindlicher Egozentrismus',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2314',
            'sequence_id' => 14,
            'content' => 'Partizipatorischer Erziehungsstil',
        ));

        Cuepoint::create(array(
            'cuepoint' => '2462',
            'sequence_id' => 14,
            'content' => 'Umgang mit Jugendlichen',
        ));

        // NOTE ZAHLDARSTELLUNGEN ----------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '22',
            'sequence_id' => 15,
            'content' => 'Was sind Zahlen?',
        ));

        Cuepoint::create(array(
            'cuepoint' => '71',
            'sequence_id' => 15,
            'content' => 'Peano-Axiome',
        ));

        Cuepoint::create(array(
            'cuepoint' => '136',
            'sequence_id' => 15,
            'content' => 'japanisches Zählen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '213',
            'sequence_id' => 15,
            'content' => 'Das Bündeln',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1',
            'sequence_id' => 16,
            'content' => 'Das römische Zahlzeichensystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '100',
            'sequence_id' => 16,
            'content' => 'Die römischen Zahlen, ein Additionssystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '152',
            'sequence_id' => 16,
            'content' => 'Regeln für das römische Zahlensystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '188',
            'sequence_id' => 16,
            'content' => 'Übungen zu römischen Zahlen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '243',
            'sequence_id' => 16,
            'content' => 'Urpsrung der subtraktiven Schreibweise',
        ));

        Cuepoint::create(array(
            'cuepoint' => '326',
            'sequence_id' => 16,
            'content' => 'Ausnahmen der subtraktiven Schreibweise',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1',
            'sequence_id' => 17,
            'content' => 'systematisches Bündeln',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1',
            'sequence_id' => 18,
            'content' => 'Vom Bündeln zur ',
        ));

        Cuepoint::create(array(
            'cuepoint' => '10',
            'sequence_id' => 18,
            'content' => '1. Repräsentationsebene: enaktive Repräsentation',
        ));

        Cuepoint::create(array(
            'cuepoint' => '101',
            'sequence_id' => 18,
            'content' => 'Die Bedeutung der Null',
        ));

        Cuepoint::create(array(
            'cuepoint' => '161',
            'sequence_id' => 18,
            'content' => 'Stufenzahlen & Ziffern',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1',
            'sequence_id' => 19,
            'content' => 'g-adische Systeme',
        ));

        Cuepoint::create(array(
            'cuepoint' => '103',
            'sequence_id' => 19,
            'content' => 'Zahlbeispiele',
        ));

        Cuepoint::create(array(
            'cuepoint' => '171',
            'sequence_id' => 19,
            'content' => 'Zahlbezeichnungen in anderen Systemen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '210',
            'sequence_id' => 19,
            'content' => 'Satz über Stufenzahlen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '300',
            'sequence_id' => 19,
            'content' => '1. Beweis des Satzes über Stufenzahlen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '364',
            'sequence_id' => 19,
            'content' => '2. Beweis des Satzes über Stufenzahlen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '1',
            'sequence_id' => 20,
            'content' => 'Größenvergleich im Stellenwertsystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '30',
            'sequence_id' => 20,
            'content' => 'Die Eindeutigkeit der Stellenwertdarstellung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '77',
            'sequence_id' => 20,
            'content' => 'Die ersten n Potenzen einer Zahl g',
        ));

        // NOTE ADDITION UND SUBTRAKTION --------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '21',
            'sequence_id' => 21,
            'content' => 'Das gewohnte Stellenwertsystem mit der Basis 10',
        ));

        Cuepoint::create(array(
            'cuepoint' => '54',
            'sequence_id' => 21,
            'content' => 'Arabische Ziffern',
        ));

        Cuepoint::create(array(
            'cuepoint' => '76',
            'sequence_id' => 21,
            'content' => '»Liber Abaci« (1202/1228)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '99',
            'sequence_id' => 21,
            'content' => '»Margarita Philosophica« (1503)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '122',
            'sequence_id' => 21,
            'content' => 'Das schriftliche Rechnen setzt sich durch',
        ));

        Cuepoint::create(array(
            'cuepoint' => '180',
            'sequence_id' => 21,
            'content' => 'Das Binärsystem (Basis 2)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '228',
            'sequence_id' => 21,
            'content' => 'Das Duodezimalsystem (Basis 12)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '320',
            'sequence_id' => 21,
            'content' => 'Historische Bezüge',
        ));

        Cuepoint::create(array(
            'cuepoint' => '381',
            'sequence_id' => 21,
            'content' => 'Das Hexadezimalsystem (Basis 16)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '430',
            'sequence_id' => 21,
            'content' => 'Das Hexagesimalsystem (Basis 60)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '5',
            'sequence_id' => 22,
            'content' => 'Wechsel in ein anderes Zahlsystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '103',
            'sequence_id' => 22,
            'content' => 'Idee: Tabellenkalkulation',
        ));

        Cuepoint::create(array(
            'cuepoint' => '121',
            'sequence_id' => 22,
            'content' => 'Der Satz über die g-adische Darstellung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '160',
            'sequence_id' => 22,
            'content' => 'Namensgebung der Stufenzahlen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '5',
            'sequence_id' => 23,
            'content' => 'Unterschiedliche Sprachkonventionen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '50',
            'sequence_id' => 23,
            'content' => 'Gleitkommadarstellung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '108',
            'sequence_id' => 23,
            'content' => 'Die japanische Zahlwortbildung',
        ));

        Cuepoint::create(array(
            'cuepoint' => '0',
            'sequence_id' => 24,
            'content' => 'Flexible Interpretation der Stellenwertschreibweise',
        ));

        Cuepoint::create(array(
            'cuepoint' => '42',
            'sequence_id' => 24,
            'content' => 'Beispiel: 10234',
        ));

        Cuepoint::create(array(
            'cuepoint' => '0',
            'sequence_id' => 25,
            'content' => 'Addition in Stellenwertsystemen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '40',
            'sequence_id' => 25,
            'content' => 'Addieren im Hexadezimalsystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '139',
            'sequence_id' => 25,
            'content' => '»Die Kraft der 5«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '196',
            'sequence_id' => 25,
            'content' => 'Halbschriftliche Verfahren der Addition',
        ));

        Cuepoint::create(array(
            'cuepoint' => '220',
            'sequence_id' => 25,
            'content' => 'Stellenweise addieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '243',
            'sequence_id' => 25,
            'content' => 'Schrittweise addieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '273',
            'sequence_id' => 25,
            'content' => 'Gegensinniges Verändern',
        ));

        Cuepoint::create(array(
            'cuepoint' => '302',
            'sequence_id' => 25,
            'content' => 'Beispiele im Hexadezimalsystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '374',
            'sequence_id' => 25,
            'content' => 'Schriftliche Addition',
        ));

        Cuepoint::create(array(
            'cuepoint' => '392',
            'sequence_id' => 25,
            'content' => 'Objektebene',
        ));

        Cuepoint::create(array(
            'cuepoint' => '430',
            'sequence_id' => 25,
            'content' => 'Stellenwerttafel',
        ));

        Cuepoint::create(array(
            'cuepoint' => '468',
            'sequence_id' => 25,
            'content' => 'Stellenwertschreibweise',
        ));

        Cuepoint::create(array(
            'cuepoint' => '495',
            'sequence_id' => 25,
            'content' => 'Merkmale des schriftlichen Rechnens',
        ));

        Cuepoint::create(array(
            'cuepoint' => '0',
            'sequence_id' => 26,
            'content' => 'Subtraktion in Stellenwertsystemen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '100',
            'sequence_id' => 26,
            'content' => 'Halbschriftliche Verfahren der Subtraktion',
        ));

        Cuepoint::create(array(
            'cuepoint' => '110',
            'sequence_id' => 26,
            'content' => 'Stellenweise subtrahieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '134',
            'sequence_id' => 26,
            'content' => 'Schrittweise subtrahieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '151',
            'sequence_id' => 26,
            'content' => 'Gegensinniges Verändern',
        ));

        Cuepoint::create(array(
            'cuepoint' => '193',
            'sequence_id' => 26,
            'content' => 'Übertrag durch Entbündeln (bzw. Borgen)',
        ));

        Cuepoint::create(array(
            'cuepoint' => '265',
            'sequence_id' => 26,
            'content' => 'Übertrag durch Auffüllen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '308',
            'sequence_id' => 26,
            'content' => 'Übertrag durch Erweitern',
        ));

        Cuepoint::create(array(
            'cuepoint' => '335',
            'sequence_id' => 26,
            'content' => 'Mögliche Schwierigkeiten beim Entbündeln',
        ));

        // NOTE MULTIPLIKATION UND DIVISION -----------------------------------

        Cuepoint::create(array(
            'cuepoint' => '21',
            'sequence_id' => 27,
            'content' => 'Die Analyse der Multiplikation',
        ));

        Cuepoint::create(array(
            'cuepoint' => '58',
            'sequence_id' => 27,
            'content' => 'Multiplikation in anderen Systemen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '81',
            'sequence_id' => 27,
            'content' => 'Ein Beispiel im 3er-System',
        ));

        Cuepoint::create(array(
            'cuepoint' => '120',
            'sequence_id' => 27,
            'content' => 'Multiplikation mit der Basis g',
        ));

        Cuepoint::create(array(
            'cuepoint' => '171',
            'sequence_id' => 27,
            'content' => 'Kleines Einmaleins im 6er System',
        ));

        Cuepoint::create(array(
            'cuepoint' => '329',
            'sequence_id' => 27,
            'content' => 'Muster entdecken',
        ));

        Cuepoint::create(array(
            'cuepoint' => '351',
            'sequence_id' => 27,
            'content' => 'Kleines duales Einmaleins',
        ));

        Cuepoint::create(array(
            'cuepoint' => '368',
            'sequence_id' => 27,
            'content' => 'Kleines hexadezimales Einmaleins',
        ));

        Cuepoint::create(array(
            'cuepoint' => '391',
            'sequence_id' => 27,
            'content' => '»Phänomenale Quadratzahlen«',
        ));

        Cuepoint::create(array(
            'cuepoint' => '475',
            'sequence_id' => 27,
            'content' => 'Einstellig × mehrstellig',
        ));

        Cuepoint::create(array(
            'cuepoint' => '505',
            'sequence_id' => 27,
            'content' => 'Multiplikation zweier zweistelliger Zahlen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '0',
            'sequence_id' => 28,
            'content' => 'Das Distributivgesetz als Schlüssel',
        ));

        Cuepoint::create(array(
            'cuepoint' => '62',
            'sequence_id' => 28,
            'content' => 'Schritte zum Normalverfahren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '130',
            'sequence_id' => 28,
            'content' => 'Alternative Schreibweisen',
        ));

        Cuepoint::create(array(
            'cuepoint' => '156',
            'sequence_id' => 28,
            'content' => 'Bemerkung zum Normalverfahren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '0',
            'sequence_id' => 29,
            'content' => 'Divisionsalgorithmus handlungsorientiert',
        ));

        Cuepoint::create(array(
            'cuepoint' => '19',
            'sequence_id' => 29,
            'content' => 'Beispiel – 2382:3',
        ));

        Cuepoint::create(array(
            'cuepoint' => '92',
            'sequence_id' => 29,
            'content' => 'Divisionsalgorithmus mit Hilfe einer Stellenwerttafel',
        ));

        Cuepoint::create(array(
            'cuepoint' => '199',
            'sequence_id' => 29,
            'content' => 'Halbschriftliches Dividieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '304',
            'sequence_id' => 29,
            'content' => 'Multiplikative Schreibweise beim halbschriftlichen Dividieren',
        ));

        Cuepoint::create(array(
            'cuepoint' => '0',
            'sequence_id' => 30,
            'content' => 'Division nach Adam Ries',
        ));

        Cuepoint::create(array(
            'cuepoint' => '0',
            'sequence_id' => 31,
            'content' => 'Division im Hexadezimalsystem',
        ));

        Cuepoint::create(array(
            'cuepoint' => '0',
            'sequence_id' => 32,
            'content' => 'Polynomdivision',
        ));

        Cuepoint::create(array(
            'cuepoint' => '58',
            'sequence_id' => 32,
            'content' => 'Schriftliche Polynomdivision',
        ));


    }
}
