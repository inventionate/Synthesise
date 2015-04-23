class Analytics {

    constructor ()
    {

        $(document)
        .on('click', '.download-paper', function() {
            var name = $(this).attr('data-name');
            return _paq.push(['trackEvent', 'Text', 'Downloaded', name]);
        })
        .on('click', '.download-further-literature', function() {
            var name = $(this).attr('data-name');
            return _paq.push(['trackEvent', 'Weiterführende Literaturhinweise', 'Downloaded', name]);
        })
        .on('click', '.download-info', function() {
            var name = $(this).attr('data-name');
            return _paq.push(['trackEvent', 'Informationsdokument', 'Downloaded', name]);
        })
        .on('click', '.download-note', function() {
            var name = $(this).attr('data-name');
            return _paq.push(['trackEvent', 'Notizen', 'Downloaded', name]);
        });

    }
}

export default Analytics;
