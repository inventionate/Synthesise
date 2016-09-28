if( $('#main-content-seminar-faqs')[0] )
{

    /*
     * Init FAQ accordion.
     */
    $('#faq-accordion').accordion({
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

     // Add new semantic ui form validation rule.
     $.fn.form.settings.rules.unique = function(value, subject) {
        return( value != subject);
     };

    // Recieve the used subjects.
    // var subjects is provided by Laravel.
    var rule_subject;
    var rules_to_add = [];

    for (i = 0; i < subjects.length; i++) {

         rule_subject = {
                 'type'    : 'unique[' + subjects[i] +  ']',
                 'prompt'  : 'Der Breich existiert bereits.'
             };

         rules_to_add.push(rule_subject);

     }

     // Init basic validation rules.
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
                     prompt  : 'Bitte geben Sie die konkrete Frage ein.'
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

     // Add dynamic validation rules (guarantee unique subjects).
     rules.subject.rules = rules.subject.rules.concat(rules_to_add);

    // Attach FAQ Modal Validation.
     $('.faq-validator')
         .form({
             inline: true,
             onSuccess: function() {
                 $(this).modal('hide');
             },
             fields: rules
         });

    /*
     * Create new FAQ resource form.
     */
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
    if( $('.faq-edit')[0] )
    {
        $('#faq-edit-modal')
            .modal({detachable: false})
            .modal('attach events', '.faq-edit', 'show');

        $('.faq-edit').click(function() {

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
}
