@extends('layouts.default')

@section('title')
  <title>Informationen über das e:t:p:M® Konzept</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui stackable page grid">
    <!-- Besser mit Segmenten arbeiten  -->
    <div class="one column row">
    	<div class="column">
            {{-- An dieser Stelle das Logo anzeigen --}}
            <h1 class="ui header">Informationen über das e:t:p:M® Konzept</h1>

            <!-- eLearning inkl. Demovideoschnipsel einstellen als Segment  -->

        </div>
    </div>

</main>
@stop
