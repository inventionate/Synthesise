@extends('layouts.default') 
@section('meta')
@parent 
<title>Erziehungswissenschaftliche Grundfragen – Dashboard</title>
@stop 

@section('content') 

<h1 class="visible-print-block">Dashboard</h1>

@if($role === 'Teacher')
<div class="alert alert-info">Sie haben erweiterte Benutzerrechte und können die online-Lektionen bereits früher verwenden.</div>
@endif


<div class="row">
	<div class="col-lg-6">
		@include('widgets.currentlection')
	</div>
	<div class="col-lg-6">
		<!-- @inc lude('widget.generalinfo') -->
	</div>	
</div>
<div class="clearfix visible-lg"></div>
<div class="row">
	<div class="col-lg-12">
		<!-- @inc lude('lection.summary') -->
	</div>
</div>
<div class="clearfix visible-lg"></div>

@stop

  {{-- Piwik Benutzerdefinierte Variablen definieren um den Status abzufragen --}}
  {{-- Es wäre auch möglich den konkreten Nutzernamen zu erfragen um ihn für die Evaluation zu verwenden. Das ist allerdings ethisch bedenklich. --}}

@section('scripts')

@parent

{{-- Piwik Implementierung--}}
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
{{-- End Piwik Code --}}

@stop