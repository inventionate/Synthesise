<div id="message-system">

    <h1 class="hide">Nachrichten</h1>

    <section id="message-list">

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

</div>
