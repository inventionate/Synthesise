# Die active Klasse der Navbar korrekt setzen.
$(document).on 'click', 'nav.navbar.navbar-default li', ->
  $('nav.navbar.navbar-default li').removeClass('active')
  $(this).addClass('active')
  # Das Ausloggen sichtbar machen.
$(document).on 'click', '#btn-logout' , ->
  $(this).attr("disabled", "disabled").append('...')
