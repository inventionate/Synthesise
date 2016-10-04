@extends('layouts.default')

@section('title')
	<title>e:t:p:M® – {{{ $lection_name }}}</title>
@stop

@section('content')
<main id="main-content-seminar-lection" class="ui grid container vue">

	@if ( Seminar::authorizedEditor($seminar_name) )

		<div class="sixteen wide column">
			<div class="ui blue message">
				In der momentanen Version ist der Sequenz-Editor deaktiviert. Neue Video- oder Interaktionssequenzen können Sie nur mithilfe des technischen Supports erstellen.
			</div>
		</div>

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

				<a class="ui fluid labeled icon blue button" v-on:click="trackEvents('Text', '{{ $paper->name }}')" href="{{ action('DownloadController@getFile', ['path' => $paper->path , 'name' => $paper->name]) }}"><i class="text file icon"></i> {{ $paper->author }}: {{ $paper->name }}</a>

			</div>
			<div class="column">

				<a class="ui fluid labeled icon blue button" v-on:click="trackEvents()" href="{{ route('pdfnotes', ['name' => $seminar_name, 'lection_name' => $lection_name, 'sequence' => $sequence_id]) }}"><i class="square write icon"></i> Notizen herunterladen</a>
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
