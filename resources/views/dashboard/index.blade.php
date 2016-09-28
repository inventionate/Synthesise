@extends('layouts.default')
@section('title')
	<title>e:t:p:M® – Dashboard</title>
@stop

@section('content')

<main id="main-content-dashboard" class="ui grid container">

<h1 class="hide">Dashboard</h1>

@if (count($errors) > 0)
<div class="ui error message">
	<div class="header">
		Fehler beim Erstellen eines Seminars!
	</div>
	<ul class="list">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="fourteen wide centered column">

	<h2 class="ui horizontal divider header">
	  <i class="university icon"></i>
	  Seminare
  </h2>

	@include('dashboard.partials.seminar.index')

	@if ( Auth::user()->role === 'Admin')

		<h2 class="ui horizontal divider header">
		  <i class="users icon"></i>
		  Administrator/innen
		</h2>

		@include('dashboard.partials.admin.index')

		<h2 id="system-settings" class="ui horizontal divider header">
		  <i class="settings icon"></i>
		  Allgemeine Einstellungen
		</h2>

		@include('dashboard.partials.settings')

		<h2 id="system-analytics" class="ui horizontal divider header">
		  <i class="bar chart icon"></i>
		  Analytics
		</h2>

		@include('dashboard.partials.analytics')

		<h2 id="support" class="ui horizontal divider header">
		  <i class="fire extinguisher icon"></i>
		  Support
		</h2>

		@include('dashboard.partials.support')

	@endif

</div>
</main>

@if ( Auth::user()->role === 'Admin')

	@include('dashboard.partials.seminar.create')

	@include('dashboard.partials.admin.create')
	@include('dashboard.partials.admin.edit')

@endif

@stop
