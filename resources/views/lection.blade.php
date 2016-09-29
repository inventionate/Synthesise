@extends('layouts.default')

@section('title')
	<title>EWM1 – {{{ $videoname }}}</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui stackable page grid vue">

	@if($available || $role === 'Teacher' || $role === 'Admin'  && $online)

		<h1 class="ui header">{{ $section . ': ' . $videoname	}}</h1>

		{{-- MEDIAPLAYER --}}
		<div class="one column row">
			<div class="column">
				{{-- Sequences Detection --}}
				{{-- @todo Refactor this hotfix solution! --}}
				@if( isset($sequences[1])  )
					<div class="ui
					@if ( last($sequences)['sequence_id'] === 1)
						one
					@elseif ( last($sequences)['sequence_id'] === 2)
						two
					@elseif ( last($sequences)['sequence_id'] === 3)
						three
					@elseif ( last($sequences)['sequence_id'] === 4)
						four
					@elseif ( last($sequences)['sequence_id'] === 5)
						five
					@elseif ( last($sequences)['sequence_id'] === 6)
						six
					@elseif ( last($sequences)['sequence_id'] === 7)
						seven
					@elseif ( last($sequences)['sequence_id'] === 8)
						eight
					@elseif ( last($sequences)['sequence_id'] === 9)
						nine
					@elseif ( last($sequences)['sequence_id'] === 10)
						ten
					@endif
					top attached small steps">

					@foreach ($sequences as $sequence)
						<div class="step @if ( ($sequence['sequence_id'] === 1 && substr(URL::current(), -2, 1) != '/') | substr(URL::current(), -1) == $sequence['sequence_id'] ) active @endif">
							<div class="content">
								<div class="title">
									<a href="{{ route('lektion',[$videoname, $sequence['sequence_id']]) }}">
										{{ $sequence['sequence_name'] }}
									</a>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				@endif
				{{-- Vue.js Komponente laden und die entsprechenden Variablen (Props) übergeben. --}}
				<interactive-video name="{{ $videoname }}" path="{{ $videopath }}" markers="{{ $markers }}" poster="/img/ol_title.jpg" v-bind:notes="true"></interactive-video>

			</div>
		</div>
		{{-- DISQUS UMGEBUNG --}}
		<div class="one column row">
		{{-- Diese Implementierung wird zum Testen verwendet. --}}
			<div id="disqus_thread" class="column"></div>
		</div>
		{{-- ADDITIONAL CONTENT --}}
		<section id="additional-content" class="two column row">
			{{-- durch die Texte loopen und Autoren davor setzten --}}
			<div class="column">
				<header>
					<h3 class="hide">Texte und Notizen</h3>
				</header>
				@foreach ($papers as $paper)
					<a class="ui fluid labeled icon blue button" v-on:click="trackEvents('Text', '{{ $paper->papername }}')" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $paper->papername]) }}"><i class="text file icon"></i> {{ $paper->author }}: {{ $paper->papername }}</a>
				@endforeach
			</div>
			<div class="column">
				{{-- @todo Funktionalität beim Note Repository hinzufügen (Note::collectContent) --}}
				<a class="ui fluid labeled icon blue button" v-on:click="trackEvents('Notizen', '{{ $videoname }}')" href="{{ action('LectionController@getNotesPDF', [rawurlencode($videoname)])	}}"><i class="square write icon"></i> Notizen herunterladen</a>
			</div>
		</section>
	</div>

	@else
		<div class="ui negative message"> Die online-Lektion ist noch nicht verfügbar. Bitte wählen Sie eine verfügbare online-Lektion aus.</div>
    	@include('dashboard.partials.all-lections')
	@endif

</main>
@stop

{{-- <script type="text/javascript">
		/* * * CONFIGURATION VARIABLES * * */
		var disqus_shortname = 'etpm';
		var disqus_identifier = '{{ rawurlencode($videoname) }}';

		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script> --}}
