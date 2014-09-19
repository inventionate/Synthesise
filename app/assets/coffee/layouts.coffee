# Turbolinks Events
# https://github.com/rails/turbolinks
# ----------------------------------------------------------------------------
# page:before-change Sobald ein Link geklickt wurde.
# page:fetch Eine neue Seite wird via PJAX abgerufen.
# page:receive Die Seite ist abgerufen aber nicht geparst.
# page:before-unload Die Seite ist geparst aber noch nicht gerendert.
# page:change Die Seite ist gerendert und neu geladen.
# page:update Die Seite ist via page:change und jQuery's ajaxSuccess abrufbar.
# page:load Letzes Event eines Ladevorgangs.
# ----------------------------------------------------------------------------
# Das page:before-change Event ist sehr instabil!
#
# Die Turbolink Events nicht innerhalb document.ready
# oder jQuery Funktionen verwenden!
#
# jQuery Turbolink Info
# Führt das ready Event aus sobald Turbolinks page:load ausgeführt wurde.
# Anscheinend dürfen die Turbolink Events nur einmal ausgeführt werden.

$(document).on 'page:change', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Übergangsanimationen zwischen Seiten
  $('.change-fade').addClass('animated fadeIn')
  $('.change-fade-in').addClass('animated fadeIn')
  # Piwik Turbolinks
  if window._paq?
    _paq.push ['trackPageview']
  else if window.piwikTracker?
    piwikTracker.trackPageview()

$(document).on 'page:fetch', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Übergangsanimationen zwischen Seiten
  $('.change-fade:not(alert)').addClass('animated fadeOut')
  $('.change-fade-out').addClass('animated fadeOut')
