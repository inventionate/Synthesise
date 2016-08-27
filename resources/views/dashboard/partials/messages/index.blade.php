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
<script>
if( $('#message-system')[0] )
{
/*
 * Setup Message WYSIWYG editor.
 */
$('.message-wysiwyg').trumbowyg({
    lang: 'de',
    semantic: true,
    removeformatPasted: true,
    btns: [
        'btnGrp-semantic',
        ['superscript', 'subscript'],
        ['link'],
        ['removeformat']
    ]}
);

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
     content: {
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
            $(this).find('textarea[name="content"]').trumbowyg( 'html', '' );
        },

    })
    .modal('attach events', '#message-new', 'show');

/*
 * Update message resource form.
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
        $('#message-edit-modal').attr('action', $('#message-edit-modal').attr('action') + '/' + id);

        // Get message title.
        var message_title = $(this).parents(':eq(1)').find('.header').text().trim();

        // Get message content.
        var message_content = $(this).parents(':eq(1)').clone();
        message_content.find('.header').remove();
        message_content.find('.buttons').remove();
        message_content.find('form').remove();

        // Get message colour.
        var message_colour = $(this).parents(':eq(1)').attr('class').split(' ')[2];

        // Set message modal title.
        $('#message-edit-modal').find('input[name="title"]').val( message_title );

        // Set message modal content.
        $('#message-edit-modal').find('textarea[name="content"]').trumbowyg( 'html', message_content.html().trim() );

        // Set message modal colour.
        $('#message-edit-modal').find('input[value=' + message_colour + ']').prop("checked", true);
    });
}
}
</script>
@stop
