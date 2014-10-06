QUnit.module "Videoplayer Testing",
  setup: ->
    $('#qunit-fixture').append "<div class='flowplayer'
    data-key='$443083014658956' title='Star Wars'><video></video>
    </div>"

    api = $(".flowplayer").data("flowplayer")
    sinon.spy _paq, 'push'
    sinon.spy flowplayer(), 'load'
  teardown: ->
    _paq.push.restore()
    flowplayer().restore()

QUnit.test 'Flowplayer Event fired.', (assert) ->


  #
  # <div class="flowplayer fixed-controls play-button is-splash"
  # data-generate_cuepoints="true"
  # @if( ! (Agent::isMobile() || Agent::isTablet()) )
  #   data-cuepoints="[{{ implode(',',$cuepoints->lists('cuepoint')) }}]"
  # @endif
  # data-key="$443083014658956"
  # data-logo="{{ asset('apple-touch-icon-precomposed.png') }}"
  # data-swf="{{ asset('flash/flowplayer.swf') }}"
  # title="{{{ $videoname }}}"
  # >
  api = flowplayer().resume()

  alert api.args

  ok _paq.push.calledWith([
      'Text',
      'Downloaded',
      'Monja'
    ]),'Piwik Analytics was pushed.'

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
