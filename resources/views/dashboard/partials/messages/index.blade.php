<div id="message-system">

    <h1 class="hide">Nachrichten</h1>

    {{-- Show all messages. --}}

    {{-- @todo Create remove and edit buttons. --}}

    <section id="message-list" class="ui @if ( $role === 'Admin' ) top attached segment @endif">

        @foreach ($messages as $message)

            <div class="ui message {{ $message->colour }} @if ( Auth::user()->role === 'Admin' ) message-system-edit @endif" role="alert">

                <div class="header">
                    {{ $message->title }}
                </div>

                {!! $message->content !!}

                @if ( Auth::user()->role === 'Admin' )
                    <div class="ui small teal icon buttons">

                       <button class="ui button message-edit" data-id="{{ $message->id }}" data-tooltip="Nachricht ändern."><i class="edit icon"></i>
                       </button>


                       <form role="form" method="POST" action="{{ action('MessageController@destroy', ['id' => $message->id]) }}">

                           {{ method_field('DELETE') }}

                           {{ csrf_field() }}

                            <button class="ui button" data-tooltip="Nachricht löschen." type="submit"><i class="close icon"></i></button>

                        </form>

                    </div>
                @endif

            </div>

        @endforeach

    </section>

    @if ( $role === 'Admin' )

        {{-- Create new messages. --}}

        <div id="message-new" class="ui bottom attached teal button">Neue Nachricht erstellen</div>

        {{-- Load craete and edit Modals --}}

        @include('dashboard.partials.messages.create')

        @include('dashboard.partials.messages.edit')


    @endif

</div>

@section('scripts')

@stop
