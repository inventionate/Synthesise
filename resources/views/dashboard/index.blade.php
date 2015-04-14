@extends('layouts.default')
@section('title')
	<title>EWM1 – Dashboard</title>
@stop

@section('content')
<main id="main-content-dashboard" class="ui stackable page grid">

	<div class="one column row">
	<div class="column">

		<h1 class="hide">Dashboard</h1>

		@if ( $role === 'Admin' )

			<section id="messages-manage"></section>

		@else

			@include('dashboard.partials.messages')

		@endif

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
</main>
@stop
