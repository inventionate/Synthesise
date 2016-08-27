<div id="message-system">

    <h1 class="hide">Nachrichten</h1>

    {{-- Show all messages. --}}

    {{-- @todo Create remove and edit buttons. --}}

    <section id="message-list" class="ui @if ( $role === 'Admin' ) top attached segment @endif">

        @foreach ($messages as $message)

            <div class="ui message {{ $message->colour }}" role="alert">

                <div class="header">
                    {{ $message->title }}
                </div>

                {{ $message->content }}

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
<script>

/*
 * Setup Message WYSIWYG editor.
 */
// $('.message-wysiwyg').trumbowyg({
//     lang: 'de',
//     semantic: true,
//     removeformatPasted: true,
//     btns: [
//         ['formatting'],
//         'btnGrp-semantic',
//         ['superscript', 'subscript'],
//         ['link'],
//         ['horizontalRule'],
//         ['removeformat']
//     ]}
// );

/*
 * Setup Message JS Validator.
 */

 // Init basic validation rules.
 var rules = {
     title: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte einen Titel eingeben.'
             }
         ]
     },
     message: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte geben Sie eine Nachricht ein.'
             }
         ]
     },
     colour: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte wählen Sie eine Farbe aus.'
             }
         ]
     }
 };

// Attach message modal validation.
 $('.message-validator')
     .form({
         inline: true,
         onSuccess: function() {
             $(this).modal('hide');
         },
         fields: rules
     });

/*
 * Create new message resource form.
 */
$('#message-new-modal')
    .modal({
        detachable  : false,
        onHidden    : function() {
            $(this).form('clear');
            // $(this).find('textarea[name="answer"]').trumbowyg( 'html', '' );
        },

    })
    .modal('attach events', '#message-new', 'show');

/*
 * Update FAQ resource form.
 */
if( $('.message-edit')[0] )
{
    $('#message-edit-modal')
        .modal({detachable: false})
        .modal('attach events', '.message-edit', 'show');

    $('.message-edit').click(function() {

        // Get FAQ resource ID.
        var id = $(this).attr("data-id");

        // Add ID to form update url.
        $('#faq-edit-modal').attr('action', $('#faq-edit-modal').attr('action') + '/' + id);

        // Get FAQ subject.
        var faq_subject = $(this).parents(':eq(2)').find('.trigger.column').text().trim();

        var faq_question = $(this).parents(':eq(3)').next().find('h5:first').text().trim();

        // Get FAQ answer.
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
