if( $('#infoblock-new')[0] )
{

    /*
     * Setup Message WYSIWYG editor.
     */
    $('.infoblock-wysiwyg').trumbowyg({
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
         name: {
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
                     prompt  : 'Bitte geben Sie einen Informationstext ein.'
                 }
             ]
         }//,
        //  link_url: {
        //      rules: [
        //          {
        //              type    : 'url',
        //              prompt  : 'Bitte geben Sie eine URL ein.'
        //          }
        //      ]
        //  }
     };

    // Attach message modal validation.
     $('.infoblock-validator')
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
    $('#infoblock-new-modal')
        .modal({
            detachable  : false,
            onHidden    : function() {
                $(this).form('clear');
                $(this).find('textarea[name="content"]').trumbowyg( 'html', '' );
            },

        })
        .modal('attach events', '#infoblock-new', 'show');

    /*
     * Update message resource form.
     */
    if( $('.infoblock-edit')[0] )
    {

        $('#infoblock-edit-modal')
            .modal({
                detachable: false,
                onHidden    : function() {

                    $('#infoblock-edit-modal').attr('action',  $('#infoblock-edit-modal').attr('action').slice(0, -3));

                },
            })
            .modal('attach events', '.infoblock-edit', 'show');

        $('.infoblock-edit').click(function() {

            // Get infoblock ID.
            var id = $(this).attr("data-id");

            // Add ID to form update url.
            $('#infoblock-edit-modal').attr('action', $('#infoblock-edit-modal').attr('action') + '/' + id);

            // Get infoblock name.
            var infoblock_name = $(this).attr("data-name");

            // Get infoblock content.
            var infoblock_content = $(this).attr("data-content");

            // Get infoblock link_url.
            var infoblock_link_url = $(this).attr("data-link-url");

            // Get infoblock image_path.
            var infoblock_image_path = $(this).attr("data-image-path").substr(28);

            // Get infoblock text_path.
            var infoblock_text_path = $(this).attr("data-text-path").substr(28);

            // Set infoblock name.
            $('#infoblock-edit-modal').find('input[name="name"]').val( infoblock_name );

            // Set infoblock content.
            $('#infoblock-edit-modal').find('textarea[name="content"]').trumbowyg( 'html',  infoblock_content );

            // Set infoblock link_url.
            $('#infoblock-edit-modal').find('input[name="link_url"]').val( infoblock_link_url );

            // Set infoblock image_path.
            $('#infoblock-edit-modal').find('input[name="filepath"]').val( infoblock_image_path );

            // Set infoblock text_path.
            $('#infoblock-edit-modal').find('input[name="textpath"]').val( infoblock_text_path );

        });
    }
}
