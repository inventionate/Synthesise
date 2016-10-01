// General code for all seminar (sub)pages.

if( $('#main-content-seminar')[0] ||
    $('#main-content-seminar-users')[0] || $('#main-content-seminar-settings')[0] || $('#main-content-seminar-faqs')[0])
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

// Seminar index specific code.
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

    require('./views/seminar/general-infos.js');

    require('./views/seminar/sections.js');

    require('./views/seminar/lections.js');

}

// Require partials and subpages
require('./views/seminar/infoblocks.js');
require('./views/seminar/messages.js');
require('./views/seminar/faqs.js');
require('./views/seminar/settings.js');
require('./views/seminar/users.js');
