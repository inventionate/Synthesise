class Messages {

    constructor() {
        
        var baseUrl, messages;

        messages = null;

        baseUrl = window.location.origin;

        $('.message-update-content').typeWatch({
            callback: function() {
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
                }).done(function() {
                    $('.ajax-info-' + id).removeClass('progress-striped active');
                    return $('.ajax-info-' + id + ' div:first-child').addClass('progress-bar-success');
                }).fail(function() {
                    return alert("Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.");
                });
            },
            wait: 500,
            highlight: false,
            captureLength: 1
        });

        $('.message-update-type').on('change', function() {
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
            }).done(function() {
                $('.ajax-info-' + id).removeClass('progress-striped active');
                $('.ajax-info-' + id + ' div:first-child').addClass('progress-bar-success');
                return messageAlert.removeClass().addClass(selected);
            }).fail(function() {
                return alert("Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.");
            });
        });

        $('.close').on('click', function() {
            var messageAlert, url, _csrf, _method;
            messageAlert = $(this).parent().parent().parent();
            _csrf = $(this).prevAll('input[name="_token"]').val();
            _method = $(this).prevAll('input[name="_method"]').val();
            url = $(this).parent().attr('action');
            return $.post(url, {
                _token: _csrf,
                _method: _method
            }).done(function() {
                messageAlert.detach();
                $('#messages-manage .badge').text(Number($('#messages-manage .badge').text()) - 1);
                if (Number($('#messages-manage .badge').text()) === 0) {
                    $('#collapse-current-messages').collapse();
                    return $('#collapse-new-message').collapse();
                }
            }).fail(function() {
                return alert("Leider konnte keine Internetverbindung hergestellt werden. Überprüfen Sie bitte Ihre Verbindung und wenden Sie sich ggf. den technischen Support.");
            });
        });

        $('#new-message div.alert select').on('change', function() {
            var selected;
            selected = 'alert alert-' + $(this).val();
            return $(this).parent().parent().removeClass().addClass(selected);
        });

    }

}

export default Messages;
