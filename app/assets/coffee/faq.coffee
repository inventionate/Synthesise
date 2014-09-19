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
#    if( ! $(this).hasClass('link-letter') )
    if $(this).not('.link-letter')
      $('#main-content-hgf').addClass('change-fade-out'))
