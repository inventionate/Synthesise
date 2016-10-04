<div class="centered twelve wide column">
    <div id="faq-accordion" class="ui styled fluid accordion">
        @foreach($answersByLetter as $answers)
            <div class="title">
                <div class="ui grid">
                    <div class="@if ( Seminar::authorizedEditor($seminar_name) ) thirteen wide @endif trigger column">
                        <i class="dropdown icon"></i>
                        {{ $answers->subject }}
                    </div>

                    @if ( Seminar::authorizedEditor($seminar_name) )
                    <div class="three wide center aligned column">
                        <div class="ui small teal icon buttons">

                           <button class="ui button faq-edit" data-id="{{ $answers->id }}" data-tooltip="HGF ändern."><i class="edit icon"></i>
                           </button>


                           <form role="form" method="POST" action="{{ action('FaqController@destroy', ['id' => $answers->id]) }}">

                               {{ method_field('DELETE') }}

                               {{ csrf_field() }}

                                <button class="ui button" data-tooltip="HGF löschen." type="submit"><i class="close icon"></i></button>

                            </form>

                        </div>
                    </div>
                    @endif

                </div>
            </div>

            <div class="content">
                <h5>{{ $answers->question }}</h5>
                <p>{!! $answers->answer !!}</p>
            </div>

        @endforeach
    </div>
</div>
