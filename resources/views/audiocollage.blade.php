@extends('layouts.default')

@section('title')
  <title>Audiocollage »Karlsruhe bildet«</title>
@stop

@section('content')
<main id="main-content-audiocollage" class="ui grid container">
    <!-- Besser mit Segmenten arbeiten  -->
    <div class="one column row">
    	<div class="center aligned column">
            {{-- An dieser Stelle das Logo anzeigen --}}
            <h1 class="ui header">»Karlsruhe bildet«</h1>
            <h2 class="ui header">Eine Audiocollage zum 300. Stadtgeburtstag</h2>

            <p>
            Die Volksschule im Spiegel der Jahrhunderte — das erste Mädchengymnasium Deutschlands — über 50 Jahre LehrerInnenbildung an der Pädagogische Hochschule — die Schule von morgen.
            </p>
            <p>
            Historische Quellen, Zeitzeugen, Experten, Schülerinnen und Schüler lassen die Vergangenheit, Gegenwart und Zukunft der Bildung in Karlsruhe lebendig werden.
            </p>
        </div>
    </div>

    <div class="ui horizontal header divider"><i class="ui video play outline icon"></i></div>

    <div class="one column row">
        <div class="center aligned column">

            <audio id="audiocollage" controls preload="auto">
                <source src="/audio/audiocollage.ogg" type='audio/ogg' />
                <source src="/audio/audiocollage.mp3" type='audio/mp3' />
            </audio>
        </div>
    </div>

    <div class="ui horizontal header divider"><i class="ui users icon"></i></div>

    <div class="one column row">
        <div class="center aligned column">

        <p>
            Produziert von apl. Prof. Dr. Timo Hoyer und Jean-Philippe Englert.
        </p>
        <p>
        Unter Mitarbeit von Studierenden der Allgemeinen Erziehungswissenschaft:<br>
        Donat Bender, Larissa Bühn, Melanie Gallmeier, Stefan Grutza, Laura Kringe, Theresia Kugele, Julia Mayer, Kristina Millen, Lea-Maria Nagel, Anna Sophie Nöller, Nadja Vierle.
        </p>
        <p>Zusätzliche SprecherInnen:<br>
            Peter Frank, Wolfgang Kringe, Farid Rafienejad, Joachim Vierle.
        </p>
        <p>Für ihr Mitwirken danken wir:<br>
            den Schülerinnen und Schülern der Schönbornschule, Karlsdorf Neuthard (Klasse 3b) und der Johann-Peter-Hebelschule, Bruchsal (Klasse 4a) sowie Frau Albrecht, Dr. Christine Böckelmann, Prof. Dr. Wolfram Ellwanger, Joachim Frisch, Katja Nitsche, Wibke Schaper, Prof. Dr. Werner Schnatterbeck, Albert Süß und Verena Wiehl.
        </p>
    </div>
    </div>

    <div class="ui horizontal header divider"><i class="ui archive icon"></i></div>

    <div class="three column row">

        <div class="column">
            <img src="/images/ac_book.jpg" class="ui centered circular image">
        </div>

        <div class="column">
            <img src="/images/ac_building.jpg" class="ui centered circular image">
        </div>

        <div class="column">
            <img src="/images/ac_pupils.jpg" class="ui centered circular image">
        </div>

    </div>



</main>
@stop

@section('scripts')

@stop
