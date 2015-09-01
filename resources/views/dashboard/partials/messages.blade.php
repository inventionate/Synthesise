@if ( $role === 'Admin' )

    {{-- Vue.js Komponente zur Nachrichtenverwaltung --}}
    <message-manager url="/api/v1/messages" poll-interval="15000"></message-manager>

    <div class="ui section divider"></div>

@else

    {{-- Darstellung der Nachrichten durch Laravel und Blade. --}}

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
