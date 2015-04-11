@extends('layouts.default')
@section('title')
	<title>EWM1 – Dashboard</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui stackable page grid">

	<h1 class="hide">Dashboard</h1>

	@if ( $role === 'Admin' )

		@include('dashboard.partials.messages-manage')

	@else

		@include('dashboard.partials.messages')

	@endif

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
