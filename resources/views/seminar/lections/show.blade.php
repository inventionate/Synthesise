@extends('layouts.default')

@section('title')
	<title>e:t:p:M® – {{{ $lection_name }}}</title>
@stop

@section('content')
<main id="main-content-seminar-lection" class="ui grid container vue">

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

				{{ $poster_path }}

				{{-- Vue.js component including variables (props). --}}
				<interactive-video name="{{ $current_sequence->name }}" path="{{ $current_sequence->path }}" cuepoints="{{ $markers }}" poster="{{ $poster_path }}" v-bind:notes="true"></interactive-video>

			</div>
		</div>

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
