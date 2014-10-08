@extends('layouts.default')
@section('title')
	<title>EWM1 – Dashboard</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="container animated fadeIn">

	<h1 class="visible-print-block">Dashboard</h1>

	@if ( $role === 'Admin' )

		@include('dashboard.partials.messages-manage')

	@else

		@include('dashboard.partials.messages')

	@endif

	<div class="row">
		<div class="col-lg-6">
			@include('dashboard.partials.current-lection')
		</div>
		<section class="col-lg-6">
			@include('dashboard.partials.general-info')
		</section>
	</div>
	<div class="clearfix visible-lg"></div>
	<div class="row">
		<div class="col-lg-12">
			@include('dashboard.partials.all-lections')
		</div>
	</div>
	<div class="clearfix visible-lg"></div>
</main>
@stop
