@extends('layouts.default')
@section('title')
	<title>EW M1 – Dashboard</title>
@stop

@section('scripts')
@parent

{{-- Piwik Benutzerdefinierte Variablen definieren um den Status abzufragen --}}
<script type="text/javascript">
var _paq = _paq || [];
@if($role === 'Teacher')
	_paq.push(["setCustomVariable", 2, "Status", "MentorIn", "visit"]);
	_paq.push(["setCustomVariable", 3, "Status", "DozentIn", "visit"]);
@else
	_paq.push(["setCustomVariable", 1, "Status", "StudentIn", "visit"]);
@endif
</script>
<noscript><p><img src="http://home.ph-karlsruhe.de/etpM/analytics/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>

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
