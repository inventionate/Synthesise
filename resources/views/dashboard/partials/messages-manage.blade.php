<section id="messages-manage">

<div class="panel-group" id="accordion-message">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion-message" href="#collapse-current-messages">
          Nachrichten editieren <span class="badge">{{ count($messages) }}</span>
        </a>
      </h4>
    </div>
    <div id="collapse-current-messages" class="panel-collapse collapse @if ( Session::has('success') ) in @endif">
      <div class="panel-body">
        <div id="current-messages">
        @foreach ($messages as $message)
          <div class ="message">
            <div class="alert alert-{{ $message->type }}" role="alert">
              {{Session::reflash()}}
              {{-- DELETE FORM --}}
              {!! Form::open(['id' => 'message-delete-'. $message->id, 'url' => 'api/v1/messages/' . $message->id, 'method' => 'DELETE', 'role' => 'form']) !!}

                {!! Form::button('<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>', ['type' => 'button', 'class' => 'close']) !!}

              {!! Form::close() !!}


              {{-- UPDATE MESSAGE --}}
              {!! Form::open(['id' => 'message-update-'. $message->id, 'url' => 'api/v1/messages/' . $message->id, 'method' => 'PATCH', 'role' => 'form']) !!}

                {!! Form::label('message-content-'. $message->id, 'Messages', ['class' => 'hidden']) !!}
                {!! Form::textarea('message'. $message->id, $message->message, ['id' => 'message-content-'. $message->id, 'rows' => '3', 'maxlength' => '300', 'class' => 'form-control message-update-content']) !!}

                {!! Form::label('message-type-'. $message->id, 'Messages', ['class' => 'hidden']) !!}
                {!! Form::select('type', ['info' =>'Information', 'warning' => 'Warnung', 'danger' => 'Wichtig'], $message->type, ['id' => 'message-type-'. $message->id, 'class' => 'message-update-type']) !!}

                {{-- Automatisches Senden beim Verändern des Inhalts (vgl. Notes) --}}

              {!! Form::close() !!}

            </div>
            <div class="ajax-info-{{ $message->id }} progress">
              <div class="progress-bar progress-bar-success"  role="progressbar" style="width: 100%;"></div>
              {{-- @todo Auch Screenreder-Info aktualisieren. --}}
              <span class="sr-only">Aktualisiert</span>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion-message" href="#collapse-new-message">
          Neue Nachrichten erstellen
        </a>
      </h4>
    </div>
    <div id="collapse-new-message" class="panel-collapse collapse">
      <div class="panel-body">
        <div id="new-message">
          <div class="alert alert-info" role="alert">

            {{-- STORE FORM --}}
            {!! Form::open(['id' => 'message-store', 'url' => 'api/v1/messages','role' => 'form']) !!}

              {!! Form::label('message-new-content', 'Messages', ['class' => 'hidden']) !!}
              {!! Form::textarea('message', '', ['rows' => '3', 'maxlength' => '300', 'class' => 'form-control', 'placeholder' => 'Geben Sie eine neue Nachricht ein.', 'id' => 'message-new-content']) !!}

              {!! Form::label('message-type', 'Messages', ['class' => 'hidden']) !!}
              {!! Form::select('type', ['info' =>'Information', 'warning' => 'Warnung', 'danger' => 'Wichtig']) !!}

              {!! Form::submit('Erstellen') !!}

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
