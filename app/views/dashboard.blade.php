@extends('layouts.default') 
@section('meta')
@parent 
<title>Erziehungswissenschaftliche Grundfragen – Dashboard</title>
@stop 

@section('body') 

<h1 class="visible-print">Dashboard</h1>

{{--<div class="alert alert-warning">Bei dieser Version handelt es sich um den <strong>GM 1</strong> der <span class="etpM">e:t:p:M</span> Web-App. Es sind noch nicht alle Inhalte integriert und ggf. können Fehler auftreten</a>.</div>--}}

{{--@if(Auth::guest())
<div class="alert alert-danger">Sie sind nicht angemeldet! Bitte <a class="alert-link" href="{{ url('login') }}"> melden Sie sich an</a>.</div>
@else
<div class="alert alert-success">Willkommen, {{ $username }}! Sie haben sich erfolgreich angemeldet. Auf dieser Seite finden Sie alle Informationen und Materialien zu der Veranstaltung »Erziehungswissenschaftliche Grundfragen pädagogischen Denken und Handelns«.</div>
@endif
--}}

{{--
<div class="alert alert-info">
<b>Wir wünschen Ihnen eine erfolgreiche Klausur und eine erholsame vorlesungsfreie Zeit!</b> Die Raumzuteilung finden Sie im Glaskasten in Gebäude 3 (Erdgeschoss).
</div>
--}}


@if($role === 'Teacher')
<div class="alert alert-info">Sie haben erweiterte Benutzerrechte und können die online-Lektionen bereits früher verwenden.</div>
@endif


<div class="row">
	<div class="col-lg-6">
		<!-- @incl ude('lection.current') -->
	</div>
	<div class="col-lg-6">
		<!-- @incl ude('widget.generalinfo') -->
	</div>	
</div>
<div class="clearfix visible-lg"></div>
<div class="row">
	<div class="col-lg-12">
		<!-- @incl ude('lection.summary') -->
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