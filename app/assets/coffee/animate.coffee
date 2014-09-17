# Turbolinks Events
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

$(document).on 'page:change', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Übergangsanimationen zwischen Seiten
  $('.change-fade').addClass('animated fadeIn')

$(document).on 'page:fetch', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Übergangsanimationen zwischen Seiten
  $('.change-fade').addClass('animated fadeOut')

$(document).ready ->
  $('nav.navbar.navbar-default li').click ->
    $('nav.navbar.navbar-default li').removeClass('active')
    $(this).addClass('active')
