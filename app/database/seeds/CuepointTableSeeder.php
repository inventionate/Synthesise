<?php

use Illuminate\Database\Seeder;
use Synthesise\Cuepoint;

class CuepointTableSeeder extends Seeder {

	public function run()
	{
		DB::table('cuepoints')->delete();

		// NOTE ANTIKE -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '29',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Beginn pädagogischer Geschichte'
		));

		Cuepoint::create(array(
			'cuepoint' => '66',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Periodisierung der Antike'
		));

		Cuepoint::create(array(
			'cuepoint' => '100',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Entdeckte Kindheit'
		));

		Cuepoint::create(array(
			'cuepoint' => '129',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Kinder: unfertige Menschen'
		));

		Cuepoint::create(array(
			'cuepoint' => '158',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Haus, oíkos, familia'
		));

		Cuepoint::create(array(
			'cuepoint' => '199',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Heirat und Schwangerschaft'
		));

		Cuepoint::create(array(
			'cuepoint' => '221',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'paideía, educatio, formatio'
		));

		Cuepoint::create(array(
			'cuepoint' => '294',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Fehlendes Erziehungsinteresse'
		));

		Cuepoint::create(array(
			'cuepoint' => '316',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Umgang mit Kindern'
		));

		Cuepoint::create(array(
			'cuepoint' => '368',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Disziplinierung und Prügel'
		));

		Cuepoint::create(array(
			'cuepoint' => '409',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Kleinkinderpflege: Frauensache'
		));

		Cuepoint::create(array(
			'cuepoint' => '446',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Der Vater erzieht'
		));

		Cuepoint::create(array(
			'cuepoint' => '470',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'paidagogós'
		));

		Cuepoint::create(array(
			'cuepoint' => '514 ',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Elementare Knabenbildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '584',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Keine Institution Schule'
		));

		Cuepoint::create(array(
			'cuepoint' => '630',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Organisation des Unterrichts'
		));

		Cuepoint::create(array(
			'cuepoint' => '710',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Alphabetisierung '
		));

		Cuepoint::create(array(
			'cuepoint' => '733',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Disziplinen'
		));

		Cuepoint::create(array(
			'cuepoint' => '770',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Unterricht'
		));

		Cuepoint::create(array(
			'cuepoint' => '802',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Bildungsangebote'
		));

		Cuepoint::create(array(
			'cuepoint' => '861',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Anfänge des Studiums'
		));

		Cuepoint::create(array(
			'cuepoint' => '922',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'enkýklios paideía'
		));

		Cuepoint::create(array(
			'cuepoint' => '956',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'septem artes liberales'
		));

		Cuepoint::create(array(
			'cuepoint' => '1015',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Römische Schulen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1070',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Schule als Spiel und Muße?'
		));

		Cuepoint::create(array(
			'cuepoint' => '1096',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Gehobener Unterricht'
		));

		Cuepoint::create(array(
			'cuepoint' => '1166',
			'video_videoname' => 'Griechisch-römische Antike',
			'content' => 'Untergang der Antike'
		));


		// NOTE MITTELALTER -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '30',
			'video_videoname' => 'Mittelalter',
			'content' => 'Völkerwanderung'
		));

		Cuepoint::create(array(
			'cuepoint' => '75',
			'video_videoname' => 'Mittelalter',
			'content' => 'Aufstieg des Christentums'
		));

		Cuepoint::create(array(
			'cuepoint' => '125',
			'video_videoname' => 'Mittelalter',
			'content' => 'Hoch- und Spätmittelalter'
		));

		Cuepoint::create(array(
			'cuepoint' => '200',
			'video_videoname' => 'Mittelalter',
			'content' => 'Kinder: Noch-nicht-Erwachsene'
		));

		Cuepoint::create(array(
			'cuepoint' => '269',
			'video_videoname' => 'Mittelalter',
			'content' => 'Fürsorge und Misshandlungen'
		));

		Cuepoint::create(array(
			'cuepoint' => '314',
			'video_videoname' => 'Mittelalter',
			'content' => 'Achtlosigkeit und Gefahren'
		));

		Cuepoint::create(array(
			'cuepoint' => '359',
			'video_videoname' => 'Mittelalter',
			'content' => 'Frei von Erziehung'
		));

		Cuepoint::create(array(
			'cuepoint' => '411',
			'video_videoname' => 'Mittelalter',
			'content' => 'Verbessert die Erziehung!'
		));

		Cuepoint::create(array(
			'cuepoint' => '444',
			'video_videoname' => 'Mittelalter',
			'content' => 'Altersstufen spielen geringe Rolle'
		));

		Cuepoint::create(array(
			'cuepoint' => '491',
			'video_videoname' => 'Mittelalter',
			'content' => 'Einteilung der Altersgruppen'
		));

		Cuepoint::create(array(
			'cuepoint' => '529',
			'video_videoname' => 'Mittelalter',
			'content' => 'Kinder als Rechtspersonen'
		));

		Cuepoint::create(array(
			'cuepoint' => '586',
			'video_videoname' => 'Mittelalter',
			'content' => 'Christliche Vorstellungen vom Kind'
		));

		Cuepoint::create(array(
			'cuepoint' => '638',
			'video_videoname' => 'Mittelalter',
			'content' => 'Ambivalentes Verhältnis zum Kind'
		));

		Cuepoint::create(array(
			'cuepoint' => '676',
			'video_videoname' => 'Mittelalter',
			'content' => 'Stellenwert der Erziehung'
		));

		Cuepoint::create(array(
			'cuepoint' => '727',
			'video_videoname' => 'Mittelalter',
			'content' => 'Aufbau aus Trümmern'
		));

		Cuepoint::create(array(
			'cuepoint' => '767',
			'video_videoname' => 'Mittelalter',
			'content' => 'Initiativen Karls des Großen'
		));

		Cuepoint::create(array(
			'cuepoint' => '807',
			'video_videoname' => 'Mittelalter',
			'content' => 'Schulpflicht'
		));

		Cuepoint::create(array(
			'cuepoint' => '823',
			'video_videoname' => 'Mittelalter',
			'content' => 'Ablehnung des klassischen Curriculums'
		));

		Cuepoint::create(array(
			'cuepoint' => '855',
			'video_videoname' => 'Mittelalter',
			'content' => 'Alphabetisierung'
		));

		Cuepoint::create(array(
			'cuepoint' => '890',
			'video_videoname' => 'Mittelalter',
			'content' => 'Ausbau von Schulen'
		));

		Cuepoint::create(array(
			'cuepoint' => '917',
			'video_videoname' => 'Mittelalter',
			'content' => 'Klosterschulen'
		));

		Cuepoint::create(array(
			'cuepoint' => '945',
			'video_videoname' => 'Mittelalter',
			'content' => 'Lehr-Lern-Gemeinschaften'
		));

		Cuepoint::create(array(
			'cuepoint' => '1028',
			'video_videoname' => 'Mittelalter',
			'content' => 'Unterricht ohne Klassenstufen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1058',
			'video_videoname' => 'Mittelalter',
			'content' => 'Dauer des Schul- und Universitätsbesuchs'
		));

		Cuepoint::create(array(
			'cuepoint' => '1111',
			'video_videoname' => 'Mittelalter',
			'content' => 'Schulunterricht'
		));

		Cuepoint::create(array(
			'cuepoint' => '1177',
			'video_videoname' => 'Mittelalter',
			'content' => 'Universitäten'
		));

		Cuepoint::create(array(
			'cuepoint' => '1243',
			'video_videoname' => 'Mittelalter',
			'content' => 'Universitätslehre'
		));

		Cuepoint::create(array(
			'cuepoint' => '1287',
			'video_videoname' => 'Mittelalter',
			'content' => 'Fächerspektrum an der Universität'
		));

		Cuepoint::create(array(
			'cuepoint' => '1380',
			'video_videoname' => 'Mittelalter',
			'content' => 'Weltliche Schulen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1429',
			'video_videoname' => 'Mittelalter',
			'content' => 'Christentum in Bedrängnis'
		));


		// NOTE FRÜHE NEUZEIT -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '30',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Eingrenzung der Epoche'
		));

		Cuepoint::create(array(
			'cuepoint' => '122',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Verstaatlichung'
		));

		Cuepoint::create(array(
			'cuepoint' => '175',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Konfessionalisierng'
		));

		Cuepoint::create(array(
			'cuepoint' => '227',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Säkularisierung'
		));

		Cuepoint::create(array(
			'cuepoint' => '276',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Patriarchat'
		));

		Cuepoint::create(array(
			'cuepoint' => '342',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Veränderungen im Familienleben'
		));

		Cuepoint::create(array(
			'cuepoint' => '375',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Familiengröße'
		));

		Cuepoint::create(array(
			'cuepoint' => '416',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Privatisierung des Hauses'
		));

		Cuepoint::create(array(
			'cuepoint' => '448',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Geburt'
		));

		Cuepoint::create(array(
			'cuepoint' => '467',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Freiheit und Reglements'
		));

		Cuepoint::create(array(
			'cuepoint' => '513',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Erziehungsgeräte'
		));

		Cuepoint::create(array(
			'cuepoint' => '564',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Arbeit der Kinder'
		));

		Cuepoint::create(array(
			'cuepoint' => '682',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Spiele und Spielzeug'
		));

		Cuepoint::create(array(
			'cuepoint' => '728',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Erziehungsalltag'
		));

		Cuepoint::create(array(
			'cuepoint' => '790',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Züchtigungen'
		));

		Cuepoint::create(array(
			'cuepoint' => '858',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Väter- und Müterrollen'
		));

		Cuepoint::create(array(
			'cuepoint' => '913',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Hofmeister und Gouvernanten'
		));

		Cuepoint::create(array(
			'cuepoint' => '1038',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Schule als Kampfschauplatz'
		));

		Cuepoint::create(array(
			'cuepoint' => '1116',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Wer die Schule hat, hat die Zukunft'
		));

		Cuepoint::create(array(
			'cuepoint' => '1170',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Alphabetisierung'
		));

		Cuepoint::create(array(
			'cuepoint' => '1342',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Landesherrliche Schulinitiativen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1384',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Schul- oder Unterrichtspflicht'
		));

		Cuepoint::create(array(
			'cuepoint' => '1448',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Deutsche Schulen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1552',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Höhere Schulen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1617',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Veränderungen des Curriculums'
		));

		Cuepoint::create(array(
			'cuepoint' => '1668',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Neuer Schultyp: Realschule'
		));

		Cuepoint::create(array(
			'cuepoint' => '1769',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Mädchenbildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '1860',
			'video_videoname' => 'Frühe Neuzeit',
			'content' => 'Katholische Gelehrtenschulen der Jesuiten'
		));


		// NOTE JEAN-JACQUES ROUSSEAU -------------------------------------------------

        Cuepoint::create(array(
            'cuepoint' => '71',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Rousseau als Erzieher'
        ));

        Cuepoint::create(array(
            'cuepoint' => '217',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Möglichkeiten und Grenzen von Eduktion '
        ));

        Cuepoint::create(array(
            'cuepoint' => '303',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Eduktion: Veränderte Wahrnehmung
        ermöglicht neue Erfahrung '
        ));

        Cuepoint::create(array(
            'cuepoint' => '347',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Beriffsprobleme'
        ));

        Cuepoint::create(array(
            'cuepoint' => '361',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Kritisches Denken als Notwendigkeit'
        ));

        Cuepoint::create(array(
            'cuepoint' => '405',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Eduktion'
        ));

        Cuepoint::create(array(
            'cuepoint' => '429',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Der Vorrang allgemeiner Menschenbildung'
        ));

        Cuepoint::create(array(
            'cuepoint' => '499',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Das Problem des Bürgertums'
        ));

        Cuepoint::create(array(
            'cuepoint' => '587',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Das Plädoyer für eine Natur-gemäße Eduktion'
        ));

        Cuepoint::create(array(
            'cuepoint' => '633',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Rousseaus Vertrauensanthropologie'
        ));

        Cuepoint::create(array(
            'cuepoint' => '881',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Rousseaus weiter Erziehungsbegriff'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1005',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Die Natur als Erzieher'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1052',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Der Entwicklungsaspekt der Natur'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1147',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Die Bedeutung des Entwicklungsaspekts'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1194',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Die Dynamik des Rousseauschen Naturbegriffs'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1251',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Entwicklung - Freiheit - Vervollkommnungsfähigkeit'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1342',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Die Doppelseitigkeit der Vervollkommnungsfähigkeit'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1383',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Der »Mensch« als Erzieher'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1428',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Die »Dinge« als Erzieher'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1494',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Fazit zum Begriff einer Natur-gemäßen Eduktion'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1594',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Negative Eduktion vor positiver Eduktion'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1633',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Die Perspektive des Kindes einnehmen können'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1737',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Freiheit und Selbsttätigkeit des Kindes  '
        ));

        Cuepoint::create(array(
            'cuepoint' => '1868',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Erfolgserlebnisse: Wichtigkeit und Problematik'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1903',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Die Freiheit des Kindes als Gefühl der Freiheit'
        ));

        Cuepoint::create(array(
            'cuepoint' => '1949',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Die vorbereitete Lernumgebung'
        ));

        Cuepoint::create(array(
            'cuepoint' => '2001',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Verzicht auf Herrschaft'
        ));

        Cuepoint::create(array(
            'cuepoint' => '2045',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Das anspornend realistische Selbstbild des Kindes'
        ));

        Cuepoint::create(array(
            'cuepoint' => '2129',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Plädoyer für Selbsttätigkeit'
        ));

        Cuepoint::create(array(
            'cuepoint' => '2187',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Bildung der Urteilskraft'
        ));

        Cuepoint::create(array(
            'cuepoint' => '2225',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Positive Eduktion erst nach Entwicklung der Vernunft'
        ));

        Cuepoint::create(array(
            'cuepoint' => '2290',
            'video_videoname' => 'Jean-Jacques Rousseau',
            'content' => 'Negative und positive Eduktion'
        ));


		// NOTE JOHANN HEINRICH PESTALOZZI -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '45',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Pestalozzis Geburtshaus'
		));

		Cuepoint::create(array(
			'cuepoint' => '93',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Pestalozzi und seine Frau Anna beim Unterrichten'
		));

		Cuepoint::create(array(
			'cuepoint' => '107',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Der Neuhoff bei Birr'
		));

		Cuepoint::create(array(
			'cuepoint' => '225',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Die Abendstunde eines Einsiedlers (1780)'
		));

		Cuepoint::create(array(
			'cuepoint' => '247',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Über Gesetzgebung und Kindermord (1783)'
		));

		Cuepoint::create(array(
			'cuepoint' => '254',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Lienhard und Gertrud (1781–1787)'
		));

		Cuepoint::create(array(
			'cuepoint' => '262',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Meine Nachforschungen… (1797)'
		));

		Cuepoint::create(array(
			'cuepoint' => '354',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Grundlage der Bildung im Inneren unserer Natur'
		));

		Cuepoint::create(array(
			'cuepoint' => '368',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Familie als ›Haushimmel‹'
		));

		Cuepoint::create(array(
			'cuepoint' => '615',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => '»Schule der Sitten und des Staates«'
		));

		Cuepoint::create(array(
			'cuepoint' => '558',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Problem des »Kindermords«'
		));

		Cuepoint::create(array(
			'cuepoint' => '634',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Karl V: »Carolina« (1532)'
		));

		Cuepoint::create(array(
			'cuepoint' => '773',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Die Rolle des Staates'
		));

		Cuepoint::create(array(
			'cuepoint' => '801',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Die Notwendigkeit staatlichen Eingreifens'
		));

		Cuepoint::create(array(
			'cuepoint' => '871',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Leidenschaften und Triebe der menschlichen Natur'
		));

		Cuepoint::create(array(
			'cuepoint' => '959',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Das Dorf Bonnal: »vollendete Sündhaftigkeit«'
		));

		Cuepoint::create(array(
			'cuepoint' => '983',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Gertrud und Junker Arner'
		));

		Cuepoint::create(array(
			'cuepoint' => '1022',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Voght und armer Mann'
		));

		Cuepoint::create(array(
			'cuepoint' => '1036',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Der Pfarrer spricht mit dem Vogt'
		));

		Cuepoint::create(array(
			'cuepoint' => '1090',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => '  Auswirkungen der Industrialisierung'
		));

		Cuepoint::create(array(
			'cuepoint' => '1189',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Die Notwendigkeit der Schule'
		));

		Cuepoint::create(array(
			'cuepoint' => '1293',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Kindererziehung: »hart und unerbittlich«'
		));

		Cuepoint::create(array(
			'cuepoint' => '1350',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Gleiche Erziehung zur Herstellung der ›Ordnung‹'
		));

		Cuepoint::create(array(
			'cuepoint' => '1503',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Überwindung des dualistischen Menschenbilds'
		));

		Cuepoint::create(array(
			'cuepoint' => '1535',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Die Abfolge der Zustände'
		));

		Cuepoint::create(array(
			'cuepoint' => '1517',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Die drei Zustände im Menschen vereint'
		));

		Cuepoint::create(array(
			'cuepoint' => '1649',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Weder naiv-harmonistisch, noch dualistisch '
		));

		Cuepoint::create(array(
			'cuepoint' => '1699',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => '»Das Werk meiner selbst«'
		));

		Cuepoint::create(array(
			'cuepoint' => '1763',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => '»ganzheitliche Bildung«'
		));

		Cuepoint::create(array(
			'cuepoint' => '1817',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Die Trias: »Kopf, Herz und Hand«'
		));

		Cuepoint::create(array(
			'cuepoint' => '1868',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
			'content' => 'Die sittliche Erziehung'
		));


		// NOTE WILHELM VON HUMBOLDT -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '71',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Epoche des Neuhumanismus'
		));

		Cuepoint::create(array(
			'cuepoint' => '363',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Studium und Beruf'
		));

		Cuepoint::create(array(
			'cuepoint' => '411',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Alexander von Humboldt'
		));

		Cuepoint::create(array(
			'cuepoint' => '455',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Humboldt-Universität'
		));

		Cuepoint::create(array(
			'cuepoint' => '497',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => '»Theorie der Bildung des Menschen« (~1793)'
		));

		Cuepoint::create(array(
			'cuepoint' => '520',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => '»Ideen zu einem Versuch, die Grenzen
		der Wirksamkeit des Staates zu bestimmen« (1792)'
		));

		Cuepoint::create(array(
			'cuepoint' => '564',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => '»Über Religion« (1798)'
		));

		Cuepoint::create(array(
			'cuepoint' => '584',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => '»Theorie der Bildung des Menschen«'
		));

		Cuepoint::create(array(
			'cuepoint' => '739',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Die Schule'
		));

		Cuepoint::create(array(
			'cuepoint' => '778',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Struktur des Bildungsvorgangs'
		));

		Cuepoint::create(array(
			'cuepoint' => '897',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Studium als ›Bildungsaufgabe‹'
		));

		Cuepoint::create(array(
			'cuepoint' => '988',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Humboldts Schulpläne'
		));

		Cuepoint::create(array(
			'cuepoint' => '1057',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'horizontale vs. vertikale Dreistufigkeit'
		));

		Cuepoint::create(array(
			'cuepoint' => '1131',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'möglichst langer, allgemeinbildender Schulweg'
		));

		Cuepoint::create(array(
			'cuepoint' => '1163',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => '»allseitige Kräftebildung«'
		));

		Cuepoint::create(array(
			'cuepoint' => '1362',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Souveränität der Studierenden'
		));

		Cuepoint::create(array(
			'cuepoint' => '1390',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => '»Wissen-schaffen«'
		));

		Cuepoint::create(array(
			'cuepoint' => '1446',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Bedeutungsänderung des Bildungsbegriffs'
		));

		Cuepoint::create(array(
			'cuepoint' => '1475',
			'video_videoname' => 'Wilhelm von Humboldt',
			'content' => 'Einfluss der OECD '
		));

		// NOTE ERZIEHUNG UND UNTERRICHT -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '30',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Erziehung ⇔ Unterricht'
		));

		Cuepoint::create(array(
			'cuepoint' => '84',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Lehreralltag'
		));

      Cuepoint::create(array(
			'cuepoint' => '212',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Prange: Pädagogisches Handeln'
		));

		Cuepoint::create(array(
			'cuepoint' => '337',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Lernen?'
		));

      Cuepoint::create(array(
			'cuepoint' => '821',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Historische Verortungen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1290',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Unterricht und Erziehung als Ordnungshilfe'
		));

		Cuepoint::create(array(
			'cuepoint' => '1554',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Erziehender Unterricht'
		));

		Cuepoint::create(array(
			'cuepoint' => '1694',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Lernen: Vertiefung und Besinnung'
		));

		Cuepoint::create(array(
			'cuepoint' => '1743',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Vertiefung'
		));

		Cuepoint::create(array(
			'cuepoint' => '1766',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Besinnung'
		));

		Cuepoint::create(array(
			'cuepoint' => '1822',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Lernprozesse: geistige Tätigkeiten'
		));

		Cuepoint::create(array(
			'cuepoint' => '1888',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Vielseitigkeit des Interesses'
		));

		Cuepoint::create(array(
			'cuepoint' => '1928',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Zusammenhänge herstellen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1971',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => 'Charakterstärke der Sittlichkeit'
		));

		Cuepoint::create(array(
			'cuepoint' => '2143',
			'video_videoname' => 'Erziehung und Unterricht',
			'content' => '»ästhetische Notwendigkeit«'
		));



		// NOTE HETEROGENITÄT -------------------------------------------------

       Cuepoint::create(array(
			'cuepoint' => '47',
			'video_videoname' => 'Heterogenität',
			'content' => 'Facetten von Gleichheit und Verschiedenheit'
		));

        Cuepoint::create(array(
			'cuepoint' => '148',
			'video_videoname' => 'Heterogenität',
			'content' => 'Der Kontext einer Pädagogik der Vielfalt'
		));

		Cuepoint::create(array(
			'cuepoint' => '211',
			'video_videoname' => 'Heterogenität',
			'content' => 'Verschiedenheit als pädagogische Herausforderung'
		));

       Cuepoint::create(array(
			'cuepoint' => '535',
			'video_videoname' => 'Heterogenität',
			'content' => 'Heterogenität in der Schule'
		));

       Cuepoint::create(array(
			'cuepoint' => '958',
			'video_videoname' => 'Heterogenität',
			'content' => 'Konstitutive Prinzipien pädagogischen Handelns'
		));

       Cuepoint::create(array(
			'cuepoint' => '1196',
			'video_videoname' => 'Heterogenität',
			'content' => 'Didaktische Überleungen im Kontext von Heterogenität'
		));

       Cuepoint::create(array(
			'cuepoint' => '1265',
			'video_videoname' => 'Heterogenität',
			'content' => 'Eine »Inklusive Didaktik«'
		));

       Cuepoint::create(array(
			'cuepoint' => '1584',
			'video_videoname' => 'Heterogenität',
			'content' => 'Strukturelle Überlegungen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1655',
			'video_videoname' => 'Heterogenität',
			'content' => 'Inklusion'
		));

		Cuepoint::create(array(
			'cuepoint' => '1870',
			'video_videoname' => 'Heterogenität',
			'content' => 'Inklusives Schulsystem'
		));

		Cuepoint::create(array(
			'cuepoint' => '1954',
			'video_videoname' => 'Heterogenität',
			'content' => 'Gemeinschaftsschule'
		));


		// NOTE WOZU IST DIE BILDUNG DA? -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '30',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Schlüsselbegriff der Pädagogik
		'
		));

		Cuepoint::create(array(
			'cuepoint' => '38',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Ein Chamäleon unter den Begriffen'
		));

		Cuepoint::create(array(
			'cuepoint' => '48',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Ringvorlesung 2010
		'
		));

		Cuepoint::create(array(
			'cuepoint' => '86',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Doppeldeutigkeit des Begriffs
		'
		));

		Cuepoint::create(array(
			'cuepoint' => '129',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Zeitkern der Bildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '200',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Objektive und subjektive Bildungszeiten'
		));

		Cuepoint::create(array(
			'cuepoint' => '210',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Kein allgemeines Zeitmaß der Bildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '235',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Bildung im Raum'
		));


		Cuepoint::create(array(
			'cuepoint' => '252',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Schularchitektur'
		));

		Cuepoint::create(array(
			'cuepoint' => '326',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Komplexität von Bildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '365',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Grenzen der Vorhersagbarkeit und Steuerbarkeit'
		));

		Cuepoint::create(array(
			'cuepoint' => '412',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Erziehung – intentional'
		));

		Cuepoint::create(array(
			'cuepoint' => '443',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Man wird erzogen'
		));

		Cuepoint::create(array(
			'cuepoint' => '504',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Man bildet sich selbst'
		));

		Cuepoint::create(array(
			'cuepoint' => '537',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Zur Geschichte der Aus- und Fortbildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '560',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Aus- und Fortbildung als Teilbereich der Bildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '632',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Bildungswert von Arbeit und Beruf'
		));

		Cuepoint::create(array(
			'cuepoint' => '710',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Berufsausbildung als vollwertige Bildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '771',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Bildung ohne Zweck und Nutzen?'
		));

		Cuepoint::create(array(
			'cuepoint' => '810',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Neuhumanistische Bildungsidee'
		));

		Cuepoint::create(array(
			'cuepoint' => '869',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Gegen gesellschaftliche Instrumentalisierung'
		));

		Cuepoint::create(array(
			'cuepoint' => '909',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Bildung im Interessenstreit'
		));

		Cuepoint::create(array(
			'cuepoint' => '933',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Verantwortung der Bildungs-Politik'
		));

		Cuepoint::create(array(
			'cuepoint' => '969',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Eine Art Präambel'
		));

		Cuepoint::create(array(
			'cuepoint' => '1024',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Glück als Bildungskategorie'
		));

		Cuepoint::create(array(
			'cuepoint' => '1054',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Glück eines gelingenden Lebens'
		));

		Cuepoint::create(array(
			'cuepoint' => '1075',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Formale Voraussetzungen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1104',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Pädagogische Aufgaben'
		));

		Cuepoint::create(array(
			'cuepoint' => '1142',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Gerechtigkeit setzt Grenzen'
		));

		Cuepoint::create(array(
			'cuepoint' => '1209',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Gerechtigkeitsbildung'
		));

		Cuepoint::create(array(
			'cuepoint' => '1242',
			'video_videoname' => 'Wozu ist die Bildung da?',
			'content' => 'Glück der Bildung'
		));


		// NOTE BILDUNG UND GLÜCK -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '56',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Inhalte des Glücks sind individuell'
		));

		Cuepoint::create(array(
			'cuepoint' => '97',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Zwei Bedeutungen, ein Wort'
		));

		Cuepoint::create(array(
			'cuepoint' => '149',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Glück als Strebens- und Lebensziel'
		));

		Cuepoint::create(array(
			'cuepoint' => '171',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Glück als Erfüllung'
		));

		Cuepoint::create(array(
			'cuepoint' => '218',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Flow
		'
		));

		Cuepoint::create(array(
			'cuepoint' => '315',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Negatives, episodisches Glück'
		));

		Cuepoint::create(array(
			'cuepoint' => '373',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Flow: Lust oder Last'
		));

		Cuepoint::create(array(
			'cuepoint' => '394',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Positives Glück
		'
		));

		Cuepoint::create(array(
			'cuepoint' => '435',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Liebes-Glück'
		));

		Cuepoint::create(array(
			'cuepoint' => '490',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Glück ist temporär'
		));

		Cuepoint::create(array(
			'cuepoint' => '517',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Glück: Maßstab des Humanen'
		));

		Cuepoint::create(array(
			'cuepoint' => '564',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Subjektive Bedingungen des Glücks'
		));

		Cuepoint::create(array(
			'cuepoint' => '590',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Objektive Bedingungen des Glücks'
		));

		Cuepoint::create(array(
			'cuepoint' => '620',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Übergreifendes Glück'
		));

		Cuepoint::create(array(
			'cuepoint' => '688',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Wunschlos glücklich'
		));

		Cuepoint::create(array(
			'cuepoint' => '737',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Glück als Ziel von Bildung?'
		));

		Cuepoint::create(array(
			'cuepoint' => '818',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Glück als Voraussetzung von Bildung?'
		));

		Cuepoint::create(array(
			'cuepoint' => '873',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Glück im Lernen'
		));

		Cuepoint::create(array(
			'cuepoint' => '930',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Bildung als Voraussetzung von Glück?'
		));

		Cuepoint::create(array(
			'cuepoint' => '968',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Bildung: Erweiterung von Glücksmöglichkeiten'
		));

		Cuepoint::create(array(
			'cuepoint' => '980',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Negative Bildungsprozesse'
		));

		Cuepoint::create(array(
			'cuepoint' => '1036',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Positive Bildungsprozesse'
		));

		Cuepoint::create(array(
			'cuepoint' => '1080',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Orte der Bildung – Orte des Glücks'
		));

		Cuepoint::create(array(
			'cuepoint' => '1114',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Selbsterkenntnis'
		));

		Cuepoint::create(array(
				'cuepoint' => '1158',
			'video_videoname' => 'Bildung und Glück',
			'content' => 'Glück ist nicht lernbar!'
		));


		// NOTE BILDUNG UND GERECHTIGKEIT -------------------------------------------------

		Cuepoint::create(array(
			'cuepoint' => '30',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Keine Demokratie ohne Gerechtigkeit'
		));

		Cuepoint::create(array(
			'cuepoint' => '58',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Drei Formen des Gerechtigkeitssinns'
		));

		Cuepoint::create(array(
			'cuepoint' => '94',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Personale und institutionelle Gerechtigkeit'
		));

		Cuepoint::create(array(
			'cuepoint' => '180',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Elemente der Gerechtigkeit'
		));

		Cuepoint::create(array(
			'cuepoint' => '197',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Gleichheit'
		));

		Cuepoint::create(array(
			'cuepoint' => '334',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Neutralität'
		));

		Cuepoint::create(array(
			'cuepoint' => '360',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Befolgung von Gesetzen und Wechselseitigkeit'
		));

		Cuepoint::create(array(
			'cuepoint' => '405',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Egalität, Neutralität, Legalität und Reziprozität'
		));

		Cuepoint::create(array(
			'cuepoint' => '456',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Gerechtigkeit in der Pädagogik'
		));

		Cuepoint::create(array(
			'cuepoint' => '556',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Gerechte Grundstruktur der Gesellschaft'
		));

		Cuepoint::create(array(
			'cuepoint' => '597',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Die allgemeine Gerechtigkeitsvorstellung'
		));

		Cuepoint::create(array(
			'cuepoint' => '633',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Die speziellen Gerechtigkeitsgrundsätze'
		));

		Cuepoint::create(array(
			'cuepoint' => '670',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Pädagogische Konsequenz'
		));

		Cuepoint::create(array(
			'cuepoint' => '723',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Begründung der Grundsätze'
		));

		Cuepoint::create(array(
			'cuepoint' => '800',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Bildung des Gerechtigkeitssinn'
		));

		Cuepoint::create(array(
			'cuepoint' => '863',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Moralstufenmodell'
		));

		Cuepoint::create(array(
			'cuepoint' => '906',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Erstes Niveau: Vorkonventionell'
		));

		Cuepoint::create(array(
			'cuepoint' => '975',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Zweites Niveau: Konventionell'
		));

		Cuepoint::create(array(
			'cuepoint' => '1018',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Drittes Niveau: Postkonventionell'
		));

		Cuepoint::create(array(
			'cuepoint' => '1083',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Stufe 6 ein Postulat
		'
		));

		Cuepoint::create(array(
			'cuepoint' => '1111',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Erziehung zur Gerechtigkeit'
		));

		Cuepoint::create(array(
			'cuepoint' => '1142',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Stimulation durch Diskussion statt Indoktrination'
		));

		Cuepoint::create(array(
			'cuepoint' => '1210',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Gerechte Schulgemeinschaft'
		));

		Cuepoint::create(array(
			'cuepoint' => '1265',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Kritik an Kohlberg
		'
		));

		Cuepoint::create(array(
			'cuepoint' => '1330',
			'video_videoname' => 'Bildung und Gerechtigkeit',
			'content' => 'Gerechtigkeitsbildung durch aktive Partizipation'
		));
	}
}
