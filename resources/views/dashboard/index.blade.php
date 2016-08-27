@extends('layouts.default')
@section('title')
	<title>EWM1 – Dashboard</title>
@stop

@section('content')

<main id="main-content-dashboard" class="ui stackable page grid">

	<h1 class="hide">Dashboard</h1>

	<div class="one column row">
		<div class="column">

			@include('dashboard.partials.messages.index')

		</div>
	</div>




	<div class="ui section divider"></div>

	<div class="two column row">
		<div class="column">
			@include('dashboard.partials.current-lection')
		</div>
		<section class="column">
			@include('dashboard.partials.general-info')
		</section>
	</div>

	<div class="one column row">
		<div class="column">
			@include('dashboard.partials.all-lections')
		</div>
	</div>

	{{-- SPEZIFISCHE BANNER --}}
	<div class="two column row">

		<div class="banner column">
			<div class="ui piled segment">
				<h4 class="ui header">Audiocollage zum 300. Stadtgeburstag: »Karlsruhe bildet«</h4>
				<a href="{{ url('audiocollage') }}" target="_blank" class="ui tiny left floated image">
					<div class="ui fade reveal">
						<div class="visible content">
	    					<img src="/img/microphone.jpg">
						</div>
						<div class="hidden content">
	    					<img src="/img/microphone_link.jpg">
						</div>
					</div>
				</a>
				<p>
					Die Volksschule im Spiegel der Jahrhunderte — das erste Mädchengymnasium Deutschlands — über 50 Jahre LehrerInnenbildung an der Pädagogische Hochschule — die Schule von morgen.
					<br>
					Historische Quellen, Zeitzeugen, Experten, Schülerinnen und Schüler lassen die Vergangenheit,Gegenwart und Zukunft der Bildung in Karlsruhe lebendig werden.
				</p>
				<audio id="audiocollage" controls preload="auto">
					<source src="/audio/audiocollage.ogg" type='audio/ogg' />
					<source src="/audio/audiocollage.mp3" type='audio/mp3' />
				</audio>
			</div>
		</div>

		<div class="banner column">
			<div class="ui piled segment">
			  <h4 class="ui header">Buchempfehlung: »Sozialgeschichte der Erziehung«</h4>
			  <a href="http://www.wbg-wissenverbindet.de/shop/ProductDisplay?storeId=10151&urlLangId=-3&productId=179103&urlRequestType=Base&langId=-3&catalogId=10001" target="_blank" class="ui tiny left floated image">
					<div class="ui fade reveal">
						<div class="visible content">
	    					<img src="/img/sozialgeschichte.jpg">
						</div>
						<div class="hidden content">
	    					<img src="/img/sozialgeschichte_link.jpg">
						</div>
					</div>
			</a>
			<p>
			  Das Buch führt in die Sozialgeschichte der Erziehung ein. Timo Hoyer spannt den Bogen von der Antike bis zur Moderne und beschreibt vor dem Hintergrund der politischen und kulturellen Situation die Entwicklung der privaten und schulischen Erziehung. Der als Studienlektüre konzipierte Band erzählt zugleich die Geschichte der Familie, der Kindheit und Jugend und des deutschen Schulsystems. Die Einführung bietet Studierenden der Erziehungswissenschaft Grundlagen, um die aktuellen pädagogischen Reformdebatten einordnen und bewerten zu können. </p>
			</div>
		</div>

	</div>

</main>
@stop
