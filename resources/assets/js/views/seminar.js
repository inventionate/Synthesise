if( $('#main-content-seminar')[0] || $('#main-content-seminar-users')[0] || $('#main-content-seminar-settings')[0] || $('#main-content-seminar-faqs')[0])
{
    /*
     * Show delete all admins warning.
     */
    $('#seminar-delete').submit(function( event ) {

        var form = this;

        event.preventDefault();

        swal({
            title: "Seminar löschen?",
            text: "Sie löschen das gesamte Seminar. Lediglich die online-Lektionen und Texte bleiben in der Datenbank erhalten. Dieser Vorgang kann nicht rückgängig gemacht werden!",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Abbrechen",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ja, löschen!"
        }, function( isConfirm ) {
            if( isConfirm ) {
                form.submit();
            }
        });

    });
}

if( $('#main-content-seminar')[0] )
{

    if ( disqus_shortname !== null )
    {

        (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
    }

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


    /*
     * New lection modal.
     */
     $('#lection-new-modal')
         .modal({
             detachable  : false,
             onHidden    : function() {
                 $(this).form('clear');
             },

         })
         .modal('attach events', '#lection-new', 'show');



}

if( $('#main-content-seminar-users')[0] )
{

    /*
     * Create new info resource form.
     */
    $('#user-new-modal')
        .modal({
            detachable  : false,
            onHidden    : function() {
                $(this).form('clear');
            },

        })
        .modal('attach events', '.user-new', 'show');

    $('.user-new').click(function() {

        var role = $(this).text().trim();

        $('#user-new-modal .header').text(role);

        var  role_val;

        switch(role) {
            case "Dozent/in hinzufügen":
                role_val = "Teacher";
                break;
            case "Mentor/in hinzufügen":
                role_val = "Mentor";
                break;
            case "Student/in hinzufügen":
                role_val = "Student";
                break;
        }

        $('#user-new-modal .content').find('input[value=' + role_val + ']').prop("checked", true);
    });

    // @TODO Code abstrahieren!

    /*
     * Add User IDs for delete ADMINs.
     */
    $('#teacher-user-table input').change(function() {

        if( this.checked ) {

            $('<input>').attr({
                type: 'text',
                name: 'id[]',
                value: $(this).val(),
                class: 'user-' + $(this).val() + ' hide'
            }).appendTo('#teacher-user-delete-many');

        }
        else {
            $( '.user-' + $(this).val() ).remove();
        }

        /*
         * Handle delete button.
         */
        var delete_button = $('#teacher-user-table input:checked').length === 0;

        $('#teacher-user-table button.delete-many').toggleClass('disabled', delete_button);

    });

    /*
     * Show delete all admins warning.
     */
    $('#teacher-user-delete-all').submit(function( event ) {

        var form = this;

        event.preventDefault();

        swal({
            title: "Alle Dozent/innen löschen?",
            text: "Sie werden alle Dozent/innen – ausgenommen Ihnen selbst – für dieses Seminar löschen.",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Abbrechen",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ja, alle löschen!"
        }, function( isConfirm ) {
            if( isConfirm ) {
                form.submit();
            }
        });

    });


    /*
     * Add User IDs for delete MENTORs.
     */
    $('#mentor-user-table input').change(function() {

        if( this.checked ) {

            $('<input>').attr({
                type: 'text',
                name: 'id[]',
                value: $(this).val(),
                class: 'user-' + $(this).val() + ' hide'
            }).appendTo('#mentor-user-delete-many');

        }
        else {
            $( '.user-' + $(this).val() ).remove();
        }

        /*
         * Handle delete button.
         */
        var delete_button = $('#mentor-user-table input:checked').length === 0;

        $('#mentor-user-table button.delete-many').toggleClass('disabled', delete_button);

    });

    /*
     * Show delete all admins warning.
     */
    $('#mentor-user-delete-all').submit(function( event ) {

        var form = this;

        event.preventDefault();

        swal({
            title: "Alle Mentor/innen löschen?",
            text: "Sie werden alle Mentor/innen für dieses Seminar löschen.",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Abbrechen",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ja, alle löschen!"
        }, function( isConfirm ) {
            if( isConfirm ) {
                form.submit();
            }
        });

    });


    /*
     * Add User IDs for delete STUDENTs.
     */
    $('#student-user-table input').change(function() {

        if( this.checked ) {

            $('<input>').attr({
                type: 'text',
                name: 'id[]',
                value: $(this).val(),
                class: 'user-' + $(this).val() + ' hide'
            }).appendTo('#student-user-delete-many');

        }
        else {
            $( '.user-' + $(this).val() ).remove();
        }

        /*
         * Handle delete button.
         */
        var delete_button = $('#student-user-table input:checked').length === 0;

        $('#student-user-table button.delete-many').toggleClass('disabled', delete_button);

    });

    /*
     * Show delete all admins warning.
     */
    $('#student-user-delete-all').submit(function( event ) {

        var form = this;

        event.preventDefault();

        swal({
            title: "Alle Student/innen löschen?",
            text: "Sie werden alle Student/innen für dieses Seminar löschen.",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Abbrechen",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ja, alle löschen!"
        }, function( isConfirm ) {
            if( isConfirm ) {
                form.submit();
            }
        });

    });

}

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

    var createUniqueSubjectsRules = function (form_subjects) {

        var rule_subject;
        var rules_to_add = [];

        for (i = 0; i < form_subjects.length; i++) {

             rule_subject = {
                     'type'    : 'unique[' + form_subjects[i] +  ']',
                     'prompt'  : 'Der Breich existiert bereits.'
                 };

             rules_to_add.push(rule_subject);

         }

         return rules_to_add;
    };

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
     var rules_new = jQuery.extend({}, rules);

     rules_new.subject.rules.concat( createUniqueSubjectsRules(subjects) );

    // Attach FAQ new modal validation.
     $('.faq-new-validator')
         .form({
             inline: true,
             onSuccess: function() {
                 $(this).modal('hide');
             },
             fields: rules_new
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
            .modal({
                detachable: false,
                onHidden    : function() {

                    $('#faq-edit-modal').attr('action',  $('#faq-edit-modal').attr('action').slice(0, -3));

                },
            })
            .modal('attach events', '.faq-edit', 'show');

        $('.faq-edit').click(function() {

            // Get FAQ resource ID.
            var id = $(this).attr("data-id");
            // action="//localhost:3000/faq/

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

            var rules_edit = jQuery.extend({}, rules);

            // Delete current subject from list for edit
            var faq_subject_index = subjects.indexOf(faq_subject);

            // Remove edited subjects from array.
            var subjects_edit = subjects.slice();

            subjects_edit.splice(faq_subject_index, 1);

            // Generate rules.
            rules_edit.subject.rules.concat( createUniqueSubjectsRules(subjects_edit) );

            // Attach FAQ edit modal validation.
            $('.faq-edit-validator')
                .form({
                    inline: true,
                    onSuccess: function() {
                        $(this).modal('hide');
                    },
                    fields: rules_edit
                });

        });
    }
}
