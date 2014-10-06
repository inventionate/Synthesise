QUnit.module 'Button Transformation Testing',
  setup: ->
    $('#qunit-fixture').append "<button id='btn-logout'>abmelden</button>"
    $('#btn-logout').trigger 'click'

QUnit.test 'Logout button has deactivate class', (assert) ->
  # Checks if disabled class was added
  assert.ok $('#btn-logout').hasClass('disabled'), 'A class was added.'

QUnit.test 'Logout button has three dots', (assert) ->
  # Checks if dots where added
  assert.equal $('#btn-logout').text(), 'abmelden...', 'Three dots where added.'
