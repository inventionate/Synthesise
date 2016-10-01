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

   // EDIT REQUIRES TO DISABLE NAME FIELD!!!! PRIMARY ID!!!
