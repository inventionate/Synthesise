# PIWIK EVENT TRACKING

# PAPER DOWNLOAD
$(document).on 'click touchstart', '.download-paper', ->
  name = $(this).attr('data-name')
  _paq.push(['trackEvent', 'Text', 'Downloaded',name])

# FURTHER LITERATURE DOWNLOAD
$(document).on 'click touchstart', '.download-further-literature', ->
  name = $(this).attr('data-name')
  _paq.push(['trackEvent', 'Weiterführende Literaturhinweise',
  'Downloaded',name])

# INFO DOWNLOAD
$(document).on 'click touchstart', '.download-info', ->
  name = $(this).attr('data-name')
  _paq.push(['trackEvent', 'Informationsdokument',
  'Downloaded',name])

# NOTE DOWNLOAD
$(document).on 'click touchstart', '.download-note', ->
  name = $(this).attr('data-name')
  _paq.push(['trackEvent', 'Notizen', 'Downloaded',name])
