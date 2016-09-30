@foreach ( $infoblocks as $infoblock )

    <div class="column">
        <div class="ui piled clearing segment">

            <h4 class="ui header">
                {{ $infoblock->name }}
            </h4>

            <img class="ui tiny left floated image" src="{{ asset($infoblock->image_path) }}">

            {!! $infoblock->content !!}

            <div class="ui clearing divider"></div>


            <div class="ui clearing basic segment">
                <a class="ui right floated icon basic button" href="{{ $infoblock->link_url }}" target="_blank">
                    <i class="external icon"></i>
                    Webiste besuchen
                </a>

                @if ( Seminar::authorizedEditor($seminar_name) )

                    <button class="ui small teal icon button infoblock-edit" data-id="{{ $infoblock->id }}" data-name="{{ $infoblock->name }}" data-content="{{ $infoblock->content }}" data-link-url="{{ $infoblock->link_url }}" data-image-path="{{ $infoblock->image_path }}">
                        <i class="edit icon"></i>
                    </button>

                    <form class="infoblock-delete" role="form" method="POST" action="{{ action('InfoblockController@destroy', ['id' => $infoblock->id]) }}">

                        {{ method_field('DELETE') }}

                        {{ csrf_field() }}

                        <button class="ui small teal icon button" type="submit">
                            <i class="close icon"></i>
                        </button>

                    </form>

                @endif

            </div>

        </div>
    </div>

@endforeach
