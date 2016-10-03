@extends('layouts.default')

@section('title')
	<title>e:t:p:M® – {{{ $lection_name }}}</title>
@stop

@section('content')
<main id="main-content-seminar-lections" class="ui stackable page grid vue">

	@if( $available )

        <h1 class="ui header">{{ $section . ' – ' . $lection_name }}</h1>




	@else
		<div class="ui negative message">
            Die online-Lektion ist noch nicht verfügbar. Bitte wählen Sie eine verfügbare online-Lektion aus.
        </div>
    	{{-- @include('seminar.lections.index') --}}
	@endif

</main>
@stop
