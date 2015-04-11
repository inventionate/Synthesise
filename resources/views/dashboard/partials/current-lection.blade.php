<section id="current-lection" class="ui stackable grid">

<h2 class="ui header">Aktuelle online-Lektion</h2>

<h3 class="ui header">{{ $videoname }} <small> {{ $author }}</small></h3>

@if($available)

	<div class="two column row">

		<div class="eleven wide column">
			<img class="ui image" src="{{ 'img/'. Parser::normalizeName($videoname) . '.jpg' }}" alt="Titelbild online-Lektion"  class="img-responsive img-thumbnail">
		</div>

		<div class="five wide column">

			<div class="ui vertical labeled blue fluid icon buttons">
			  <a class="ui button" href="{{ route('lektion', [$videoname]) }}">
			    <i class="play icon"></i>
			    Öffnen
			  </a>
			  <a class="ui button" data-name="{{ $videoname }}" href="{{ action('LectionController@getNotesPDF', [$videoname]) }}">
			    <i class="square write icon"></i>
			    Notizen
			  </a>
			  <div class="ui top right pointing dropdown button">
			    <i class="list icon"></i>
			    Literatur
				<div class="menu">
					@foreach ($papers as $paper)
						<a class="item download-paper" data-name="{{ $paper->papername }}" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $paper->papername]) }}">{{ $paper->author }}: {{ $paper->papername }} <span class="glyphicon glyphicon-align-justify"></span></a>
					@endforeach
				</div>
			  </div>
			</div>

		</div>

	</div>

	<div class="row">

		<div class="column">
			<div class="ui warning message">Die Bearbeitung der online-Lektion und der Literatur ist eine verpflichtende Arbeitsgrundlage für den Besuch der Mentoriate.</div>
		</div>

	</div>

@endif
</section>
