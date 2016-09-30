<?php

use Illuminate\Database\Seeder;
use Synthesise\Infoblock;

class InfoblockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infoblocks')->delete();

        Infoblock::create(array(
            'name'          => 'Buchempfehlung: »Sozialgeschichte der Erziehung«',
            'content'       => 'Das Buch führt in die Sozialgeschichte der Erziehung ein. Timo Hoyer spannt den Bogen von der Antike bis zur Moderne und beschreibt vor dem Hintergrund der politischen und kulturellen Situation die Entwicklung der privaten und schulischen Erziehung. Der als Studienlektüre konzipierte Band erzählt zugleich die Geschichte der Familie, der Kindheit und Jugend und des deutschen Schulsystems. Die Einführung bietet Studierenden der Erziehungswissenschaft Grundlagen, um die aktuellen pädagogischen Reformdebatten einordnen und bewerten zu können.',
            'image_path'    => 'storage/seminars/infoblock_1.jpg',
            'link_url'      => 'http://www.wbg-wissenverbindet.de/shop/ProductDisplay?storeId=10151&urlLangId=-3&productId=179103&urlRequestType=Base&langId=-3&catalogId=10001',
            'seminar_name'  => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

        Infoblock::create(array(
            'name'          => 'Audiocollage zum 300. Stadtgeburstag: »Karlsruhe bildet«',
            'content'       => '<p>Die Volksschule im Spiegel der Jahrhunderte — das erste Mädchengymnasium Deutschlands — über 50 Jahre LehrerInnenbildung an der Pädagogische Hochschule — die Schule von morgen. <br>
            Historische Quellen, Zeitzeugen, Experten, Schülerinnen und Schüler lassen die Vergangenheit,Gegenwart und Zukunft der Bildung in Karlsruhe lebendig werden.</p>',
            'image_path'    => 'storage/seminars/infoblock_2.jpg',
            'link_url'      => 'http://etpm.ph-karlsruhe.de/audiocollage',
            'seminar_name'  => 'Grundlagen pädagogischen Denkens und Handelns',
        ));

    }
}
