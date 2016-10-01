/*
 * Setup Info WYSIWYG editor.
 */
$('.info-wysiwyg').trumbowyg({
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
 * Setup Info JS Validator.
 */

 // Init basic validation rules.
 var rules = {
     info_intro: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte einen Einleitungstext eingeben.'
             }
         ]
     },
     info_lections: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte geben Sie eine Beschreibung ein.'
             }
         ]
     },
     info_texts: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte geben Sie eine Beschreibung ein.'
             }
         ]
     },
     info_exam: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte geben Sie eine Beschreibung ein.'
             }
         ]
     }
 };

// Attach info modal validation.
 $('.info-validator')
     .form({
         inline: true,
         onSuccess: function() {
             $(this).modal('hide');
         },
         fields: rules
     });

/*
 * Edit general info form.
 */
$('#info-edit-modal')
    .modal({
        detachable  : false,
        onHidden    : function() {
            $(this).form('clear');
        },

    })
    .modal('attach events', '#info-edit', 'show');
