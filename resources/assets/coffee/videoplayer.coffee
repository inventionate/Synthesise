# FLOWPLAYER LOADING SPIN AND ANALYTICS

$(document).ready ->
  if $('.flowplayer').length
    videoname = $(".flowplayer:first").attr("title")
    $(".flowplayer:first").bind
      load: (e, api) ->
        $('.flowplayer:first').spin()
      ready: (e, api) ->
        $('.flowplayer:first').spin(false)
      resume: (e, api) ->
        _paq.push [
          "trackEvent"
          "Video"
          "Abgespielt"
          videoname
        ]
      pause: (e, api) ->
        _paq.push [
          "trackEvent"
          "Video"
          "Pausiert"
          videoname
        ]
      finish: (e, api) ->
        _paq.push [
          "trackEvent"
          "Video"
          "Komplett angesehen"
          videoname
        ]
      fullscreen: (e, api) ->
        _paq.push [
          "trackEvent"
          "Video"
          "Vollbild aktivieren"
          videoname
        ]
      "fullscreen-exit": (e, api) ->
        _paq.push [
          "trackEvent"
          "Video"
          "Vollbild deaktivieren"
          videoname
        ]
      error: (e, api) ->
        _paq.push [
          "trackEvent"
          "Video"
          "Fehler"
          videoname
        ]
      seek: (e, api) ->
        _paq.push [
          "trackEvent"
          "Video"
          "Springen"
          videoname
        ]
      speed: (e, api) ->
        _paq.push [
          "trackEvent"
          "Video"
          "Geschwindigkeit verändert"
          videoname
        ]
