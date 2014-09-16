$(document).on 'page:change', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Einblenden der via Turbolinks geladenen neuen Inhalte
  # $('.main.container').spin(false)
  $('.main.container').addClass('animated fadeIn')

$(document).on 'page:fetch', ->
  # Animation der Login Seite
  $('.animate-zoom-in').addClass('animated zoomIn')
  $('.animate-shake').addClass('animated shake')
  # Ausblenden der via Turbolinks geladenen neuen Inhalte
  # $('.main.container').spin()
  $('.main.container').addClass('animated fadeOut')
