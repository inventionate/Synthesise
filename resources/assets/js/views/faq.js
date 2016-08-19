/*
 * Init FAQ accordion.
 */
$('#main-content-faq #faq-accordion').accordion({
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
$('.faq-validator')
    .form({
        inline: true,
        onSuccess: function() {
            $(this).modal('hide');
        },
        fields : {
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
                        prompt  : 'Bitte geben Sie dir konkrete Frage ein.'
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
    });

/*
 * Update FAQ resource form.
 */
if( $('#main-content-faq .faq-edit')[0] )
{
    $('#faq-edit-modal')
        .modal('attach events', '.faq-edit', 'show');

    $('#main-content-faq .faq-edit').click(function() {

        // Get FAQ resource ID.
        var id = $(this).attr("data-id");

        // Add ID to form update url.
        $('#faq-edit-modal').attr('action', $('#faq-edit-modal').attr('action') + '/' + id);

        // Get FAQ subject.
        var faq_subject = $(this).parents(':eq(2)').find('.trigger.column').text().trim();

        var faq_question = $(this).parents(':eq(3)').next().find('h5:first').text().trim();

        // Get FAQ answer.
        // var faq_answer = $(this).parents(':eq(3)').next().find('h5:first').nextAll().removeClass().get();

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
