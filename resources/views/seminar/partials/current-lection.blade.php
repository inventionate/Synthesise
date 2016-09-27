<section id="current-lection" class="ui stackable grid">

	<div class="one column row">
        <div class="column">

			<h2 class="ui header">Aktuelle online-Lektion</h2>

			@if( $current_lection !== null)

				<div class="ui fluid card">
				    <div class="image">
						<img class="ui image" src="{{ $current_lection->image_path }}" alt="Titelbild online-Lektion"  class="img-responsive img-thumbnail">
				    </div>
					<div class="content">
						<div class="header">{{ $current_lection->name }} von {{ $current_lection->author }}</div>
						<div class="description">Die Bearbeitung der online-Lektion und der Literatur ist eine verpflichtende Arbeitsgrundlage für den Besuch der Mentoriate.</div>
					</div>

					<div class="ui three blue bottom attached buttons">
					  <a class="ui button" href="ROUTE">
					    <i class="play icon"></i>
					    Ansehen
					  </a>
					  <a class="ui button" data-name="{{ $current_lection->name }}" href="{{ action('LectionController@getNotesPDF', [$current_lection->name]) }}">
					    <i class="square write icon"></i>
					    Notizen
					  </a>
					  <div class="ui top right pointing dropdown button">
					    <i class="file text icon"></i>
					    Literatur
						<div class="menu">

							{{-- Die Trackingdata neu behandeln!!! --}}

							<a class="item" v-on:click="trackEvent('Text', '{{ $current_lection_paper->name }}')" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $current_lection_paper->name]) }}">{{ $current_lection_paper->author }}: {{ $current_lection_paper->name }}</a>
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
