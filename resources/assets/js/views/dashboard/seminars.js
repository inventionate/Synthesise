/*
 * Setup Seminar JS Validator.
 */

//  Init basic validation rules.
var rules = {
    title: {
        rules: [
            {
                type    : 'empty',
                prompt  : 'Bitte einen Titel eingeben.'
            }
        ]
    },
    author: {
        rules: [
            {
                type    : 'empty',
                prompt  : 'Bitte einen Autor eingeben.'
            }
        ]
    },
    contact: {
        rules: [
            {
                type    : 'email',
                prompt  : 'Bitte eine E-Mail Adresse eingeben.'
            }
        ]
    },
    subject: {
        rules: [
            {
                type    : 'empty',
                prompt  : 'Bitte eine Disziplin eingeben.'
            }
        ]
    },
    module: {
        rules: [
            {
                type    : 'empty',
                prompt  : 'Bitte ein Modul eingeben.'
            }
        ]
    },
    description: {
        rules: [
            {
                type    : 'empty',
                prompt  : 'Bitte eine Beschreibung eingeben.'
            }
        ]
    },
    filepath: {
        rules: [
            {
                type    : 'empty',
                prompt  : 'Bitte ein Bild hochladen.'
            }
        ]
    },
    available_from: {
        rules: [
            {
                type    : 'empty',
                prompt  : 'Bitte ein Verfügbarkeitsdatum eingeben.'
            }
        ]
    },
    available_to: {
        rules: [
            {
                type    : 'empty',
                prompt  : 'Bitte ein Enddatum eingeben.'
            }
        ]
    }
 };

// Attach message modal validation.
 $('.seminar-validator')
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
$('#seminar-new-modal')
    .modal({
        detachable  : false,
        onHidden    : function() {
            $(this).form('clear');
        },

    })
    .modal('attach events', '#seminar-new', 'show');
