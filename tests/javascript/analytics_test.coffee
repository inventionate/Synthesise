QUnit.module "Event Tracking Testing",
  setup: ->
    sinon.spy _paq, 'push'
  teardown: ->
    _paq.push.restore()

QUnit.asyncTest 'Text download tracking by click', (assert) ->

  $('#qunit-fixture').append "<a class='download-paper'
  data-name='Monja'></a>"

  $('.download-paper').trigger 'click'

  QUnit.start()

  ok _paq.push.calledWith([
    'Text',
    'Downloaded',
    'Monja'
  ]),'Piwik Analytics was pushed.'

QUnit.asyncTest 'Text download tracking by touchstart', (assert) ->

  $('#qunit-fixture').append "<a class='download-paper'
  data-name='Monja'></a>"

  $('.download-paper').trigger 'touchstart'

  QUnit.start()

  ok _paq.push.calledWith([
    'Text',
    'Downloaded',
    'Monja'
  ]),'Piwik Analytics was pushed.'

QUnit.asyncTest 'Further Literature download tracking by click', (assert) ->

  $('#qunit-fixture').append "<a class='download-further-literature'
  data-name='Timo'></a>"

  $('.download-further-literature').trigger 'click'

  QUnit.start()

  ok _paq.push.calledWith([
    'Weiterführende Literaturhinweise',
    'Downloaded',
    'Timo'
  ]),'Piwik Analytics was pushed.'

QUnit.asyncTest 'Further Literature download tracking by touchstart',
(assert) ->

  $('#qunit-fixture').append "<a class='download-further-literature'
  data-name='Timo'></a>"

  $('.download-further-literature').trigger 'touchstart'

  QUnit.start()

  ok _paq.push.calledWith([
    'Weiterführende Literaturhinweise',
    'Downloaded',
    'Timo'
  ]),'Piwik Analytics was pushed.'

QUnit.asyncTest 'Info download tracking by click', (assert) ->

  $('#qunit-fixture').append "<a class='download-info'
  data-name='Gabi'></a>"

  $('.download-info').trigger 'click'

  QUnit.start()

  ok _paq.push.calledWith([
    'Informationsdokument',
    'Downloaded',
    'Gabi'
  ]),'Piwik Analytics was pushed.'

QUnit.asyncTest 'Info download tracking by touchstart', (assert) ->

  $('#qunit-fixture').append "<a class='download-info'
  data-name='Gabi'></a>"

  $('.download-info').trigger 'touchstart'

  QUnit.start()

  ok _paq.push.calledWith([
    'Informationsdokument',
    'Downloaded',
    'Gabi'
  ]),'Piwik Analytics was pushed.'

QUnit.asyncTest 'Note download tracking by click', (assert) ->

  $('#qunit-fixture').append "<a class='download-note'
  data-name='Jonas'></a>"

  $('.download-note').trigger 'click'

  QUnit.start()

  ok _paq.push.calledWith([
    'Notizen',
    'Downloaded',
    'Jonas'
  ]),'Piwik Analytics was pushed.'

QUnit.asyncTest 'Note download tracking by touchstart', (assert) ->

  $('#qunit-fixture').append "<a class='download-note'
  data-name='Jonas'></a>"

  $('.download-note').trigger 'touchstart'

  QUnit.start()

  ok _paq.push.calledWith([
    'Notizen',
    'Downloaded',
    'Jonas'
  ]),'Piwik Analytics was pushed.'
