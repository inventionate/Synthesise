# Das Ausloggen sichtbar machen.

$(document).ready ->
  $(document).on 'click touchstart', '#btn-logout' , ->
    $(this).addClass("disabled").append('...')
