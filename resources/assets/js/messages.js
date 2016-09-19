if( $('#message-new')[0] )
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
