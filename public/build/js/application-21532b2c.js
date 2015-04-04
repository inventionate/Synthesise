(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _interopRequireWildcard = function (obj) { return obj && obj.__esModule ? obj : { "default": obj }; };

var _Charts = require("./Components/Charts.js");

var _Charts2 = _interopRequireWildcard(_Charts);

var _Lection = require("./Components/Lection.js");

var _Lection2 = _interopRequireWildcard(_Lection);

var _Messages = require("./Components/Messages.js");

var _Messages2 = _interopRequireWildcard(_Messages);

var _Analytics = require("./Components/Analytics.js");

var _Analytics2 = _interopRequireWildcard(_Analytics);

var _Navigation = require("./Components/Navigation.js");

var _Navigation2 = _interopRequireWildcard(_Navigation);

var _Videoplayer = require("./Components/Videoplayer.js");

var _Videoplayer2 = _interopRequireWildcard(_Videoplayer);

$(document).ready(function () {

    $(".scale").transition("scale in", 1000);

    $(".shake").transition("shake");

    $(".ui.checkbox").checkbox();

    new _Analytics2["default"]();

    new _Lection2["default"]();

    new _Navigation2["default"]();

    new _Videoplayer2["default"]();

    if (document.URL.indexOf("/analytics") > -1) {
        new _Charts2["default"]();
    }

    if (document.URL.indexOf("/") > -1 && $("#messages-manage").length) {
        new _Messages2["default"]();
    }
});

},{"./Components/Analytics.js":2,"./Components/Charts.js":3,"./Components/Lection.js":4,"./Components/Messages.js":5,"./Components/Navigation.js":6,"./Components/Videoplayer.js":7}],2:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var Analytics =

// Dreckige Konvertierung des bestehenden Codes in einen modularen Umgang.

function Analytics() {
    _classCallCheck(this, Analytics);

    $(document).on('click', '.download-paper', function () {
        var name;
        name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Text', 'Downloaded', name]);
    });

    $(document).on('click', '.download-further-literature', function () {
        var name;
        name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Weiterführende Literaturhinweise', 'Downloaded', name]);
    });

    $(document).on('click', '.download-info', function () {
        var name;
        name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Informationsdokument', 'Downloaded', name]);
    });

    $(document).on('click', '.download-note', function () {
        var name;
        name = $(this).attr('data-name');
        return _paq.push(['trackEvent', 'Notizen', 'Downloaded', name]);
    });

    $(document).on('click', '.monja', function () {
        alert('Monja is crying!');
    });
};

exports['default'] = Analytics;
module.exports = exports['default'];

},{}],3:[function(require,module,exports){
"use strict";

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } };

Object.defineProperty(exports, "__esModule", {
  value: true
});

var Charts = function Charts() {
  _classCallCheck(this, Charts);

  var admins, downloadedPapers, downloadsCanvas, downloadsChart, downloadsData, downloadsOptions, mentors, playedVideos, playsCanvas, playsChart, playsData, playsOptions, semesterCanvas, semesterChart, semesterData, semesterOptions, students, uniqVisitors, visitorsCanvas, visitorsChart, visitorsData, visitorsOptions, visits;
  visitorsCanvas = $("#visitorsChart").get(0).getContext("2d");
  visitorsOptions = {
    responsive: true,
    animationEasing: "easeOut"
  };
  visitorsData = [{
    value: null,
    color: "#F7464A",
    highlight: "#FF5A5E",
    label: "StudentInnen"
  }, {
    value: null,
    color: "#46BFBD",
    highlight: "#5AD3D1",
    label: "DozentInnen"
  }, {
    value: null,
    color: "#FDB45C",
    highlight: "#FFC870",
    label: "MentorInnen"
  }];
  admins = $("#visitorsChart").attr("data-admins");
  students = $("#visitorsChart").attr("data-students");
  mentors = $("#visitorsChart").attr("data-mentors");
  visitorsData[0].value = parseInt(students);
  visitorsData[1].value = parseInt(admins);
  visitorsData[2].value = parseInt(mentors);
  visitorsChart = new Chart(visitorsCanvas).Pie(visitorsData, visitorsOptions);
  semesterCanvas = $("#semesterChart").get(0).getContext("2d");
  semesterOptions = {
    responsive: true,
    bezierCurve: false
  };
  semesterData = {
    labels: ["Oktober", "November", "Dezember", "Januar", "Februar"],
    datasets: [{
      label: "Seitenbesuche",
      fillColor: "rgba(220,220,220,0.2)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: null
    }, {
      label: "Besucher",
      fillColor: "rgba(151,187,205,0.2)",
      strokeColor: "rgba(151,187,205,1)",
      pointColor: "rgba(151,187,205,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(151,187,205,1)",
      data: null
    }]
  };
  visits = $("#semesterChart").attr("data-visits");
  uniqVisitors = $("#semesterChart").attr("data-uniq-visitors");
  semesterData.datasets[0].data = JSON.parse(visits);
  semesterData.datasets[1].data = JSON.parse(uniqVisitors);
  semesterChart = new Chart(semesterCanvas).Line(semesterData, semesterOptions);
  downloadsCanvas = $("#downloadsChart").get(0).getContext("2d");
  downloadsOptions = {
    responsive: true,
    bezierCurve: false
  };
  downloadsData = {
    labels: ["Oktober", "November", "Dezember", "Januar", "Februar"],
    datasets: [{
      label: "Heruntergeladene Texte",
      fillColor: "rgba(220,220,220,0.2)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: null
    }]
  };
  downloadedPapers = $("#downloadsChart").attr("data-downloaded-papers");
  downloadsData.datasets[0].data = JSON.parse(downloadedPapers);
  downloadsChart = new Chart(downloadsCanvas).Line(downloadsData, downloadsOptions);
  playsCanvas = $("#playsChart").get(0).getContext("2d");
  playsOptions = {
    responsive: true,
    bezierCurve: false
  };
  playsData = {
    labels: ["Oktober", "November", "Dezember", "Januar", "Februar"],
    datasets: [{
      label: "Abgespielte online-Lektionen",
      fillColor: "rgba(220,220,220,0.2)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: null
    }]
  };
  playedVideos = $("#playsChart").attr("data-plays");
  playsData.datasets[0].data = JSON.parse(playedVideos);
  playsChart = new Chart(playsCanvas).Line(playsData, playsOptions);
};

exports["default"] = Charts;
module.exports = exports["default"];

},{}],4:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var Lection = function Lection() {
    _classCallCheck(this, Lection);

    var cuepointClicked, cuepointNumber, cuepoints, currentURL, notesHidden, _csrf;
    currentURL = document.URL;
    $('a.btn').on('click', function () {
        return $('#notes').hide();
    });
    if (currentURL.indexOf('online-lektionen') > -1) {
        cuepointNumber = null;
        cuepoints = null;
        cuepointClicked = null;
        notesHidden = true;
        $('.fp-logo').attr('href', 'http://www.ph-karlsruhe.de/institute/ph/ew/etpm/').attr('target', '_blank');
        $.get(currentURL + '/getflags/').done(function (data) {
            cuepoints = data;
        }).fail(function () {
            return alert('ERROR: AJAX REQUEST "GET FLAGS" PROBLEM!');
        });
        $('#notes').hide();
        $('.fp-controls:not(.fp-controls-bounded)').addClass('fp-controls-bounded').on('mouseenter touchstart', function () {
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
        $('.fp-timeline:not(.fp-timeline-bounded)').addClass('fp-timeline-bounded').on('click', '.fp-cuepoint', function () {
            var cuepointId;
            cuepointNumber = $(this).attr('class');
            cuepointId = cuepointNumber.replace(/^\D+/g, '');
            $('.fp-cuepoint').removeClass('active-cue');
            $('.fp-cuepoint' + cuepointId).addClass('active-cue');
            $('#ajax-info').addClass('progress-striped active');
            $('#ajax-info .progress-bar').removeClass('progress-bar-success');
            return $.get(currentURL + '/getnotes/', {
                cuepointNumber: cuepointNumber
            }).done(function (data) {
                $('#note-content').val(data);
                $('#notes header').html(cuepoints[cuepointId]);
                $('#ajax-info').removeClass('progress-striped active');
                $('#ajax-info .progress-bar').addClass('progress-bar-success');
                if (!notesHidden && cuepointId === cuepointClicked + ' active-cue') {
                    $('#notes').slideUp();
                    notesHidden = true;
                    $('#additional-content h3').css('margin-top', '20px');
                } else {
                    $('#notes').slideDown();
                    notesHidden = false;
                    cuepointClicked = cuepointId;
                    $('#additional-content h3').css('margin-top', '-10px');
                }
            }).fail(function () {
                return alert('Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.');
            });
        });
        _csrf = $('input[name="_token"]').val();
        return $('#note-content').typeWatch({
            callback: function callback() {
                var noteContent, postURL;
                postURL = currentURL + '/postnotes';
                $('#ajax-info').addClass('progress-striped active');
                $('#ajax-info .progress-bar').removeClass('progress-bar-success');
                noteContent = $('#note-content').val();
                $.post(postURL, {
                    note: noteContent,
                    cuepointNumber: cuepointNumber,
                    _token: _csrf
                }).done(function () {
                    $('#ajax-info').removeClass('progress-striped active');
                    $('#ajax-info .progress-bar').addClass('progress-bar-success');
                    return _paq.push(['trackEvent', 'Notiz', 'verändert', decodeURIComponent(currentURL.substr(50)) + ': Fähnchen ' + cuepointNumber.substr(23)]);
                }).fail(function () {
                    return alert('Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.');
                });
            },
            wait: 500,
            highlight: false,
            captureLength: 3
        });
    }
};

exports['default'] = Lection;
module.exports = exports['default'];

},{}],5:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var Messages = function Messages() {
    _classCallCheck(this, Messages);

    var baseUrl, messages;

    messages = null;

    baseUrl = window.location.origin;

    $('.message-update-content').typeWatch({
        callback: function callback() {
            var id, message, type, url, _csrf, _method;
            _csrf = $(this).prevAll('input[name="_token"]').val();
            _method = $(this).prevAll('input[name="_method"]').val();
            url = $(this).parent().attr('action');
            id = $(this).attr('id').match(/\d+/)[0];
            $('.ajax-info-' + id).addClass('progress-striped active');
            $('.ajax-info-' + id + ' div:first-child').removeClass('progress-bar-success');
            message = $(this).val();
            type = $(this).nextAll('select').val();
            $.post(url, {
                message: message,
                type: type,
                _token: _csrf,
                _method: _method
            }).done(function () {
                $('.ajax-info-' + id).removeClass('progress-striped active');
                return $('.ajax-info-' + id + ' div:first-child').addClass('progress-bar-success');
            }).fail(function () {
                return alert('Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.');
            });
        },
        wait: 500,
        highlight: false,
        captureLength: 1
    });

    $('.message-update-type').on('change', function () {
        var id, message, messageAlert, select, selected, type, url, _csrf, _method;
        selected = 'alert alert-' + $(this).val();
        messageAlert = $(this).parent().parent();
        select = $(this);
        id = $(this).attr('id').match(/\d+/)[0];
        _csrf = $(this).prevAll('input[name="_token"]').val();
        _method = $(this).prevAll('input[name="_method"]').val();
        url = $(this).parent().attr('action');
        $('.ajax-info-' + id).addClass('progress-striped active');
        $('.ajax-info-' + id + ' div:first-child').removeClass('progress-bar-success');
        message = $(this).prevAll('textarea').val();
        type = $(this).val();
        return $.post(url, {
            message: message,
            type: type,
            _token: _csrf,
            _method: _method
        }).done(function () {
            $('.ajax-info-' + id).removeClass('progress-striped active');
            $('.ajax-info-' + id + ' div:first-child').addClass('progress-bar-success');
            return messageAlert.removeClass().addClass(selected);
        }).fail(function () {
            return alert('Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.');
        });
    });

    $('.close').on('click', function () {
        var messageAlert, url, _csrf, _method;
        messageAlert = $(this).parent().parent().parent();
        _csrf = $(this).prevAll('input[name="_token"]').val();
        _method = $(this).prevAll('input[name="_method"]').val();
        url = $(this).parent().attr('action');
        return $.post(url, {
            _token: _csrf,
            _method: _method
        }).done(function () {
            messageAlert.detach();
            $('#messages-manage .badge').text(Number($('#messages-manage .badge').text()) - 1);
            if (Number($('#messages-manage .badge').text()) === 0) {
                $('#collapse-current-messages').collapse();
                return $('#collapse-new-message').collapse();
            }
        }).fail(function () {
            return alert('Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.');
        });
    });

    $('#new-message div.alert select').on('change', function () {
        var selected;
        selected = 'alert alert-' + $(this).val();
        return $(this).parent().parent().removeClass().addClass(selected);
    });
};

exports['default'] = Messages;
module.exports = exports['default'];

},{}],6:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

Object.defineProperty(exports, '__esModule', {
    value: true
});

var Navigation = function Navigation() {
    var _this = this;

    _classCallCheck(this, Navigation);

    $(document).on('click', '#btn-logout', function () {
        $(_this).addClass('disabled').append('...');
    });
};

exports['default'] = Navigation;
module.exports = exports['default'];

},{}],7:[function(require,module,exports){
"use strict";

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } };

Object.defineProperty(exports, "__esModule", {
    value: true
});

var Videoplayer = function Videoplayer() {
    _classCallCheck(this, Videoplayer);

    var videoname;
    if ($(".flowplayer").length) {
        videoname = $(".flowplayer:first").attr("title");
        return $(".flowplayer:first").bind({
            load: function load(e, api) {
                return $(".flowplayer:first").spin();
            },
            ready: function ready(e, api) {
                return $(".flowplayer:first").spin(false);
            },
            resume: function resume(e, api) {
                return _paq.push(["trackEvent", "Video", "Abgespielt", videoname]);
            },
            pause: function pause(e, api) {
                return _paq.push(["trackEvent", "Video", "Pausiert", videoname]);
            },
            finish: function finish(e, api) {
                return _paq.push(["trackEvent", "Video", "Komplett angesehen", videoname]);
            },
            fullscreen: function fullscreen(e, api) {
                return _paq.push(["trackEvent", "Video", "Vollbild aktivieren", videoname]);
            },
            "fullscreen-exit": function fullscreenExit(e, api) {
                return _paq.push(["trackEvent", "Video", "Vollbild deaktivieren", videoname]);
            },
            error: function error(e, api) {
                return _paq.push(["trackEvent", "Video", "Fehler", videoname]);
            },
            seek: function seek(e, api) {
                return _paq.push(["trackEvent", "Video", "Springen", videoname]);
            },
            speed: function speed(e, api) {
                return _paq.push(["trackEvent", "Video", "Geschwindigkeit verändert", videoname]);
            }
        });
    }
};

exports["default"] = Videoplayer;
module.exports = exports["default"];

},{}]},{},[1]);
