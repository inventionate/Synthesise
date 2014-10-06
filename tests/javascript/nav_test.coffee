QUnit.test "Logout button deactivation", (assert) ->

  $fixture = $("#qunit-fixture")
  $fixture.append "<button id=\"btn-logout\">abmelden</button>"

  $("#btn-logout").trigger "click"

  # Checks if disabled class was added
  assert.ok $("#btn-logout").hasClass('disabled'), "A class was added."

  # Checks if dots where added
  assert.equal $("#btn-logout").text(), "abmelden...", "Three dots where added."
