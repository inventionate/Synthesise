# TURBOLINKS SETTING -------------------------------------------------

$(document).ready ->

  # GLOBAL SETTINGS -------------------------------------------------
  cuepointNumber = null
  cuepoints = null
  cuepointClicked = null
  notesHidden = true

  # URL ÜBERPRÜFEN --------------------------------------------------
  # Aktuelle URL für AJAX Requests und JS Ausfürhungen
  currentURL = document.URL

  if( currentURL.indexOf('online-lektionen') > -1 )

    # ES GILT HIER DIE BINDINGS ZU ÜBERPRÜFEN (WIE OFT WERDEN SIE AUSGEFÜHRT?!)

    # Flowplayer Logo verlinken
    $('.fp-logo')
    .attr('href','http://www.ph-karlsruhe.de/institute/ph/ew/etpm/')
    .attr('target','_blank')

    # CUEPOINTS ---------------------------------------------------

    #Tooltips generieren
    $.get(currentURL + '/getflags/')
    .done (data) ->
      cuepoints = data
      return
    .fail ->
      alert "ERROR: AJAX REQUEST \"GET FLAGS\" PROBLEM!"
    # Notizen ausblenden
    $('#notes').hide()
    # Cuepoints aktivieren

    # Für die iOS Version besser anklickbare Cuepoints über LESS gestalten
    # Sowieso für die Mobilversion eine geeignete Darstellungsform finden

    # In Mobilversionen nur auf dem horizontalen iPad AJAX erlauben.
    # Wenn keine Verbindung besteht warnen.

    $('.fp-controls:not(.bounded)').addClass('bounded')
    .on('mouseenter touchstart', ->
      $('.fp-cuepoint').attr('data-toggle','tooltip')
      for cuepoint in cuepoints
        $('.fp-cuepoint' + _i).tooltip
          title: cuepoint
    )
    # Aktiven Cuepoint definieren und Notizformular einblenden
    $('.fp-timeline:not(.bounded)').addClass('bounded')
    .on('click touchstart', '.fp-cuepoint', ->
      # Aktuelle Cuepoint Klasse abfragen
      cuepointNumber = $(this).attr('class')
      cuepointId = cuepointNumber.replace( /^\D+/g, '')
      # Aktiven Cuepoint identifizieren
      $('.fp-cuepoint').removeClass('active-cue')
      $('.fp-cuepoint' + cuepointId).addClass('active-cue')
      # AJAX GET ----------------------------------------------
      # Prozess sichtbar machen
      $('#ajax-info').addClass('progress-striped active')
      $('#ajax-info .progress-bar').removeClass('progress-bar-success')
      #  Ajax Request starten
      $.get(currentURL + '/getnotes/', {cuepointNumber: cuepointNumber})
      .done (data) ->
        $('#note-content').val(data)
        $('#notes header').html(cuepoints[cuepointId])
        $('#ajax-info').removeClass('progress-striped active')
        $('#ajax-info .progress-bar').addClass('progress-bar-success')
        # Notizen Toggle
        if !notesHidden and cuepointId is cuepointClicked + ' active-cue'
          $('#notes').slideUp()
          notesHidden = true
          $('#additional-content h3').css("margin-top","20px")
        else
          $('#notes').slideDown()
          notesHidden = false
          cuepointClicked = cuepointId
          $('#additional-content h3').css("margin-top","-10px")
        return
      .fail ->
        #alert "ERROR: AJAX REQUEST \"GET NOTES\" POROBLEM!"
        alert "Leider konnte keine Internetverbindung hergestellt werden.
  			 Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf.
         den technischen Support."
    )
    # AJAX POST --------------------------------------------------
    # CSRF Token abfragem.
    _csrf = $('input[name="_token"]').val()
    # POST based on jQuery TypeWatch
    $('#note-content').typeWatch
      # callback: The callback function
      callback: ->
        postURL = currentURL + '/postnotes'
        # Prozess sichtbar machen
        $('#ajax-info').addClass('progress-striped active')
        $('#ajax-info .progress-bar').removeClass('progress-bar-success')
        # Aktuelle Notizen abfragen
        noteContent = $('#note-content').val()
        # Ajax Request starten
        noteContent = $('#note-content').val()
        $.post(postURL, {note: noteContent, cuepointNumber: cuepointNumber, _token: _csrf})
        .done ->
          $('#ajax-info').removeClass('progress-striped active')
          $('#ajax-info .progress-bar').addClass('progress-bar-success')
          # Google Analytics Event Tracking
          # Todo: Update Piwik!
          # ga('send','event','Notiz','ajax',
  				# (decodeURIComponent(currentURL.substr(50)) +
  				# ': Fähnchen ' + cuepointNumber.substr(23)))
        .fail ->
          #alert "ERROR: AJAX REQUEST \" POST NOTES \" PROBLEM!"
          alert "Leider konnte keine Internetverbindung hergestellt werden.
  				 Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den
           technischen Support."
        return
      # wait: The number of milliseconds to wait after the the
  		# last key press before firing the callback
      wait: 500
      # highlight: Highlights the element when it receives focus
      highlight: false
      # captureLength: Minimum # of characters necessary to fire the callback
      captureLength: 3
