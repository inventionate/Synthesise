/*
 * Setup Seminar JS Validator.
 */

 // Add new semantic ui form validation rule.
 $.fn.form.settings.rules.unique = function(value, title) {
    return( value != title);
 };

 // Recieve the used titles.
 // var seminar_titles is provided by Laravel.

 var createUniqueTitleRules = function (form_titles) {

    var rule_title;
    var rules_to_add = [];

    for (i = 0; i < form_titles.length; i++) {

         rule_title = {
                 'type'    : 'unique[' + form_titles[i] +  ']',
                 'prompt'  : 'Dieses Seminar existiert bereits.'
             };

         rules_to_add.push(rule_title);

     }

     return rules_to_add;
 };

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

 // Add dynamic validation rules (guarantee unique titles).
 var rules_new = jQuery.extend({}, rules);

rules_new.title.rules = rules_new.title.rules.concat( createUniqueTitleRules(seminar_titles) );

// Attach message modal validation.
 $('.seminar-validator')
     .form({
         inline: true,
         onSuccess: function() {
             $(this).modal('hide');
         },
         fields: rules_new
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
