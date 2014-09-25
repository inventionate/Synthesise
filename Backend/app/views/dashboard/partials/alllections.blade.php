{{-- WIDGET FÜR DIE ÜBERSICHT ALLR ONLINE LEKTIONEN --}}
{{-- @todo Dynamisch aus Datenbank erzeugen (momentan ist es noch zu statisch, siehe Lektionsgruppen) --}}

<section>
	<h2>Ablaufplan</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Themenbereich</th>
				<th>online-Lektion</th>
				@if($role === 'Student')
					<th>Zugänglich ab</th>
					{{--<th>Status</th>--}}
				@elseif($role === 'Teacher')
					<th>Studierendenzugang</th>
					{{--<th>Status für die Studierende</th>--}}
				@endif
				<th>Literatur & Notizen</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($videos as $video)
			<tr>
				{{-- THEMENBEREICH --}}
				@if($video->videoname === 'Griechisch-römische Antike')
					<td rowspan="3" class="themenbereich">
						{{ $video->section .'<br><small>'.$video->author.'</small>'}}
						{{--<a class="btn btn-default btn-xs" href="{{ asset('pdf/literatur_' . Parser::normalizeName($video->section)) . '.pdf' }}">Literaturhinweise</a>--}}
					</td>
				@endif
				@if($video->videoname === 'Jean-Jacques Rousseau')
					<td rowspan="3" class="themenbereich">
						{{ $video->section .'<br><small>'.$video->author.' und Prof. Dr. Gabriele Weigand</small>' }}

				@endif
				@if($video->videoname === 'Erziehung und Unterricht')
					<td rowspan="2" class="themenbereich">
						{{ $video->section .'<br><small>'.$video->author.'</small>' }}

				@endif
				@if($video->videoname === 'Wozu ist die Bildung da?')
					<td rowspan="3" class="themenbereich">
						{{ $video->section .'<br><small>'.$video->author.'</small>' }}
					</td>
				@endif

				{{-- ONLINE-LEKTION --}}
				@if( Video::available($video->videoname) || $role === 'Teacher' && $video->online)
				<td class="online-lektion">
					<span class="label label-success"><span class="glyphicon glyphicon-eye-open"></span></span>
					<a class="green" href="{{ route('lektion', rawurlencode($video->videoname)) }}">{{ $video->videoname }}</a>
				</td>
				@else
				<td class="online-lektion">
					<span class="label label-danger"><span class="glyphicon glyphicon-eye-close"></span></span>
					<a class="red" href="{{ route('lektion', rawurlencode($video->videoname)) }}">{{ $video->videoname }}</a>
				</td>
				@endif

				{{-- ZUGÄNGLICHKEITSDATUM --}}
				<td class="seminar-datum">{{ date('d.m.Y',strtotime($video->available_from)) }}</td>

				{{-- MATERIALIEN --}}
				<td class="materialien">
				  <div class="btn-group">
				  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
					herunterladen <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu pull-right" role="menu">
					@foreach (Video::getPapers($video->videoname) as $paper)

					<li><a href="{{ action('DownloadController@getFile', array('type' => 'pdf' , 'file' => str_replace(':','', $paper->papername ))) }}" onclick="javascript:_paq.push(['trackEvent', 'Text', 'Downloaded', '{{ $paper->papername }}'])" data-no-turbolink><small>{{ $paper->author }}</small><br> {{ $paper->papername }} <span class="glyphicon glyphicon-align-justify"></span></a></li>
					@endforeach

					@if( Video::available($video->videoname) || $role === 'Teacher' && $video->online)
					<li class="divider"></li>
					<li><a href="{{ action('LectionController@getNotesPDF', rawurlencode($video->videoname)) }}" onclick="javascript:_paq.push(['trackEvent', 'Notizen', 'Downloaded', '{{ $video->videoname }}'])" data-no-turbolink>Notizen herunterladen <span class="glyphicon glyphicon-pencil"></span></a></li>
					@endif
					<li class="divider"></li>

					<li><a href="{{ action('DownloadController@getFile', array('type' => 'pdf' , 'file' => $video->section)) }}" onclick="javascript:_paq.push(['trackEvent', 'Weiterführende Literaturhinweise', 'Downloaded', '{{ $video->section }}'])" data-no-turbolink><small>Weiterführende Literaturhinweise <span class="glyphicon glyphicon-book"></span></small></a></li>

				  </ul>
				  </div>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</section>
