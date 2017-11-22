// General code for all seminar (sub)pages.

if( $('#main-content-seminar')[0] ||
    $('#main-content-seminar-users')[0] || $('#main-content-seminar-settings')[0] || $('#main-content-seminar-faqs')[0] ||
    $('#main-content-seminar-lection')[0] || $('#main-content-seminar-contact')[0])
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
            icon: "warning",
            buttons: ["Abbrechen", "Ja, löschen!"]
        }).
        then((willDelete) => {
            if( willDelete ) {
                form.submit();
            }
        });

    });

    // Require partial modals

    require('./messages.js');

    require('./lections.js');

    require('./sections.js');

    require('./infoblocks.js');
}

// Seminar index specific code.
if( $('#main-content-seminar')[0] )
{

    require('./general-infos.js');

}

// Require subpages
require('./faqs.js');
require('./settings.js');
require('./users.js');
require('./lection.js');
