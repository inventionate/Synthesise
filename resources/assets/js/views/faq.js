/*
 * Init FAQ accordion.
 */
$('#faq-accordion').accordion({
    selector: {
        trigger: '.trigger.column'
    }
});

/*
 * Create new FAQ resource form.
 */
$('#faq-new-modal')
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
            // @info Laravel Sendevorgang durchführen! (sollte automatisch gehen im besten Fall!)
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
 * Edit FAQ resource form.
 */
