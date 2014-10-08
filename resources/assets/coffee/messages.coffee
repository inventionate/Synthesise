# MESSAGES
$(document).ready ->

  if( document.URL.indexOf('dashboard') > -1 && $('#messages-manage').length )

    messages = null
    baseUrl = window.location.origin

    # MESSAGES ABFRAGEN ---------------------------------------------------
    # $.getJSON(baseUrl + '/api/v1/messages')
    # .done (data) ->
    #   messages = data
    #   # Messages einblenden
    #   for object, key of messages
    #     #object
    #     $('#current-messages').append "<div id=\"message-#{key.id} \"
    #     class=\"alert alert-#{key.type}\" role=\"alert\"> #{key.message} </div>"
    #
    #     console.log object + '\n' +
    #     'id: ' + key.id + '\n' +
    #     'Nachricht: ' + key.message + '\n' +
    #     'Type:' + key.type
    #
    # .fail (data) ->
    #   alert "ERROR: AJAX REQUEST \"GET MESSAGES\" PROBLEM!" + JSON.parse(data)

    # # MESSAGE AKTUALISIEREN --------------------------------------------------
    # # CSRF Token abfragem.
    # _csrf = $('input[name="_token"]').val()
    # # POST based on jQuery TypeWatch
    # $('#note-content').typeWatch
    #   # callback: The callback function
    #   callback: ->
    #     postURL = currentURL + '/postnotes'
    #     # Prozess sichtbar machen
    #     $('#ajax-info').addClass('progress-striped active')
    #     $('#ajax-info .progress-bar').removeClass('progress-bar-success')
    #     # Aktuelle Notizen abfragen
    #     noteContent = $('#note-content').val()
    #     # Ajax Request starten
    #     $.post(postURL, {note: noteContent,
    #     cuepointNumber: cuepointNumber, _token: _csrf})
    #     .done ->
    #       $('#ajax-info').removeClass('progress-striped active')
    #       $('#ajax-info .progress-bar').addClass('progress-bar-success')
    #       # Piwik Analytics Event Tracking
    #       _paq.push(['trackEvent', 'Notiz', 'verändert',
    #       (decodeURIComponent(currentURL.substr(50)) +
    #       ': Fähnchen ' + cuepointNumber.substr(23))])
    #     .fail ->
    #       #alert "ERROR: AJAX REQUEST \" POST NOTES \" PROBLEM!"
    #       alert "Leider konnte keine Internetverbindung hergestellt werden.
    #        Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den
    #        technischen Support."
    #     return
    #   # wait: The number of milliseconds to wait after the the
    #   # last key press before firing the callback
    #   wait: 500
    #   # highlight: Highlights the element when it receives focus
    #   highlight: false
    #   # captureLength: Minimum # of characters necessary to fire the callback
    #   captureLength: 3
