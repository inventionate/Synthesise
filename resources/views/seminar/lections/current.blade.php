<section id="current-lection" class="ui stackable grid">

	<div class="one column row">
        <div class="column">

			<h2 class="ui header">Aktuelle online-Lektion</h2>

			@if( $current_lection !== null)

				<div class="ui fluid card">
				    <div class="image">
						<img class="ui image" src="{{ Storage::url( $current_lection->image_path ) }}" alt="Titelbild online-Lektion"  class="img-responsive img-thumbnail">
				    </div>
					<div class="content">
						<div class="header">»{{ $current_lection->name }}« von {{ $current_lection->author }}</div>
						<div class="description">Die Bearbeitung der online-Lektion und der Literatur ist eine verpflichtende Arbeitsgrundlage für den Besuch der Mentoriate.</div>
					</div>

					<div class="ui three blue bottom attached buttons">
					  <a class="ui button" href="{{  URL::current() . '/lections/' . rawurlencode($current_lection->name) . '/1/' }}">
					    <i class="play icon"></i>
					    Ansehen
					  </a>
					  <a class="ui button track-event" data-type="Notizen" data-name="{{ $seminar_name . ' – ' . $current_lection->name }}" href="{{ URL::current() . '/lections/' . rawurlencode($current_lection->name) . '/1/pdfnotes' }}">
					    <i class="square write icon"></i>
					    Notizen
					  </a>
					  <div class="ui top right pointing dropdown button">
					    <i class="file text icon"></i>
					    Literatur
						<div class="menu">
							<a class="item track-event" data-type="Text" data-name="{{ $current_lection_paper->name }}" href="{{ action('DownloadController@getFile', ['path' => $current_lection_paper->path , 'name' => $current_lection_paper->name]) }}">{{ $current_lection_paper->author }}: {{ $current_lection_paper->name }}</a>
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
