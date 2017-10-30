@extends('layouts.default')

@section('title')
	<title>e:t:p:M® – {{{ $lection_name }}}</title>
@stop

@section('scripts')

	<script>

	Chart.defaults.global.elements.point.radius = 5;
	Chart.defaults.global.elements.point.hoverRadius = 10;
	Chart.defaults.global.elements.point.backgroundColor = 'red';
	Chart.defaults.global.elements.point.borderColor = 'black';

	var ctx = document.getElementById("video-feedback").getContext('2d');
	var video_feedback = new Chart(ctx, {
		type: 'line',
		data: {
			labels: {{ json_encode(array_keys($help_points)) }},
			datasets: [{
				label: 'Anzahl der Klicks',
				data: {{ json_encode(array_values($help_points)) }},
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						stepSize: 1
					}
				}],
				xAxes: [{
					ticks: {
						callback: function(value, index, values) {

							var minutes = Math.floor(value / 60);

							var seconds = value - minutes * 60;

							var time =  minutes + ',' + seconds + 'min';

							return time;
						}
					}
				}]
        	},
			legend: {
            	display: false
            }
		}
	});

	$("#video-feedback").click( function(evt) {

	    var activePoints =  video_feedback.getElementsAtEvent(evt);

		if ( 0 < activePoints.length )
		{

			var time_point = activePoints[0]._index;

			var time_points = {{ json_encode(array_keys($help_points)) }};

			if ( time_point > 0 )
			{
				window.synthesise_player.ready(function () {

					window.synthesise_player.play();

					window.synthesise_player.currentTime( time_points[time_point] );

					window.synthesise_player.pause();

				});
			}
		}
		// else
		// {
		// 	window.synthesise_player.ready(function () {
		//
		// 		window.synthesise_player.pause();
		//
		// 	});
		// }

	});

	</script>


	{{-- <script>
        var videoplayer = videojs('videoplayer');

        $('#playdemo').on('click', function () {
            videoplayer.play();
        });
    </script> --}}

@stop

@section('content')
<main id="main-content-seminar-lection" class="ui grid container vue">


	@if ( Seminar::authorizedEditor($seminar_name) )

		<section class="sixteen wide column">
			<div class="ui blue message">
				In der momentanen Version ist der Sequenz-Editor deaktiviert. Neue Video- oder Interaktionssequenzen können Sie nur mithilfe des technischen Supports erstellen.
			</div>

			<h1 class="ui header">Video Feedback</h1>
			<div class="ui segment">
				<canvas id="video-feedback" width="100" height="20"></canvas>

				<form class="video-feedback-delete" role="form" method="POST" action="{{ action('SequenceController@deleteHelpPoints', ['name' => $seminar_name, 'lection_name' => $lection_name, 'sequence' => $sequence_id]) }}">

					{{ method_field('DELETE') }}

					{{ csrf_field() }}

					<button class="ui small red icon button" type="submit">
						Alle Werte löschen <i class="delete icon"></i>
					</button>

				</form>
			</div>

		</section>

	@endif

	@if( $available_all_authorized )

        <h1 class="ui header">{{ $section . ' – ' . $lection_name }}</h1>

		{{-- MEDIAPLAYER --}}
		<div class="one column row">
			<div class="column">

				{{-- Sequences Detection --}}
				@if ( $sequence_count > 1  )

					<div class="ui {{ $sequence_count_spelled }} top attached small steps">

					@foreach ($sequences as $sequence)

						<div class="step @if ( $sequence->position == $sequence_id ) active @endif">
							@if ( $sequence->video )
								<i class="video icon"></i>
							@endif
							<div class="content">
								<div class="title">
									<a href="{{ route('lection', ['name' => $seminar_name ,'lection_name' => $lection_name, 'sequence' => $sequence->position]) }}">
										{{ $sequence->name }}
									</a>
								</div>
							</div>
						</div>
					@endforeach

					</div>

				@endif

				{{-- Vue.js component including variables (props). --}}
				<interactive-video name="{{ $current_sequence->name }}" path="{{ $current_sequence->path }}" markers="{{ $markers }}" poster="{{ $poster_path }}" v-bind:notes="true"></interactive-video>

			</div>
		</div>

		{{-- DISQUS UMGEBUNG --}}
		@if ( $disqus )

			<div class="one column row">

				<div id="disqus_thread" class="column"></div>

			</div>

		@endif

		{{-- ADDITIONAL CONTENT --}}
		<section id="additional-content" class="two column row">

			<div class="column">

				<header>
					<h3 class="hide">Texte und Notizen</h3>
				</header>

				<a class="ui fluid labeled icon blue button track-event" data-type="Text" data-name="{{ $paper->name }}" href="{{ action('DownloadController@getFile', ['path' => $paper->path , 'name' => $paper->name]) }}"><i class="text file icon"></i> {{ $paper->author }}: {{ $paper->name }}</a>

			</div>
			<div class="column">

				<a class="ui fluid labeled icon blue button track-event" data-type="Notizen" data-name="{{ $seminar_name . ' – ' . $lection_name }}" href="{{ URL::current() . '/pdfnotes' }}">

					<i class="square write icon"></i> Notizen herunterladen

				</a>
			</div>

		</section>

	@else
		<div class="one column row">
			<div class="column">

				<div class="ui red message">
		            Die online-Lektion ist noch nicht verfügbar. Bitte wählen Sie eine verfügbare online-Lektion aus.
		        </div>

				@include('seminar.lections.index')

			</div>
		</div>

	@endif

</main>

{{-- @include ADMIN BACKEND --------------------------------------------------}}
@if( Seminar::authorizedEditor($seminar_name) )

    {{-- Load create and edit Modals --}}
    @include('seminar.modals')

@endif

@stop
