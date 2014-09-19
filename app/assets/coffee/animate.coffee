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
#
# jQuery Turbolink Info
# Führt das ready Event aus sobald Turbolinks page:load ausgeführt wurde.

$(document).on 'page:change', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Übergangsanimationen zwischen Seiten
  $('.change-fade').addClass('animated fadeIn')
  $('.change-fade-in').addClass('animated fadeIn')


$(document).on 'page:fetch', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Übergangsanimationen zwischen Seiten
  $('.change-fade').addClass('animated fadeOut')
  $('.change-fade-out').addClass('animated fadeOut')

$(document).ready ->
  # Die active Klasse der Navbar korrekt setzen.
  $('nav.navbar.navbar-default li').click ->
    $('nav.navbar.navbar-default li').removeClass('active')
    $(this).addClass('active')
  # Das Ausloggen sichtbar machen.
  $('#btn-logout').click ->
    $(this).attr("disabled", "disabled").append('…')
  # Das Faden auf der FAQ Seite kontrollieren
  $('a:not(.bounded)').addClass('bounded')
  .on('click', ->
    if( ! $(this).hasClass('link-letter') )
    #if( $(this:not(.link-letter)) )
      $('#main-content-hgf').addClass('change-fade-out'))
