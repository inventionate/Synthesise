@extends('layouts.default')
@section('title')
	<title>e:t:p:M® – Seminar</title>
@stop

@section('content')

<main id="main-content-seminar" class="ui grid container">

	<h1 class="hide">Seminar Dashboard</h1>

	<div class="one column row">
		<div class="column">

			{{-- Admin seminar infomrations. --}}
			@if( Seminar::authorizedEditor($seminar_name) && $available )

				<div class="ui green floating message">
    				<p>Die Studierenden können auf die Seminarinhalte zugreifen. Bisher habe Sie {{ count($mentors) }} Mentoren und {{ count($students) }} Studierende eingetragen. Insgesamt konnten bislang {{ $verified_users_count }} Benutzer verifiziert werden.</p>
				</div>

			@elseif( Seminar::authorizedEditor($seminar_name) )

				<div class="ui red floating message">
    				<p>Bisher haben die Studierenden keinen Zugriff auf die Seminarinhalte. Definieren Sie einen entsprechenden Zeitraum in den <a class="ui teal" href="{{ route( 'seminar-settings', ['name' => $seminar_name] ) }}">Seminareinstellungen</a>. Sie haben momentan {{ count($teachers) }} Mentoren und {{ count($students) }} Studierende eingetragen. Fügen Sie weitere Personen mit der <a class="ui teal" href="{{ route( 'seminar-users', ['name' => $seminar_name] ) }}">Teilnehmerverwaltung</a> hinzu.</p>
				</div>

			@endif

			@include('seminar.messages.index')

		</div>
	</div>

	@if ( count($messages) !== 0  )
		<div class="ui section divider"></div>
	@endif

	<div class="stackable two column row">
		<div class="stackable column">
			@include('seminar.lections.current')
		</div>
		<section class="column">
			@include('seminar.general-infos.index')
		</section>
	</div>

	<div class="one column row">
		<div class="column">
			@include('seminar.lections.index')
		</div>
	</div>

	@if ( count($infoblocks) !== 0 )

		<div class="one column row">
			<div class="column">
				<h2 id="infoblocks" class="ui horizontal divider header">
					<i class="info circle icon"></i>
					Weiterführende Informationen
				</h2>
			</div>
		</div>

	@endif

	<div id="infoblocks" class="stackable two column row">
		@include('seminar.infoblocks.index')
	</div>

</main>

	{{-- @include ADMIN BACKEND --------------------------------------------------}}
	@if( Seminar::authorizedEditor($seminar_name) )

		@include('seminar.general-infos.edit')

		@include('seminar.modals')

	@endif
@stop
