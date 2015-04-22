@if ( $role === 'Admin' )

    {{-- Die URL noch weiter automatisieren über einen Laravel Helper --}}
    <section id="messages-manage" data-url="/api/v1/messages" data-poll-interval="15000"></section>

    <div class="ui section divider"></div>

@else

    <section id="messages">

        @foreach ($messages as $message)

            <div class="ui message {{ $message->colour }}" role="alert">
                <div class="header">
                    {{ $message->title }}
                </div>
                {{ $message->content }}
            </div>

        @endforeach

    </section>


@endif
