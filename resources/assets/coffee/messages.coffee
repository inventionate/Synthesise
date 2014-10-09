# MESSAGES
$(document).ready ->

  if( document.URL.indexOf('dashboard') > -1 && $('#messages-manage').length )

    messages = null
    baseUrl = window.location.origin

    # NACHRICHT UPDATEN --------------------------------------------------------
    # PATCH api/v1/messages/{messages}
    # jQuery: POST mit data={_method: 'PATCH' }

    # Update bei verändertem Text
    $('.message-update-content').typeWatch
      callback: ->
        _csrf = $(this).prevAll('input[name="_token"]').val()
        _method = $(this).prevAll('input[name="_method"]').val()
        url = $(this).parent().attr('action')
        id = $(this).attr('id').match(/\d+/)[0]
        # Prozess sichtbar machen
        $('.ajax-info-' + id)
        .addClass('progress-striped active')
        $('.ajax-info-' + id + ' div:first-child')
        .removeClass('progress-bar-success')
        # Zu aktualisierende Inhalte abfragen
        message = $(this).val()
        type = $(this).nextAll('select').val()
        # Ajax Request starten
        $.post(url,
        {message: message, type: type, _token: _csrf, _method: _method})
        .done ->
          $('.ajax-info-' + id)
          .removeClass('progress-striped active')
          $('.ajax-info-' + id + ' div:first-child')
          .addClass('progress-bar-success')
        .fail ->
          alert "Leider konnte keine Internetverbindung hergestellt werden.
           Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den
           technischen Support."
        return
      wait: 500
      highlight: false
      captureLength: 1

    # Update bei verändertem Typen
    $('.message-update-type').on 'change', ->
      # Neue Auswahl auslesen
      selected = 'alert alert-' + $(this).val()
      messageAlert = $(this).parent().parent()
      select = $(this)
      id = $(this).attr('id').match(/\d+/)[0]
      # Ajax Request starten
      # @todo Refactorn DRY!
      _csrf = $(this).prevAll('input[name="_token"]').val()
      _method = $(this).prevAll('input[name="_method"]').val()
      url = $(this).parent().attr('action')
      # Prozess sichtbar machen
      $('.ajax-info-' + id)
      .addClass('progress-striped active')
      $('.ajax-info-' + id + ' div:first-child')
      .removeClass('progress-bar-success')
      # Zu aktualisierende Inhalte abfragen
      message = $(this).prevAll('textarea').val()
      type = $(this).val()
      # Ajax Request starten
      $.post(url,
      {message: message, type: type, _token: _csrf, _method: _method})
      .done ->
        $('.ajax-info-' + id)
        .removeClass('progress-striped active')
        $('.ajax-info-' + id + ' div:first-child')
        .addClass('progress-bar-success')
        # Auswahl ändern
        messageAlert.removeClass().addClass(selected)
      .fail ->
        alert "Leider konnte keine Internetverbindung hergestellt werden.
         Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den
         technischen Support."

    # NACHRICHT LÖSCHEN --------------------------------------------------------
    # DELETE api/v1/messages/{messages}
    # jQuery: POST mit data={_method: 'DELETE' }

    $('.close').on 'click', ->
      # Aktuelle Nachricht auswählen
      messageAlert = $(this).parent().parent().parent()
      # Ajax Request starten
      # @todo Refactorn DRY!
      _csrf = $(this).prevAll('input[name="_token"]').val()
      _method = $(this).prevAll('input[name="_method"]').val()
      url = $(this).parent().attr('action')
      # Ajax Request starten
      $.post(url,
      {_token: _csrf, _method: _method})
      .done ->
        # Nachricht aus dem DOM löschen
        messageAlert.detach()
        # Zähler um eins verringern
        $('#messages-manage .badge')
        .text( Number($('#messages-manage .badge').text()) - 1 )
        if Number($('#messages-manage .badge').text()) == 0
          $('#collapse-current-messages').collapse()
          $('#collapse-new-message').collapse()
      .fail ->
        alert "Leider konnte keine Internetverbindung hergestellt werden.
         Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den
         technischen Support."

    # NEUE NACHRICHT LIVE AKTUALISIEREN ----------------------------------------
    $('#new-message div.alert select').on 'change', ->
      selected = 'alert alert-' + $(this).val()
      $(this).parent().parent().removeClass().addClass(selected)
