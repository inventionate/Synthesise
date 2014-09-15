document.addEventListener 'page:change', ->
  document.getElementById('animateZoom').className += 'animated zoomIn'
document.addEventListener 'page:fetch', ->
  document.getElementById('animateZoom').className += 'animated zoomIn'
  # document.addEventListener 'page:change', ->
  #   document.getElementById('animateShake').className += 'animated shake'
  # document.addEventListener 'page:fetch', ->
  #   document.getElementById('animateShake').className += 'animated shake'
