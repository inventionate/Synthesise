@foreach ( $infoblocks as $infoblock )

    <div class="column">
        <div class="ui piled segment">

            <h4 class="ui header">
                {{ $infoblock->name }}
            </h4>

            <img class="ui tiny left floated image" src="{{ asset($infoblock->image_path) }}">

            {!! $infoblock->content !!}

            <div class="ui clearing divider"></div>

            <a class="ui right floated icon basic button" href="{{ $infoblock->link_url }}" target="_blank">
                <i class="external icon"></i>
                Webiste besuchen
            </a>

            @if ( Seminar::authorizedEditor($seminar_name) )

                <button class="ui small teal icon button" href="{{ $infoblock->link_url }}" target="_blank">
                    <i class="edit icon"></i>
                </button>

                <button class="ui small teal icon button" href="{{ $infoblock->link_url }}" target="_blank">
                    <i class="close icon"></i>
                </button>

            @endif

            <div class="ui hidden clearing divider"></div>

        </div>
    </div>

@endforeach
