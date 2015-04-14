@extends('layouts.default')
@section('title')
	<title>EWM1 – Dashboard</title>
@stop

@section('content')
<main id="main-content-dashboard" class="ui stackable page grid">

	<div class="one column row">
	<div class="column">

		<h1 class="hide">Dashboard</h1>

		@if ( $role === 'Admin' )

			<!-- <section id="messages-manage"></section> -->
			<section id="messages-manage">

			<div class="ui top attached segment">
			<div class="ui warning message">
				<i class="close icon"></i>
				<i class="edit icon"></i>
				<div class="header">
					You must register before you can do that!
				</div>
				Visit our registration page, then try again
			</div>

			<div class="ui divider"></div>

			<div class="ui info message">
				<i class="close icon"></i>
				<i class="edit icon"></i>
				<div class="header">
					You must register before you can do that!
				</div>
				Visit our registration page, then try again
			</div>
			</div>

	        <div id="new-message" class="ui active modal">
	              <div class="header">
	                Neue Nachricht
	              </div>
	              <div class="content">

					<div class="ui form">
						<div class="required field">
							<label class="hide">Text</label>
							<textarea></textarea>
						</div>

						<div class="inline fields">
						<label for="colour">Hintergrundfarbe wählen:</label>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" checked="" type="radio">
							<label>Schwarz</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" type="radio">
							<label>Gelb</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" type="radio">
							<label>Grün</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" type="radio">
							<label>Blau</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" type="radio">
							<label>Orange</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" type="radio">
							<label>Violett</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" type="radio">
							<label>Pink</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" type="radio">
							<label>Rot</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
							<input name="colour" type="radio">
							<label>Aquamarin</label>
							</div>
						</div>
					  </div>
					</div>

	              </div>
	              <div class="actions">
	                <div class="ui black button">
	                  Abbrechen
	                </div>
	                <div class="ui positive right labeled icon button">
	                  Erstellen
	                  <i class="checkmark icon"></i>
	                </div>
	              </div>
	            </div>
	        </div>


		</section>


		@else

			@include('dashboard.partials.messages')

		@endif

	</div>
	</div>

	<div class="ui section divider"></div>

	<div class="two column row">
		<div class="column">
			@include('dashboard.partials.current-lection')
		</div>
		<section class="column">
			@include('dashboard.partials.general-info')
		</section>
	</div>
	<div class="one column row">
		<div class="column">
			@include('dashboard.partials.all-lections')
		</div>
	</div>
</main>
@stop
