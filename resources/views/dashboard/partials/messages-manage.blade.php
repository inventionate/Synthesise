<section>

  <h2>Nachrichten editieren</h2>

  <div id="current-messages">
  <!-- @foreach ($messages as $message)

    <div class="alert alert-{{ $message->type }}" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      {!! Form::open(['url' => 'messages']) !!}

        {!! Form::label('message-content', 'Messages', ['class' => 'hidden']) !!}
        {!! Form::textarea('message', '', ['rows' => '3', 'maxlength' => '300', 'class' => 'form-control', 'id' => 'message-content']) !!}

        {!! Form::label('message-type', 'Messages', ['class' => 'hidden']) !!}
        {!! Form::select('type', ['Information' =>'info', 'Warnung' => 'warning', 'Wichtig' => 'danger']) !!}

        {!! Form::submit('Aktualisieren') !!}

      {!! Form::close() !!}
    </div>

  @endforeach -->
  </div>

  <hr>

  <div class="alert alert-success" role="alert">
    {!! Form::open(['url' => 'messages']) !!}

      {!! Form::label('message-content', 'Messages', ['class' => 'hidden']) !!}
      {!! Form::textarea('message', '', ['rows' => '3', 'maxlength' => '300', 'class' => 'form-control', 'placeholder' => 'Geben Sie eine neue Nachricht ein.', 'id' => 'message-content']) !!}

      {!! Form::label('message-type', 'Messages', ['class' => 'hidden']) !!}
      {!! Form::select('type', ['Information' =>'info', 'Warnung' => 'warning', 'Wichtig' => 'danger']) !!}

      {!! Form::submit('Senden') !!}

    {!! Form::close() !!}
  <div>

</section>
