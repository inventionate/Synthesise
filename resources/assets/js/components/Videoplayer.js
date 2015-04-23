class Videoplayer {

    constructor() {

        var videoname;
        if ($('.flowplayer').length) {
            videoname = $(".flowplayer:first").attr("title");
            return $(".flowplayer:first").bind({
                load: function(e, api) {
                    return $('.flowplayer:first').spin();
                },
                ready: function(e, api) {
                    return $('.flowplayer:first').spin(false);
                },
                resume: function(e, api) {
                    return _paq.push(["trackEvent", "Video", "Abgespielt", videoname]);
                },
                pause: function(e, api) {
                    return _paq.push(["trackEvent", "Video", "Pausiert", videoname]);
                },
                finish: function(e, api) {
                    return _paq.push(["trackEvent", "Video", "Komplett angesehen", videoname]);
                },
                fullscreen: function(e, api) {
                    return _paq.push(["trackEvent", "Video", "Vollbild aktivieren", videoname]);
                },
                "fullscreen-exit": function(e, api) {
                    return _paq.push(["trackEvent", "Video", "Vollbild deaktivieren", videoname]);
                },
                error: function(e, api) {
                    return _paq.push(["trackEvent", "Video", "Fehler", videoname]);
                },
                seek: function(e, api) {
                    return _paq.push(["trackEvent", "Video", "Springen", videoname]);
                },
                speed: function(e, api) {
                    return _paq.push(["trackEvent", "Video", "Geschwindigkeit verändert", videoname]);
                }
            });
        }

    }

}

export default Videoplayer;
