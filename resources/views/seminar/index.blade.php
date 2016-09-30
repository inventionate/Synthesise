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
				<h2 class="ui horizontal divider header">
					<i class="info circle icon"></i>
					Weiterführende Informationen
				</h2>
			</div>
		</div>

	@endif

	<div id="infoblocks" class="two column row">
		@include('seminar.infoblocks.index')
	</div>

</main>

	{{-- @include ADMIN BACKEND --------------------------------------------------}}
	@if( Seminar::authorizedEditor($seminar_name) )

		{{-- Load create and edit Modals --}}

		@include('seminar.general-infos.edit')

		@include('seminar.messages.create')

		@include('seminar.messages.edit')

		@include('seminar.infoblocks.create')

		@include('seminar.infoblocks.edit')

	@endif
@stop
