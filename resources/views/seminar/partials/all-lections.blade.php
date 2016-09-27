<section id="all-lections" class="ui stackable grid">

	<div class="column">

		<h2 class="ui header">Ablaufplan</h2>

		<table class="ui structured table">
			<thead>
				<tr>
					<th>Themenbereich</th>

					<th>online-Lektion</th>

					@if($role === 'Student')
						<th>Zugänglich ab</th>
					@elseif($role === 'Teacher' || $role === 'Admin')
						<th>Studierendenzugang</th>
					@endif

					<th>Literatur & Notizen</th>

					@if($role === 'Teacher' || $role === 'Admin')
						<th>Editieren</th>
					@endif

				</tr>
			</thead>
			<tbody>

				@foreach ( $sections as $section )
					<tr>

						{{-- Section info --}}
						<td class="themenbereich" rowspan="{{ count( Section::getAllLections($section->name) ) }}">

							{{ $section->name }}

						</td>
						{{-- @TODO Mit Laravel 5.3 lässt sich das vereinfachen: $loop Variable! --}}
						<div class="hide">
							{{ $i = 0 }}
						</div>
						@foreach ( Section::getAllLections($section->name) as $lection  )

							@if ($i > 0) <tr> @endif

							{{-- Lections info --}}
							<td class="online-lektion">
								<div class="ui fluid labeled button @if( ! (Lection::available($lection->name) || $role === 'Teacher' || $role === 'Admin' )) disabled @endif" tabindex="0">

									<a href="{{ route('lektion', [rawurlencode($lection->name), 1]) }}" class="ui fluid left aligned basic button @if( Lection::available($lection->name) || $role === 'Teacher' || $role === 'Admin' ) green @else red @endif">

										<i class="video icon"></i>

										{{ $lection->name }}</a>

									</a>

									<a class="ui left pointing label @if( Lection::available($lection->name) || $role === 'Teacher' || $role === 'Admin' ) green @else red @endif">
										<span class="disqus-comment-count" data-disqus-identifier="{{ rawurlencode($lection->name) }}">0</span>
									</a>

								</div>
							</td>

							{{-- Available date info --}}
							<td class="seminar-datum">
								{{ date('d.m.Y',strtotime($lection->available_from)) }}
							</td>

							{{-- Material --}}
							<td class="materialien">
								<div class="ui icon small blue buttons">

									<div class="ui right pointing dropdown button">

										<i class="file text icon"></i>

										<div class="menu">
											<a class="item" v-on:click="trackEvent('Text', '{{ Lection::getPaper($lection->name)->name }}')" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => Lection::getPaper($lection->name)->name]) }}">

												<small>{{ Lection::getPaper($lection->name)->author }}</small>
												<br>
												{{ Lection::getPaper($lection->name)->name }}
											</a>
										</div>
									</div>

									<a class="ui @if( ! (Lection::available($lection->name) || $role === 'Teacher' || $role === 'Admin' )) disabled @endif button" v-on:click="trackEvent('Notizen', '{{ $lection->name }}')" href="{{ action('LectionController@getNotesPDF', [rawurlencode($lection->name)]) }}">

										<i class="write square icon"></i>

									</a>

									{{-- @TODO further_reading_path verwenden für den DownloadController!!! --}}

									<a class="ui button" v-on:click="trackEvent('Weiterführende Literaturhinweise', '{{ $section->name }}')" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $section->name]) }}">
										<i class="list icon"></i>
									</a>

								</div>
							</td>

							@if ( Auth::user()->role === 'Admin' )
								<td class="edit">
									<div class="ui teal small icon button" data-name="{{ $lection->name }}" data-author="{{ $lection->author }}" data-section="{{ $section->name }}" data-available="{{ $lection->available_from }}">

										<i class="edit icon"></i>

									</div>
								</td>
							@endif

							</tr>

							<div class="hide">
								{{ $i += 1  }}
							</div>
						@endforeach

					</tr>
				@endforeach

			</tbody>
		</table>

	</div>

</section>
