{{-- @todo Dynamisch aus Datenbank erzeugen (momentan ist es noch zu statisch, siehe Lektionsgruppen) --}}

<section id="all-lections" class="ui stackable grid">

	<div class="column">

		<h2 class="ui header">Ablaufplan</h2>

		<table class="ui table">
			<thead>
				<tr>
					<th>Themenbereich</th>
					<th>online-Lektion</th>
					@if($role === 'Student')
						<th>Zugänglich ab</th>
						{{--<th>Status</th>--}}
					@elseif($role === 'Teacher' || $role === 'Admin')
						<th>Studierendenzugang</th>
						{{--<th>Status für die Studierende</th>--}}
					@endif
					<th>Literatur & Notizen</th>
					<th>Editieren</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($videos as $video)
					<tr>
						{{-- THEMENBEREICH --}}
						@if($video->videoname === 'Griechisch-römische Antike')
							<td class="themenbereich" rowspan="3">
								{!! $video->section .'<br><small>'.$video->author.'</small>' !!}
							</td>
						@endif
						@if($video->videoname === 'Jean-Jacques Rousseau')
							<td class="themenbereich" rowspan="3">
								{!! $video->section .'<br><small>'.$video->author.' und Prof. Dr. Gabriele Weigand</small>' !!}

						@endif
						@if($video->videoname === 'Erziehung und Unterricht')
							<td class="themenbereich" rowspan="2">
								{!! $video->section .'<br><small>'.$video->author.'</small>' !!}

						@endif
						@if($video->videoname === 'Wozu ist die Bildung da?')
							<td class="themenbereich" rowspan="3">
								{!! $video->section .'<br><small>'.$video->author.'</small>' !!}
							</td>
						@endif

						{{-- ONLINE-LEKTION --}}
						@if( Video::available($video->videoname) || $role === 'Teacher' || $role === 'Admin' && $video->online)
						<td class="online-lektion">
							<div class="ui green empty circular label"></div>
							<a class="green" href="{{ route('lektion', [rawurlencode($video->videoname)]) }}">{{ $video->videoname }}</a>
						</td>
						@else
						<td class="online-lektion">
							<div class="ui red empty circular label"></div>
							<a class="red" href="{{ route('lektion', [rawurlencode($video->videoname)]) }}">{{ $video->videoname }}</a>
						</td>
						@endif

						{{-- ZUGÄNGLICHKEITSDATUM --}}
						<td class="seminar-datum">{{ date('d.m.Y',strtotime($video->available_from)) }}</td>

						{{-- MATERIALIEN --}}
						<td class="materialien">

							<div class="ui icon small blue buttons">
							  <div class="ui right pointing dropdown button"><i class="file text icon"></i>
								<div class="menu">
									@foreach (Video::getPapers($video->videoname) as $paper)
										<a class="item download-paper" data-name="{{ $paper->papername }}" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $paper->papername]) }}"><small>{{ $paper->author }}</small><br> {{ $paper->papername }}</a>
									@endforeach
								</div>
							  </div>
							  <a class="ui @if( ! (Video::available($video->videoname) || $role === 'Teacher' || $role === 'Admin' && $video->online  )) disabled @endif button download-note" data-name="{{ $video->videoname }}" href="{{ action('LectionController@getNotesPDF', [rawurlencode($video->videoname)]) }}"><i class="write square icon"></i></a>
							  <a class="ui button download-further-literature" data-name="{{ $video->section }}" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $video->section]) }}"><i class="list icon"></i></a>
							</div>

						</td>

						<td class="edit">
							@if ( Auth::user()->role === 'Admin' )
				                <div class="ui teal small icon button" data-name="{{ $video->videoname }}" data-lecturer="{{ $video->author }}" data-section="{{ $video->section }}">
				                    <i class="edit icon"></i>
								</div>
				            @endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>

</section>

<div id="edit-lection" class="ui modal">
	<div class="header">
		online-Lektion bearbeiten
	</div>
	<div class="content">
		<div class="ui form">

			<div class="disabled field">
				<label>Name</label>
				<input id="edit-lection-name"  placeholder="" disabled="disabled" type="text">
			</div>

			<div class="disabled field">
				<label>Themenbereich</label>
				<input id="edit-lection-section"  placeholder="" disabled="disabled" type="text">
			</div>

			<div class="disabled field">
				<label>Dozent/in</label>
				<input id="edit-lection-lecturer"  placeholder="" disabled="disabled" type="text">
			</div>

			<div class="field">
				<input id="edit-lection-available" type="date" name="available" max="1979-12-31" min="2000-01-02">
			</div>


		</div>
	</div>
	<div class="actions">
		<div class="ui black button">
			Abbrechen
		</div>
		<div class="ui positive right labeled icon button">
			Aktualisieren
			<i class="checkmark icon"></i>
		</div>
	</div>
</div>
