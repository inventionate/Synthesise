if( $('#main-content-seminar')[0] )
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
