<section id="messages">

@foreach ($messages as $message)
    {{-- Message Type in Colour ändern! --}}
    <div class="ui message {{ $message->type }}" role="alert">
      {{ $message->message }}
    </div>
@endforeach

</section>
