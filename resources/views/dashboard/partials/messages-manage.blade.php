<section id="messages-manage">
  <header>
    <h1>Nachrichten editieren</h1>
  <header>

  <div id="current-messages">
  @foreach ($messages as $message)

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

        {!! Form::label('message-type'. $message->id, 'Messages', ['class' => 'hidden']) !!}
        {!! Form::select('type', ['info' =>'Information', 'warning' => 'Warnung', 'danger' => 'Wichtig'], $message->type, ['class' => 'message-update-type']) !!}


        {{-- Automatisches Senden beim Verändern des Inhalts (vgl. Notes) --}}

      {!! Form::close() !!}
    </div>

  @endforeach
  </div>

  <hr>

  {{-- Wenn eine Nachricht erzeugt wird, wird ein POST AJAX Requet gesendet. Danach wird die Nachricht via .append() und einem CSS Animationseffekt in die Liste der aktuellen Nachrichten eingetragen. --}}

  <div id="new-message">
    <h3>Neue Nachricht</h3>
    <div class="alert alert-info" role="alert">

      {{-- STORE FORM --}}
      {!! Form::open(['id' => 'message-store', 'url' => 'api/v1/messages','role' => 'form']) !!}

        {!! Form::label('message-new-content', 'Messages', ['class' => 'hidden']) !!}
        {!! Form::textarea('message', '', ['rows' => '3', 'maxlength' => '300', 'class' => 'form-control', 'placeholder' => 'Geben Sie eine neue Nachricht ein.', 'id' => 'message-new-content']) !!}

        {!! Form::label('message-type', 'Messages', ['class' => 'hidden']) !!}
        {!! Form::select('type', ['info' =>'Information', 'warning' => 'Warnung', 'danger' => 'Wichtig']) !!}

        {!! Form::submit('Erstellen') !!}

      {!! Form::close() !!}
    <div>
  </div>

</section>
