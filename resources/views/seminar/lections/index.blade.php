<section id="all-lections" class="ui stackable grid">

	<div class="column">

{{-- Bearbeiten der lektion nur dann, wenn man autorisiert ist!!! --}}

		<h2 class="ui header">Ablaufplan</h2>

		@if ( count($sections) === 0 )
			<div class="ui warning message">
				Bisher wurden keine Themenbereiche erstellt und keine online-Lektionen zugewiesen. Bitte erstellen Sie einen neuen Themenbereich und eine neue online-Lektion. Klicken sie hierzu auf »Neuer Themenbereich« im Administrationsmenü.
			</div>
		@else

			@if ( count($lections) === 0 )

				<div class="ui warning message">
					Bisher haben Sie keine online-Lektionen hinzugefügt. Klicken Sie hierzu auf »Neue oder vorhandene online-Lektion« im Administrationsmenü.
				</div>

			@endif

			<table class="ui stackable table">
				<thead>
					<tr>
						<th>Themenbereich</th>

						<th>online-Lektion</th>

						@if( Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) )
							<th>Studierendenzugang</th>
						@else
							<th>Zugänglich ab</th>
						@endif

						<th>Literatur & Notizen</th>

						@if( Seminar::authorizedEditor($seminar_name) )
							<th>Editieren</th>
						@endif

					</tr>
				</thead>
				<tbody>

					@foreach ( $sections as $section )
						<tr>

							{{-- Section info --}}
							<td class="themenbereich" rowspan="{{ count( Section::getAllLections($section->id) ) }}">

								<div class="ui small header">
									{{ $section->name }}
								</div>

								{{-- @TODO further_reading_path verwenden für den DownloadController!!! --}}

								<a class="ui small basic blue icon button" href="{{ action('DownloadController@getFile', ['type' => 'pdf' , 'file' => $section->name]) }}">
									<i class="list icon"></i> Weiterführende Literatur
								</a>

								@if ( Seminar::authorizedEditor($seminar_name) )

									<button class="ui small teal icon button section-edit" data-id="{{ $section->id }}" data-name="{{ $section->name }}" data-filepath="{{
									substr($section->further_reading_path, 17) }}"><i class="edit icon"></i></button>

									<form id="section-delete" class="section-delete" role="form" method="POST" action="{{ action('SectionController@destroy', ['id' => $section->id]) }}">

				                        {{ method_field('DELETE') }}

				                        {{ csrf_field() }}

				                        <button class="ui small teal icon button" type="submit">
				                            <i class="close icon"></i>
				                        </button>

				                    </form>

								@endif

							</td>
							{{-- @TODO Mit Laravel 5.3 lässt sich das vereinfachen: $loop Variable! --}}
							<div class="hide">
								{{ $i = 0 }}
							</div>

								@foreach ( Section::getAllLections($section->id) as $lection )

									@if ($i > 0) <tr> @endif

									{{-- Lections info --}}
									<td class="online-lektion">
										@if ( $disqus )
											<div class="ui fluid labeled button @if( ! (Lection::available($lection->name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) )) disabled @endif" tabindex="0">

												<a href="{{ route('lektion', [rawurlencode($lection->name), 1]) }}" class="ui fluid left aligned basic button @if( Lection::available($lection->name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) ) green @else red @endif">

													<i class="video icon"></i>

													{{ $lection->name }}</a>

												</a>

												<div class="ui left pointing label @if( Lection::available($lection->name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) ) green @else red @endif">
													<span class="disqus-comment-count" data-disqus-identifier="{{ rawurlencode($lection->name) }}">0</span>
												</div>
											@else

												<a href="{{ route('lektion', [rawurlencode($lection->name), 1]) }}" class="ui fluid left aligned basic button @if( Lection::available($lection->name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) ) green @else disabled red @endif">

													<i class="video icon"></i>

													{{ $lection->name }}</a>

												</a>

											@endif

										</div>
									</td>

									{{-- Available date info --}}
									<td class="center aligned seminar-datum">
										{{ date('d.m.Y',strtotime($lection->available_from)) }}
									</td>

									{{-- Material --}}
									<td class="center aligned materialien">
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

											<a class="ui @if( ! (Lection::available($lection->name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) )) disabled @endif button" v-on:click="trackEvent('Notizen', '{{ $lection->name }}')" href="{{ action('LectionController@getNotesPDF', [rawurlencode($lection->name)]) }}">

												<i class="write square icon"></i>

											</a>

										</div>
									</td>

									@if ( Seminar::authorizedEditor($seminar_name) )
										<td class="edit">
											<button class="ui teal small icon button" data-name="{{ $lection->name }}" data-author="{{ $lection->author }}" data-section="{{ $section->name }}" data-available="{{ $lection->available_from }}">

												<i class="edit icon"></i>

											</button>

											<button class="ui teal small icon button" data-name="{{ $lection->name }}" data-author="{{ $lection->author }}" data-section="{{ $section->name }}" data-available="{{ $lection->available_from }}">

												<i class="close icon"></i>

											</button>
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

		@endif

	</div>

</section>
