# QUnit.module "Videoplayer Testing",
#   setup: ->
#     sinon.spy _paq, 'push'
#     this.clock = sinon.useFakeTimers()
#   teardown: ->
#     _paq.push.restore()
#     this.clock.restore()

# QUnit.asyncTest 'Flowplayer Event fired.', (assert) ->

  # expect(1)
  #
  # $('#qunit-fixture').append "
  # <div class='player'>
  #   <video>
  #   <source type='video/webm'
  #   src='https://etpm.ph-karlsruhe.de/video/bildung_und_gerechtigkeit.webm'>
  #   </video>
  # </div>"
  #
  # $('.player').flowplayer()
  #
  # $('.player').trigger('load')
  #
  # api = $(".player").data("flowplayer")
  #
  # api.resume()
  #
  # alert _paq.args

  # ok _paq.push.calledWith([
  #     'Text',
  #     'Downloaded',
  #     'Monja'
  #   ]),'Piwik Analytics was pushed.'

#
#   QUnit.start()
#
#   ok _paq.push.calledWith([
#     'Text',
#     'Downloaded',
#     'Monja'
#   ]),'Piwik Analytics was pushed.'
#
# $(document).ready ->
#   if $('.flowplayer').length
#     videoname = $(".flowplayer:first").attr("title")
#     $(".flowplayer:first").bind
#       load: (e, api) ->
#         $('.flowplayer:first').spin()
#       ready: (e, api) ->
#         $('.flowplayer:first').spin(false)
#       resume: (e, api) ->
#         _paq.push [
#           "trackEvent"
#           "Video"
#           "Abgespielt"
#           videoname
#         ]
#       pause: (e, api) ->
#         _paq.push [
#           "trackEvent"
#           "Video"
#           "Pausiert"
#           videoname
#         ]
#       finish: (e, api) ->
#         _paq.push [
#           "trackEvent"
#           "Video"
#           "Komplett angesehen"
#           videoname
#         ]
#       fullscreen: (e, api) ->
#         _paq.push [
#           "trackEvent"
#           "Video"
#           "Vollbild aktivieren"
#           videoname
#         ]
#       "fullscreen-exit": (e, api) ->
#         _paq.push [
#           "trackEvent"
#           "Video"
#           "Vollbild deaktivieren"
#           videoname
#         ]
#       error: (e, api) ->
#         _paq.push [
#           "trackEvent"
#           "Video"
#           "Fehler"
#           videoname
#         ]
#       seek: (e, api) ->
#         _paq.push [
#           "trackEvent"
#           "Video"
#           "Springen"
#           videoname
#         ]
#       speed: (e, api) ->
#         _paq.push [
#           "trackEvent"
#           "Video"
#           "Geschwindigkeit verändert"
#           videoname
#         ]
