if( $('#main-content-dashboard')[0] )
{

    // @TODO wird in einer künftigen Semantic UI Version enthalten sein!
    require('./calendar.js');

    $('#seminar-new-modal .ui.calendar').calendar({
        type: 'date',
        text: {
          days: ['S', 'M', 'D', 'M', 'D', 'F', 'S'],
          months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
          monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
          today: 'Heute',
          now: 'Jetzt',
          am: 'AM',
          pm: 'PM'
        },
        formatter: {
            date: function (date, settings) {
                if (!date) return '';
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                return day + '.' + month + '.' + year;
            }
        },
    });

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
        },
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

    /*
     * Setup Admin JS Validator.
     */

    //  Init basic validation rules.
    var rules = {
        username: {
            rules: [
                {
                    type    : 'empty',
                    prompt  : 'Bitte einen Benutzernamen eingeben.'
                }
            ]
        },
        firstname: {
            rules: [
                {
                    type    : 'empty',
                    prompt  : 'Bitte einen Vornamen eingeben.'
                }
            ]
        },
        lastname: {
            rules: [
                {
                    type    : 'empty',
                    prompt  : 'Bitte einen Nachnamen eingeben.'
                }
            ]
        },
        password: {
            rules: [
                {
                    type    : 'empty',
                    prompt  : 'Bitte ein Passwort eingeben.'
                }
            ]
        }
     };

    // Attach message modal validation.
     $('.admin-validator')
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
    $('#admin-new-modal')
        .modal({
            detachable  : false,
            onHidden    : function() {
                $(this).form('clear');
            },

        })
        .modal('attach events', '#admin-new', 'show');

    /*
     * Create new message resource form.
     */
    $('#admin-edit-modal')
        .modal({detachable: false})
        .modal('attach events', '.admin-edit', 'show');

    $('.admin-edit').click(function() {

        // Get User resource ID.
        var id = $(this).attr("data-id");

        // Add ID to form update url.
        $('#admin-edit-modal').attr('action', $('#admin-edit-modal').attr('action') + '/' + id);

        // Get username.
        var admin_username = $(this).attr("data-username");

        // Get firstname.
        var admin_firstname = $(this).attr("data-firstname");

        // Get lastname.
        var admin_lastname = $(this).attr("data-lastname");

        // Get password.
        var admin_password = $(this).attr("data-password");

        // Set username.
        $('#admin-edit-modal').find('input[name="username"]').val( admin_username );

        // Set firstname
        $('#admin-edit-modal').find('input[name="firstname"]').val( admin_firstname );

        // Set lastname
        $('#admin-edit-modal').find('input[name="lastname"]').val( admin_lastname );

        // Set password
        $('#admin-edit-modal').find('input[name="password"]').val( admin_password );

    });


    /*
     * Show delete all admins warning.
     */
    $('.admin-delete').submit(function( event ) {

        var form = this;

        event.preventDefault();

        swal({
            title: "Administartor/in löschen?",
            text: "Sie sind im Begriff einen Administrator/ eine Administartorin vollständig zu löschen.",
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
