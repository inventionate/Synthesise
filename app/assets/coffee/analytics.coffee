# PIWIK EVENT TRACKING

# PAPER DOWNLOAD
$(document).on 'click', '.download-paper', ->
  name = $(this).attr('data-name')
  _paq.push(['trackEvent', 'Text', 'Downloaded',name])

# FURTHER LITERATURE DOWNLOAD
$(document).on 'click', '.download-further-literature', ->
  name = $(this).attr('data-name')
  _paq.push(['trackEvent', 'Weiterführende Literaturhinweise',
  'Downloaded',name])

# INFO DOWNLOAD
$(document).on 'click', '.download-info', ->
  name = $(this).attr('data-name')
  _paq.push(['trackEvent', 'Informationsdokument',
  'Downloaded',name])

# NOTE DOWNLOAD
$(document).on 'click', '.download-note', ->
  name = $(this).attr('data-name')
  _paq.push(['trackEvent', 'Notizen', 'Downloaded',name])

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
