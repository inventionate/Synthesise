@extends('layouts.default')
@section('title')
	<title>EWM1 – Dashboard</title>
@stop

@section('content')
<section id="main-content-{{ Request::segment(1) }}" class="change-fade container">

	<h1 class="visible-print-block">Dashboard</h1>

	@if($role === 'Teacher')
	<div class="alert alert-info">Sie haben erweiterte Benutzerrechte und können die online-Lektionen bereits früher verwenden.</div>
	@endif

	<div class="row">
		<div class="col-lg-6">
			@include('dashboard.partials.currentlection')
		</div>
		<section class="col-lg-6">
			@include('dashboard.partials.generalinfo')
		</section>
	</div>
	<div class="clearfix visible-lg"></div>
	<div class="row">
		<div class="col-lg-12">
			@include('dashboard.partials.alllections')
		</div>
	</div>
	<div class="clearfix visible-lg"></div>
</section>
@stop
