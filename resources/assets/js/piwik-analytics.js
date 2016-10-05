$( document ).ready( function () {

    $('.track-event').click(function() {

        var type = $(this).attr("data-type");

        var name = $(this).attr("data-name");

        console.log("funny.");

        return _paq.push(['trackEvent', type, 'Downloaded', name]);

    });

});
