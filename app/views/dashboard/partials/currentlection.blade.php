<section id="current-lection">
<h2>Aktuelle online-Lektion</h2>

<h3>{{ $videoname }} <small> {{ $author }}</small></h3>

@if($available)
<div class="row">
	  <div class="col-md-8">
		<img src="{{ Asset::rev('img/' . Parser::normalizeName($videoname) . '.jpg') }}" alt="Titelbild online-Lektion"  class="img-responsive img-thumbnail">
		</div>
	  <div class="col-md-4">
		<div class="btn-group-vertical btn-block">
			{{-- LEKTION ÖFFNEN --}}
			<a href="{{ route('lektion', $videoname) }}" class="btn btn-primary">Öffnen</a>

			<a class="btn btn-primary" class="download-note" data-name="{{ $videoname }}" href="{{ action('LectionController@getNotesPDF', $videoname) }}" data-no-turbolink>Notizen <span class="glyphicon glyphicon-pencil"></span></a>
		</div>
		{{-- MATERIALIEN DOWNLOADEN --}}
		  <button type="button" class="btn btn-warning dropdown-toggle btn-block" data-toggle="dropdown">
			Literatur <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu">
		  @foreach ($papers as $paper)
		  	<li><a class="download-paper" data-name="{{ $paper->papername }}" href="{{ action('DownloadController@getFile', array('type' => 'pdf' , 'file' => $paper->papername)) }}" data-no-turbolink>{{ $paper->author }}: {{ $paper->papername }} <span class="glyphicon glyphicon-align-justify"></span></a></li>
		  @endforeach
		  </ul>
	  </div>

	  <div class="clear"></div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-warning">Die Bearbeitung der Literatur ist eine verpflichtende Arbeitsgrundlage für den Besuch der Mentoriate.</div>
		</div>
	</div>
@endif

</section>
