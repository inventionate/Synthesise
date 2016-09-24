@extends('layouts.default')
@section('title')
	<title>e:t:p:M® – Dashboard</title>
@stop

@section('content')

<main id="main-content-dashboard" class="ui grid container">

<h1 class="hide">Dashboard</h1>

<div class="fourteen wide centered column">

	<h2 class="ui horizontal divider header">
	  <i class="university icon"></i>
	  Seminare
  </h2>

	@include('dashboard.partials.seminars')

	@if ( Auth::user()->role === 'Admin')

		<h2 class="ui horizontal divider header">
		  <i class="users icon"></i>
		  Administrator/innen
		</h2>

		@include('dashboard.partials.admins.index')

		<h2 id="system-settings" class="ui horizontal divider header">
		  <i class="settings icon"></i>
		  Allgemeine Einstellungen
		</h2>

		Hier kann man allgemeine Systemeinstellungen vornehmen

		- Datenbankverbindung
		- LDAP Einstellungen
		- Speichereinstellungen

		Im Prinzip alles, was über das ENV-File konfiguriert werden kann.

		Außerdem sollten Updates möglich sein.

		<h2 id="system-analytics" class="ui horizontal divider header">
		  <i class="bar chart icon"></i>
		  Analytics
		</h2>

		Hier kann man eine Verbindung zu Piwik aktivieren!

	@endif

</div>
</main>

@if ( Auth::user()->role === 'Admin')

	@include('dashboard.partials.admins.create')
	@include('dashboard.partials.admins.edit')

@endif

@stop
