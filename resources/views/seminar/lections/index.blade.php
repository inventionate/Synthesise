<section id="all-lections" class="ui stackable grid">

	<div class="column">

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
							<th>Zugang</th>
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

									<div class="sub header">

										@foreach (Section::getAllAuthors($section->id) as $author )

											<span class="author">{{ $author }}</span>

										@endforeach

									</div>

								</div>

								<a class="ui small basic blue icon button track-event" data-type="Weiterführende Literatur" data-name="{{ $section->name }}" href="{{ action('DownloadController@getFile', ['path' => $section->further_reading_path , 'name' => 'Weiterführende Literatur: ' . $section->name]) }}">
									<i class="list icon"></i> Weiterführende Literatur
								</a>

								@if ( Seminar::authorizedEditor($seminar_name) )

									<button class="ui small teal icon button section-edit" data-id="{{ $section->id }}" data-name="{{ $section->name }}" data-filepath="{{
									substr($section->further_reading_path, 17) }}"><i class="edit icon"></i></button>

									<form class="section-delete" role="form" method="POST" action="{{ action('SectionController@destroy', ['id' => $section->id]) }}">

				                        {{ method_field('DELETE') }}

				                        {{ csrf_field() }}

				                        <button class="ui small teal icon button" type="submit">
				                            <i class="close icon"></i>
				                        </button>

				                    </form>

								@endif

							</td>

								@foreach ( Section::getAllLections($section->id) as $lection )

									@if ( !$loop->first ) <tr> @endif

									{{-- Lections info --}}
									<td class="online-lektion">
										@if ( $disqus )
											<div class="ui fluid labeled button @if( ! (Lection::available($lection->name, $seminar_name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) )) disabled @endif" tabindex="0">

												<a href="{{ route('lection', ['name' => $seminar_name, 'lection_name' => rawurlencode($lection->name), 'sequence' => 1]) }}" class="ui fluid left aligned basic button @if( Lection::available($lection->name, $seminar_name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) ) green @else red @endif">

													<i class="video icon"></i>

													{{ $lection->name }}</a>

												</a>

												<div class="ui left pointing label @if( Lection::available($lection->name, $seminar_name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) ) green @else red @endif">
													<span class="disqus-comment-count" data-disqus-identifier="{{ rawurlencode($lection->name) }}">0</span>
												</div>
											@else
												<a href="{{ route('lection', ['name' => $seminar_name, 'lection_name' => rawurlencode($lection->name), 'sequence' => 1]) }}" class="ui fluid left aligned basic button @if( Lection::available($lection->name, $seminar_name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) ) green @else disabled red @endif">

													<i class="video icon"></i>

													{{ $lection->name }}</a>

												</a>
											@endif

										</div>
									</td>

									{{-- Available date info --}}
									<td class="center aligned seminar-datum">
										{{ date('d.m.Y',strtotime($lection->pivot->available_from)) }} bis {{ date('d.m.Y',strtotime($lection->pivot->available_to)) }}
									</td>

									{{-- Material --}}
									<td class="center aligned materialien">
										<div class="ui icon small blue buttons">

											<div class="ui right pointing dropdown button">

												<i class="file text icon"></i>

												<div class="menu">
													<a class="item track-event"  data-type="Text" data-name=" {{ Lection::getPaper($lection->name)->name }}" href="{{ action('DownloadController@getFile', ['path' => Lection::getPaper($lection->name)->path , 'name' => Lection::getPaper($lection->name)->name]) }}">

														<small>{{ Lection::getPaper($lection->name)->author }}</small>
														<br>
														{{ Lection::getPaper($lection->name)->name }}
													</a>
												</div>
											</div>

											<a class="ui @if( ! (Lection::available($lection->name, $seminar_name) || Seminar::authorizedEditor($seminar_name) || Seminar::authorizedMentor($seminar_name) )) disabled @endif button track-event" data-type="Notizen" data-name="{{ $lection->name }}" href="{{ route('pdfnotes', ['name' => $seminar_name, 'lection_name' => $lection->name, 'sequence' => 1]) }}">

												<i class="write square icon"></i>

											</a>

										</div>
									</td>

									@if ( Seminar::authorizedEditor($seminar_name) )
										<td class="edit">

											{{-- Check if user is authorized editor. --}}

											@if ( in_array(Auth::user()->username, $lection->authorized_editors) )

												<button class="ui teal small icon button lection-edit" data-name="{{ $lection->name }}"
												data-author="{{ $lection->author }}"
												data-contact="{{ $lection->contact }}" data-section-id="{{ $section->id }}"
												data-text-path="{{ Lection::getPaper($lection->name)->path }}"
												data-text-name="{{ Lection::getPaper($lection->name)->name }}"
												data-text-author="{{ Lection::getPaper($lection->name)->author }}"
												data-image-path="{{ $lection->image_path }}" data-available-from="{{ $lection->pivot->available_from }}"
												data-available-to="{{ $lection->pivot->available_to }}"
												data-authorized-users="{{ json_encode($lection->authorized_editors) }}">
													<i class="edit icon"></i>

												</button>

											@endif

											<form class="lection-delete" role="form" method="POST" action="{{ action('LectionController@detach', ['name' => $lection->name, 'section_id' => $section->id]) }}">

						                        {{ method_field('DELETE') }}

						                        {{ csrf_field() }}

						                        <button class="ui small teal icon button" type="submit">
						                            <i class="close icon"></i>
						                        </button>

						                    </form>
										</td>
									@endif

									</tr>

								@endforeach

						</tr>
					@endforeach

				</tbody>
			</table>

		@endif

	</div>

</section>
