class Analytics {

// Dreckige Konvertierung des bestehenden Codes in einen modularen Umgang.

    constructor ()
    {

        $(document).on('click', '.download-paper', function() {
            var name;
            name = $(this).attr('data-name');
            return _paq.push(['trackEvent', 'Text', 'Downloaded', name]);
        });

        $(document).on('click', '.download-further-literature', function() {
            var name;
            name = $(this).attr('data-name');
            return _paq.push(['trackEvent', 'Weiterführende Literaturhinweise', 'Downloaded', name]);
        });

        $(document).on('click', '.download-info', function() {
            var name;
            name = $(this).attr('data-name');
            return _paq.push(['trackEvent', 'Informationsdokument', 'Downloaded', name]);
        });

        $(document).on('click', '.download-note', function() {
            var name;
            name = $(this).attr('data-name');
            return _paq.push(['trackEvent', 'Notizen', 'Downloaded', name]);
        });

        $(document).on('click', '.monja', function() {
            alert("Monja is crying!");
        });

    }
}

export default Analytics;
