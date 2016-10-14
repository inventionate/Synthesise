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
    email: {
        rules: [
            {
                type    : 'email',
                prompt  : 'Bitte E-Mail Adresse eingeben.'
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
    .modal({
        detachable: false,
        onHidden    : function() {

            $('#admin-edit-modal').attr('action',  $('#admin-edit-modal').attr('action').slice(0, -3));

        },
    })
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

    // Disable root user attributes
    var root_user;

    if ( admin_username === 'root' )
    {
        root_user = true;
    }
    else {
        root_user = false;
    }

    $('#admin-edit-modal').find('input[name="username"]').prop( 'readonly', root_user );

     // Set firstname
    $('#admin-edit-modal').find('input[name="firstname"]').prop( 'readonly', root_user );

    // Set lastname
    $('#admin-edit-modal').find('input[name="lastname"]').prop( 'readonly', root_user );

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
