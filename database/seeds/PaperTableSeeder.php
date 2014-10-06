<?php

use Illuminate\Database\Seeder;
use Synthesise\Paper;

class PaperTableSeeder extends Seeder {

	public function run()
	{
		DB::table('papers')->delete();

		// SOZIALGESCHICHTE

		Paper::create(array(
			'id' => 1,
			'papername' => 'Ethik und Moralerziehung',
			'author' => 'Timo Hoyer',
			'video_videoname' => 'Griechisch-römische Antike',
		));

		Paper::create(array(
			'id' => 2,
			'papername' => 'Vom Kindheitsmythos zur Lebenswelt der Kinder',
			'author' => 'Oskar Negt',
			'video_videoname' => 'Mittelalter',
		));

		Paper::create(array(
			'id' => 3,
			'papername' => 'Primäre Lebensverhältnisse: Familie, Haushalt',
			'author' => 'Oskar Negt',
			'video_videoname' => 'Frühe Neuzeit',
		));

		// IDEENGESCHICHTE

		Paper::create(array(
			'id' => 4,
			'papername' => 'Auszug aus »Émile« und »Julie«',
			'author' => 'Jean-Jacques Rousseau',
			'video_videoname' => 'Jean-Jacques Rousseau',
		));

		Paper::create(array(
			'id' => 5,
			'papername' => 'Auszug aus dem »Stanser Brief« und den »Nachforschungen«',
			'author' => 'Johann Heinrich Pestalozzi',
			'video_videoname' => 'Johann Heinrich Pestalozzi',
		));

		Paper::create(array(
			'id' => 6,
			'papername' => 'Auszug aus dem »Königsberger« und dem »Litauer Schulplan«',
			'author' => 'Wilhelm von Humboldt',
			'video_videoname' => 'Wilhelm von Humboldt',
		));

		// SCHULE UND ERZIEHUNG

		Paper::create(array(
			'id' => 7,
			'papername' => 'Brief an den Vater',
			'author' => 'Franz Kafka',
			'video_videoname' => 'Erziehung und Unterricht',
		));

		Paper::create(array(
			'id' => 8,
			'papername' => 'Ansprache für »Hilfe für Behinderte«',
			'author' => 'Richard von Weizsäcker',
			'video_videoname' => 'Heterogenität',
		));

		// BILDUNG – GLÜCK – GERECHTIGKEIT

		Paper::create(array(
			'id' => 9,
			'papername' => 'Bildungspanik',
			'author' => 'Heinz Bude',
			'video_videoname' => 'Wozu ist die Bildung da?',
		));

		Paper::create(array(
			'id' => 10,
			'papername' => 'Glück soll lernbar sein? Ist es aber nicht!',
			'author' => 'Timo Hoyer',
			'video_videoname' => 'Bildung und Glück',
		));

		Paper::create(array(
			'id' => 11,
			'papername' => 'Bildung zur Gerechtigkeit. Motivgeschichtliche Überlegungen',
			'author' => 'Timo Hoyer',
			'video_videoname' => 'Bildung und Gerechtigkeit',
		));	
	}

}
