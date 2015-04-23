class Lection {

    constructor() {
        var cuepointClicked, cuepointNumber, cuepoints, currentURL, notesHidden, _csrf;
        currentURL = document.URL;
        $('a.btn').on('click', function() {
            return $('#notes').hide();
        });
        if (currentURL.indexOf('online-lektionen') > -1) {
            cuepointNumber = null;
            cuepoints = null;
            cuepointClicked = null;
            notesHidden = true;
            $('.fp-logo').attr('href', 'http://www.ph-karlsruhe.de/institute/ph/ew/etpm/').attr('target', '_blank');
            $.get(currentURL + '/getflags/').done(function(data) {
                cuepoints = data;
            }).fail(function() {
                return alert("ERROR: AJAX REQUEST \"GET FLAGS\" PROBLEM!");
            });
            $('#notes').hide();
            $('.fp-controls:not(.fp-controls-bounded)').addClass('fp-controls-bounded').on('mouseenter touchstart', function() {
                var cuepoint, _j, _len, _results;
                $('.fp-cuepoint').attr('data-toggle', 'tooltip');
                _results = [];
                for (_j = 0, _len = cuepoints.length; _j < _len; _j++) {
                    cuepoint = cuepoints[_j];
                    _results.push($('.fp-cuepoint' + _i).tooltip({
                        title: cuepoint
                    }));
                }
                return _results;
            });
            $('.fp-timeline:not(.fp-timeline-bounded)').addClass('fp-timeline-bounded').on('click', '.fp-cuepoint', function() {
                var cuepointId;
                cuepointNumber = $(this).attr('class');
                cuepointId = cuepointNumber.replace(/^\D+/g, '');
                $('.fp-cuepoint').removeClass('active-cue');
                $('.fp-cuepoint' + cuepointId).addClass('active-cue');
                $('#ajax-info').addClass('progress-striped active');
                $('#ajax-info .progress-bar').removeClass('progress-bar-success');
                return $.get(currentURL + '/getnotes/', {
                    cuepointNumber: cuepointNumber
                }).done(function(data) {
                    $('#note-content').val(data);
                    $('#notes header').html(cuepoints[cuepointId]);
                    $('#ajax-info').removeClass('progress-striped active');
                    $('#ajax-info .progress-bar').addClass('progress-bar-success');
                    if (!notesHidden && cuepointId === cuepointClicked + ' active-cue') {
                        $('#notes').slideUp();
                        notesHidden = true;
                        $('#additional-content h3').css("margin-top", "20px");
                    } else {
                        $('#notes').slideDown();
                        notesHidden = false;
                        cuepointClicked = cuepointId;
                        $('#additional-content h3').css("margin-top", "-10px");
                    }
                }).fail(function() {
                    return alert("Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.");
                });
            });
            _csrf = $('input[name="_token"]').val();
            return $('#note-content').typeWatch({
                callback: function() {
                    var noteContent, postURL;
                    postURL = currentURL + '/postnotes';
                    $('#ajax-info').addClass('progress-striped active');
                    $('#ajax-info .progress-bar').removeClass('progress-bar-success');
                    noteContent = $('#note-content').val();
                    $.post(postURL, {
                        note: noteContent,
                        cuepointNumber: cuepointNumber,
                        _token: _csrf
                    }).done(function() {
                        $('#ajax-info').removeClass('progress-striped active');
                        $('#ajax-info .progress-bar').addClass('progress-bar-success');
                        return _paq.push(['trackEvent', 'Notiz', 'verändert', decodeURIComponent(currentURL.substr(50)) + ': Fähnchen ' + cuepointNumber.substr(23)]);
                    }).fail(function() {
                        return alert("Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.");
                    });
                },
                wait: 500,
                highlight: false,
                captureLength: 3
            });
        }
    }

}

export default Lection;
