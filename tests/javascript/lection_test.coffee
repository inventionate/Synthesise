QUnit.module "Lection Testing",
  setup: ->
    sinon.spy _paq, 'push'
  teardown: ->
    _paq.push.restore()

# QUnit.test 'Tooltips loaded', (assert) ->
#   expect(1)
#
#   $.mockjax
#     url: 'http://etpm.de/getflags/'
#     type: 'GET'
#     contentType: "text/json"
#     responseText:
#       data: 'Hello'
#
#
#
#   tooltips = getTooltips('http://etpm.de')
#
#   alert tooltips
#
#   equal tooltips, ['Hello','Cuepoint'], 'Tooltips where generated.'


# $.get(currentURL + '/getflags/')
# .done (data) ->
#   cuepoints = data
#   return
# .fail ->
#   alert "ERROR: AJAX REQUEST \"GET FLAGS\" PROBLEM!"
# # Notizen ausblenden
# $('#notes').hide()
# # Cuepoints aktivieren
#
# # Für die iOS Version besser anklickbare Cuepoints über LESS gestalten
# # Sowieso für die Mobilversion eine geeignete Darstellungsform finden
#
# # In Mobilversionen nur auf dem horizontalen iPad AJAX erlauben.
# # Wenn keine Verbindung besteht warnen.
#
# $('.fp-controls:not(.fp-controls-bounded)').addClass('fp-controls-bounded')
# .on('mouseenter touchstart', ->
#   $('.fp-cuepoint').attr('data-toggle','tooltip')
#   for cuepoint in cuepoints
#     $('.fp-cuepoint' + _i).tooltip
#       title: cuepoint
# )
