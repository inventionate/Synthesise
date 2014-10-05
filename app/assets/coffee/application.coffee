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
# Genauso ist jedes Event immer als Single Page Event zu interpretieren!

# Um die Geschwindigkeit zu erhöhen den Übergangschache aktivieren.
# Allerdings problematisch bzgl. dynamischen Inhalten (vgl. Readme)
# Turbolinks.enableTransitionCache()
# PAGE:CHANGE EVENT - NEUE SEITE IST GERENDERT UND NEU GELADEN

$(document).on 'page:change', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Übergangsanimationen zwischen Seiten
  $('.change-fade').addClass('animated fadeIn')
  $('.change-fade-in').addClass('animated fadeIn')
  # Piwik Turbolinks
  # Hier ggf. auch das Link Tracking aktivieren?
  # Piwik Funktionalität testen!
  if window._paq?
    _paq.push ['setCustomUrl',document.URL]
    _paq.push ['setDocumentTitle',document.title]
    _paq.push ['trackPageView']
    _paq.push(['enableLinkTracking'])

# PAGE:FETCH EVENT - NEUE SEITE WIRD ABGERUFEN
$(document).on 'page:fetch', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Übergangsanimationen zwischen Seiten
  $('.change-fade:not(alert)').addClass('animated fadeOut')
  $('.change-fade-out').addClass('animated fadeOut')

# DOCUEMENT:READY = PAGE:LOAD - LETZTES EVENT DES LADEVORGANGS
# $(document).ready ->
  # Das  teilweise Faden von Seitenteilen kontrollieren
  # Im Blade wird change-fade-in für den exakten Request gesetzt.
  # Danach wird ein Event an alle Links gebunden. Wenn diese die .not-fade
  # Klasse haben, wird nicht ausgefadet. Sobald ein Link ohne die .not-fade
  # Klasse angeklickt wird wird die Seite ausgefadet.
  # Es sind also seitenspezifisch das Blade und ein CoffeeScript zu erstellen.
  # jQuery Delegated Event Handling verwenden!
$(document).on 'click', 'a, button', ->
  if ! $(this).hasClass('fade-not')
    $('.fade-partial').addClass('change-fade-out')
