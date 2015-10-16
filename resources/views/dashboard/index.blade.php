@extends('layouts.default')
@section('title')
	<title>EWM1 – Dashboard</title>
@stop

@section('content')
<main id="main-content-dashboard" class="ui stackable page grid">

	<div class="one column row">
		<div class="column">

			<h1 class="hide">Dashboard</h1>

			@include('dashboard.partials.messages')

		</div>
	</div>

	<div class="two column row">
		<div class="column">
			@include('dashboard.partials.current-lection')
		</div>
		<section class="column">
			@include('dashboard.partials.general-info')
		</section>
	</div>

	{{-- SPEZIFISCHE BANNER --}}
	<div class="two column row">

		<div class="banner column">
			<div class="ui piled segment">
				<h4 class="ui header">Audiokollage zum 300. Stadtgeburstag: »Karlsruhe bildet«</h4>
				<p>Im Rahmen eines Seminars von Timo Hoyer haben mehrere Studierende und er die Audiokollage »Karlsruhe bildet« produziert. Tauchen Sie in spannende Erzählungen und Geschichten rund um den ›Bildungsstandort‹ Karslruhe ein.</p>
				<audio id="audiocollage" class="video-js vjs-fluid" controls preload="auto">
					<source src="/audio/audiocollage.mp3" type='audio/mp3' />
				</audio>
			</div>
		</div>

		<div class="banner column">
			<div class="ui piled segment">
			  <h4 class="ui header">Buchempfehlung: <em>Sozialgeschichte der Erziehung</em></h4>
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
			  <p>Der Band bietet einen Überblick über die Sozialgeschichte der Erziehung von der Antike bis zur Gegenwart. Er betrachtet sowohl die private als auch die öffentliche Erziehung im jeweiligen sozio-kulturellen Kontext und liefert dem Leser damit ein fundiertes historisches Hintergrundwissen für die Auseinandersetzung mit aktuellen Erziehungsfragen.</p>
			</div>
		</div>


	</div>

	<div class="one column row">
		<div class="column">
			@include('dashboard.partials.all-lections')
		</div>
	</div>
</main>
@stop

@section('scripts')
<script type="text/javascript">
/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'etpm'; //

/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
var s = document.createElement('script'); s.async = true;
s.type = 'text/javascript';
s.src = '//' + disqus_shortname + '.disqus.com/count.js';
(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>
@stop
