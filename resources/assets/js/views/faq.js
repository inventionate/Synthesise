/*
 * Init FAQ accordion.
 */
$('#main-content-faq #faq-accordion').accordion({
    selector: {
        trigger: '.trigger.column'
    }
});

/*
 * Create new FAQ resource form.
 */
$('#main-content-faq #faq-new-modal')
    .modal('attach events', '#faq-new', 'show')
    .modal({
        onHide: function() {
                $(this).form('clear');
        }
    })
    .form({
        inline: true,
        onSuccess: function() {
            $(this).modal('hide');
        },
        fields : {
            title: {
                rules: [
                    {
                        type    : 'empty',
                        prompt  : 'Bitte einen Titel eingeben.'
                    }
                ]
            },
            answertext: {
                rules: [
                    {
                        type    : 'empty',
                        prompt  : 'Bitte einen Antworttext eingeben.'
                    }
                ]
            }
        }
    });

/*
 * Update FAQ resource form.
 */
 $('#main-content-faq #faq-edit-modal')
     .modal('attach events', '.faq-edit', 'show')
     .form({
         inline: true,
         onSuccess: function() {
             $(this).modal('hide');
         },
         fields : {
             'edit-title': {
                 rules: [
                     {
                         type    : 'empty',
                         prompt  : 'Bitte einen Titel eingeben.'
                     }
                 ]
             },
             'edit-answertext': {
                 rules: [
                     {
                         type    : 'empty',
                         prompt  : 'Bitte einen Antworttext eingeben.'
                     }
                 ]
             }
         }
     });

$('#main-content-faq .faq-edit').click(function() {

    // Get FAQ resource ID.
    id = $(this).attr("data-id");

    // Add ID to form update url.
    $('#faq-edit-modal').attr('action', $('#faq-edit-modal').attr('action') + '/' + id);

    // Get FAQ title.
    faq_title = $(this).parents(':eq(2)').find('.trigger.column').text().trim();

    // Get FAQ answertext.
    faq_answertext = $(this).parents(':eq(4)').find('.content').html().trim();

    // Set FAQ Modal title.
    $('#faq-edit-modal').find('input[name="edit-title"]').val( faq_title );

    // Set FAQ Modal answertext.
    $('#faq-edit-modal').find('textarea[name="edit-answertext"]').val( faq_answertext );

});
