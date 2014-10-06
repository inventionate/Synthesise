# Das Ausloggen sichtbar machen.

$(document).ready ->
  $(document).on 'click', '#btn-logout' , ->
    $(this).addClass("disabled").append('...')
