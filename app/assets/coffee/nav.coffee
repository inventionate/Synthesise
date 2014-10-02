# $(document).ready ->
#   # Die active Klasse der Navbar korrekt setzen.
#   $('nav.navbar.navbar-default li:not(.li-bounded)').addClass('li-bounded')
#   .on('click', ->
#     $('nav.navbar.navbar-default li').removeClass('active')
#     $(this).addClass('active'))
#   # Das Ausloggen sichtbar machen.
#   $('#btn-logout:not(.btn-logout-bounded)').addClass('btn-logout-bounded')
#   .on('click', ->
#     $(this).attr("disabled", "disabled").append('...'))

# Die active Klasse der Navbar korrekt setzen.
$(document).on 'click', 'nav.navbar.navbar-default li', ->
  $('nav.navbar.navbar-default li').removeClass('active')
  $(this).addClass('active')
  # Das Ausloggen sichtbar machen.
$(document).on 'click', '#btn-logout' , ->
  $(this).attr("disabled", "disabled").append('...')
