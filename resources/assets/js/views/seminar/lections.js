/*
 * Setup Lection JS Validator.
 */
 // Init basic validation rules.
 var rules = {
     name: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte einen Titel eingeben.'
             }
         ]
     },
     section_id: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte wählen Sie einen Themenbereich.'
             }
         ]
     },
     author: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte geben Sie eine/n Autor/in ein.'
             }
         ]
     },
     contact: {
         rules: [
             {
                 type    : 'email',
                 prompt  : 'Bitte laden Sie ein Kontaktadresse ein.'
             }
         ]
     },
     text_filepath: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte laden Sie einen Text hoch.'
             }
         ]
     },
     text_name: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte geben Sie den Titel des Textes ein.'
             }
         ]
     },
     text_author: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte geben Sie den/die Verfasser/in ein.'
             }
         ]
     },
     image_filepath: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte laden Sie ein Titelbild hoch.'
             }
         ]
     },
     available_from: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte definieren Sie ein Datum.'
             }
         ]
     },
     available_to: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte definieren Sie ein Datum.'
             }
         ]
     }
 };

// Attach message modal validation.
 $('.lection-validator')
     .form({
         inline: true,
         onSuccess: function() {
             $(this).modal('hide');
         },
         fields: rules
     });

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

  /*
   * New lection modal.
   */
   $('#lection-attach-modal')
       .modal({
           detachable  : false,
           onHidden    : function() {
               $(this).form('clear');
           },

       })
       .modal('attach events', '#lection-attach', 'show'
   );

   /*
    * Update message resource form.
    */
   if( $('.lection-edit')[0] )
   {
       var id_length = 0;

       $('#lection-edit-modal')
           .modal({
               detachable: false,
               onHidden    : function() {

                   $('#lection-edit-modal').attr('action',  $('#lection-edit-modal').attr('action').slice(0, -(id_length + 1)));

                   $('#lection-edit-modal').find('input[name="name"]').prop( 'disabled', false );

               },
           })
           .modal('attach events', '.lection-edit', 'show');

       $('.lection-edit').click(function() {

           // Get infoblock ID.
           var id = encodeURI($(this).attr("data-name"));

           id_length = id.length;

           // Add ID to form update url.
           $('#lection-edit-modal').attr('action', $('#lection-edit-modal').attr('action') + '/' + id);

           // Get lection name.
           var lection_name = $(this).attr("data-name");

           // Get section name.
           var section_id = $(this).attr("data-section-id");

           // Get lection author.
           var lection_author = $(this).attr("data-author");

           // Get lection contact.
           var lection_contact = $(this).attr("data-contact");

           // Get text path.
           // @TODO Den Speicherpfad beschneiden.substring(17)
           var text_path = $(this).attr("data-text-path");

           // Get text author.
           var text_author = $(this).attr("data-text-author");

           // Get text name.
           var text_name = $(this).attr("data-text-name");

           // Get image path.
           var image_path = $(this).attr("data-image-path").substring(17);

           // Get available_from.
           var available_from = $(this).attr("data-available-from");

           // Get available_to.
           var available_to = $(this).attr("data-available-to");

           // Get authorized_users.
           var authorized_users = $(this).attr("data-authorized-users");

           // Remove all admins (var admins directly from Laravel)
           authorized_users = $.parseJSON(authorized_users).filter( function( user ) {
               return !admins.includes( user );
           } );

           // Set lection name.
           $('#lection-edit-modal').find('input[name="name"]').val( lection_name ).prop( 'disabled', true );

           // Set section.
           $('#lection-edit-modal .ui.selection.dropdown').dropdown('set selected', section_id);

           // Section ID als alte Angabe dem Request anfügen.

           $('<input>').attr({
               type: 'text',
               name: 'old_section_id',
               value: section_id,
               class: 'hide'
           }).appendTo('#lection-edit-modal .content');

           // Set lection author.
           $('#lection-edit-modal').find('input[name="author"]').val( lection_author );

           // Set lection contact.
           $('#lection-edit-modal').find('input[name="contact"]').val( lection_contact );

           // Set text path.
           $('#lection-edit-modal').find('input[name="text_filepath"]').val( text_path );

           // Set text author.
           $('#lection-edit-modal').find('input[name="text_author"]').val( text_author );

           // Set text name.
           $('#lection-edit-modal').find('input[name="text_name"]').val( text_name );

           // Set image path.
           $('#lection-edit-modal').find('input[name="image_filepath"]').val( image_path );

           // Set available_from.
           $('#lection-edit-modal').find('input[name="available_from"]').val( available_from );

           // Set available_to.
           $('#lection-edit-modal').find('input[name="available_to"]').val( available_to );

           // Get authorized_users.
           $('#lection-edit-modal #seminar_authorized_users').dropdown('set selected', authorized_users);

       });
   }
