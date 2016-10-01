/*
 * Setup Section JS Validator.
 */

 // Init basic validation rules.
 var rules = {
     name: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte einen Namen eingeben.'
             }
         ]
     },
     filepath: {
         rules: [
             {
                 type    : 'empty',
                 prompt  : 'Bitte Laden Sie eine datei hoch.'
             }
         ]
     }
 };

// Attach info modal validation.
 $('.section-validator')
     .form({
         inline: true,
         onSuccess: function() {
             $(this).modal('hide');
         },
         fields: rules
     });


/*
 * New section modal.
 */
 $('#section-new-modal')
     .modal({
         detachable  : false,
         onHidden    : function() {
             $(this).form('clear');
         },

     })
     .modal('attach events', '#section-new', 'show'
 );

 /*
  * Update section modal.
  */

 if( $('.section-edit')[0] )
 {
     $('#section-edit-modal')
         .modal({
             detachable: false,
             onHidden    : function() {

                 $('#section-edit-modal').attr('action',  $('#section-edit-modal').attr('action').slice(0, -3));

             },
         })
         .modal('attach events', '.section-edit', 'show');

     $('.section-edit').click(function() {

         // Get Section resource ID.
         var id = $(this).attr("data-id");

         // Add ID to form update url.
         $('#section-edit-modal').attr('action', $('#section-edit-modal').attr('action') + '/' + id);

         // Get Section name.
         var section_name = $(this).attr("data-name");

         // Get Section filepath.
         var section_filepath = $(this).attr("data-filepath");

         // Set Section Modal subject.
         $('#section-edit-modal').find('input[name="name"]').val( section_name );

         // Set Section Modal subject.
         $('#section-edit-modal').find('input[name="filepath"]').val( section_filepath );
     });
 }

 /*
  * Show delete section warning.
  */
 $('.section-delete').submit(function( event ) {

     var form = this;

     event.preventDefault();

     swal({
         title: "Themenbereich löschen?",
         text: "Sie löschen den gesamten Themenbereich! Damit entfernen Sie auch die Verknüpfung zu allen zugeordneten online-Lektionen. Die online-Lektionen selbst werden nicht gelöscht und können zu neuen Themenbereichen hinzugefügt werden.",
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
