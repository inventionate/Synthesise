<section id="messages">

@foreach ($messages as $message)
    <div class="alert alert-{{ $message->type }}" role="alert">
      {{ $message->message }}
    </div>
@endforeach

</section>
