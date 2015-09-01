module.exports = function () {
// Zur Analytics Methode machen, die eine entsprechende Klasse benötigt, eine Bezeichnung und eine Aktion.
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

};
