@extends('layouts.default')
@section('title')
	<title>e:t:p:M® – Seminar</title>
@stop

@section('content')

<main id="main-content-seminar" class="ui container grid">

	<h1 class="hide">Seminar Dashboard</h1>

	<div class="one column row">
		<div class="column">

			@include('seminar.messages.index')

		</div>
	</div>

	@if ( count($messages) !== 0  )
		<div class="ui section divider"></div>
	@endif

	<div class="two column row">
		<div class="column">
			@include('seminar.partials.current-lection')
		</div>
		<section class="column">
			@include('seminar.partials.general-info')
		</section>
	</div>

	<div class="one column row">
		<div class="column">
			@include('seminar.partials.all-lections')
		</div>
	</div>

	<div class="one column row">
		<div class="column">
			<h2 class="ui horizontal divider header">
				<i class="info circle icon"></i>
				Weiterführende Informationen
			</h2>
		</div>
	</div>

	<div class="two column row">
		@include('seminar.partials.additional-infos')
	</div>

</main>

	{{-- @include ADMIN BACKEND --------------------------------------------------}}
	@if( Seminar::authorizedEditor($seminar_name) )

		{{-- Load create and edit Modals --}}

		@include('seminar.messages.create')

		@include('seminar.messages.edit')

	@endif
@stop
