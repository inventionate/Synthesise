<section id="current-lection" class="ui stackable grid">

	<div class="one column row">
        <div class="column">

			<h2 class="ui header">Aktuelle online-Lektion</h2>

@if($available)

		<div class="ui fluid card">
		    <div class="image">
				<img class="ui image" src="{{ 'img/'. Parser::normalizeName($videoname) . '.jpg' }}" alt="Titelbild online-Lektion"  class="img-responsive img-thumbnail">
		    </div>
			<div class="content">
				<div class="header">{{ $videoname }} von {{ $author }}</div>
				<div class="description">Die Bearbeitung der online-Lektion und der Literatur ist eine verpflichtende Arbeitsgrundlage für den Besuch der Mentoriate.</div>
			</div>

			<div class="ui three blue bottom attached buttons">
			  <a class="ui button" href="{{ route('lektion', [$videoname, 1]) }}">
			    <i class="play icon"></i>
			    Ansehen
			  </a>
			  <a class="ui button" data-name="{{ $videoname }}" href="{{ action('LectionController@getNotesPDF', [$videoname]) }}">
			    <i class="square write icon"></i>
			    Notizen
			  </a>
			  <div class="ui top right pointing dropdown button">
			    <i class="file text icon"></i>
			    Literatur
				<div class="menu">
					@foreach ($papers as $paper)
						<a class="item" v-on:click="trackEvent('Text', '{{ $paper->papername }}')" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $paper->papername]) }}">{{ $paper->author }}: {{ $paper->papername }}</a>
					@endforeach
				</div>
			  </div>
			</div>

		  </div>

@else

	<div class="ui warning message">Keine online-Lektion verfügbar.</div>

@endif


	</div>
</div>

</section>
