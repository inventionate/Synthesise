@extends('layouts.default')

@section('title')
  <title>Erziehungswissenschaftliche Grundfragen –
  Häufig gestellte Fragen</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui centered page grid">

    <div class="center aligned fourteen wide column">

        <h1>Häufig gestellte Fragen
            @if( $letter != null)
                für {{ substr(URL::current(),strlen(url('/faq/'))+1,1) }}
            @endif
        </h1>

        <p>Bitte wählen Sie einen Fragebereich aus. Sollte sich Ihre Frage nach der Lektüre der hier aufgelisteten Antworten nicht geklärt haben, <a href="{{ url('kontakt') }}">wenden Sie sich bitte direkt an uns</a>. Wir versuchen den »Häufig gestellte Fragen« Katalog ständig zu erweitern und freuen und über Ihre Anregungen und Mitarbeit.</p>

        {{-- @todo Inline PHP Code in Controller auslagern. --}}
        {{-- @todo PRINT CSS bearbeiten --}}
        <div class="ui pagination menu">
            @for($i = 0; $i < strlen($letters); $i++ )
                <a class="item @if ($letter === substr($letters,$i,1) ) active @endif" href="{{ url('/faq/' . substr($letters,$i,1)) }}">
                    {{ substr($letters,$i,1) }}
                </a>
            @endfor

            @if ( Auth::user()->role === 'Admin' )

                <div class="item">
                    <button id="faq-new" class="ui teal icon button" data-tooltip="Eine neue HGF hinzufügen.">
                        <i class="add icon"></i>
                    </button>
                </div>

            @endif

        </div>

    </div>

    @if( $letter != null)
        <div class="left aligned ten wide column">
            <div id="faq-accordion" class="ui styled fluid accordion">
                @foreach($answersByLetter as $answers)
                    <div class="title">
                        <div class="ui grid">
                            <div class="@if ( Auth::user()->role === 'Admin' ) thirteen wide @endif trigger column">
                                <i class="dropdown icon"></i>
                                {{ $answers->subject }}
                            </div>

                            @if ( Auth::user()->role === 'Admin' )
                            <div class="three wide column">
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
    @endif

    {{-- Include Modals for create and edit faqs. --}}
    @if ( Auth::user()->role === 'Admin' )

        @include('faq.partials.create')
        @include('faq.partials.edit')

    @endif

</main>
@stop

@section('scripts')
<script>

/*
 * Init FAQ accordion.
 */
$('#main-content-faq #faq-accordion').accordion({
    selector: {
        trigger: '.trigger.column'
    }
});

/*
 * Setup FAQ WYSIWYG editor.
 */
$('.faq-wysiwyg').trumbowyg({
    lang: 'de',
    semantic: true,
    removeformatPasted: true,
    btns: [
        ['viewHTML'],
        ['formatting'],
        'btnGrp-semantic',
        ['superscript', 'subscript'],
        ['link'],
        'btnGrp-justify',
        'btnGrp-lists',
        ['horizontalRule'],
        ['removeformat']
    ]}
);

/*
 * Setup FAQ JS Validator.
 */

 // Abfragen der bereits verwendeten Themen.
 var rule_subject;
 var rules_to_add = [];

 // Formale Validationsregel festlegen.
  $.fn.form.settings.rules.unique = function(value, subject) {
     return( value != subject)
  };

 for (i = 0; i < subjects.length; i++) {

     rule_subject = {
             'type'    : 'unique[' + subjects[i] +  ']',
             'prompt'  : 'Der Breich existiert bereits.'
         };

     rules_to_add.push(rule_subject);

 }

 // Festlegen der Allgemeinen Validationsregeln.
 var rules = {
     subject: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte einen Titel eingeben.'
             }
         ]
     },
     question: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte geben Sie dir konkrete Frage ein.'
             }
         ]
     },
     answer: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte einen Antworttext eingeben.'
             }
         ]
     }
 };

 // Spezielle Validationsregeln für das Erstellen einer FAQ.
 rules.subject.rules = rules.subject.rules.concat(rules_to_add);

// Attach FAQ Modal Validation.
 $('.faq-validator')
     .form({
         inline: true,
         onSuccess: function() {
             $(this).modal('hide');
         },
         fields : rules
     });

/*
 * Create new FAQ resource form.
 */

// $('.ui.modal').modal({detachable: false})

$('#faq-new-modal')
    .modal({
        detachable  : false,
        onHidden    : function() {
            $(this).form('clear');
            $(this).find('textarea[name="answer"]').trumbowyg( 'html', '' );
        },

    })
    .modal('attach events', '#faq-new', 'show');

/*
 * Update FAQ resource form.
 */
if( $('#main-content-faq .faq-edit')[0] )
{
    $('#faq-edit-modal')
        .modal({detachable: false})
        .modal('attach events', '.faq-edit', 'show');

    $('#main-content-faq .faq-edit').click(function() {

        // Get FAQ resource ID.
        var id = $(this).attr("data-id");

        // Add ID to form update url.
        $('#faq-edit-modal').attr('action', $('#faq-edit-modal').attr('action') + '/' + id);

        // Get FAQ subject.
        var faq_subject = $(this).parents(':eq(2)').find('.trigger.column').text().trim();

        var faq_question = $(this).parents(':eq(3)').next().find('h5:first').text().trim();

        // Get FAQ answer.
        // var faq_answer = $(this).parents(':eq(3)').next().find('h5:first').nextAll().removeClass().get();

        var faq_answer = $(this).parents(':eq(3)').next().clone();
        faq_answer.find('h5:first').remove();

        // Set FAQ Modal subject.
        $('#faq-edit-modal').find('input[name="subject"]').val( faq_subject );

        // Set FAQ Modal question.
        $('#faq-edit-modal').find('input[name="question"]').val( faq_question );

        // Set FAQ Modal answer.
        $('#faq-edit-modal').find('textarea[name="answer"]').trumbowyg( 'html', faq_answer.html().trim() );
    });
}


</script>
@stop
