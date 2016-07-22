module.exports = function() {

        $('.scale').transition('scale in', 1000);

        $('.shake').transition('shake');

        $('.ui.checkbox').checkbox();

        $('.dropdown').dropdown({transition: 'drop'});

        $('.ui.accordion').accordion();

        // Navigation
        $('#submenu').click( function () {
            $('#subnav').toggle('slow');
        });

        // FAQ
        $('#faq-accordion').accordion({
            selector: {
                trigger: '.trigger.column'
            }
        });

        $('.ui.message.shake').transition('shake');

        $('#edit-faq')
            //.modal('setting', 'transition', 'vertical flip')
            .modal('attach events', '#edit-faq-button', 'show');

        $('#edit-lection')
            //.modal('setting', 'transition', 'vertical flip')
            .modal('attach events', 'td.edit > div.ui.button', 'show');

        $('td.edit > div.ui.button').click( function() {

            var name = $(this).attr('data-name');
            $('#edit-lection-name').attr('placeholder',name);

            var lecturer = $(this).attr('data-lecturer');
            $('#edit-lection-lecturer').attr('placeholder',lecturer);

            var section = $(this).attr('data-section');
            $('#edit-lection-section').attr('placeholder',section);

            var lectionAvailable = $(this).attr('data-lection-available');
            $('#edit-lection-available').val(lectionAvailable);

        });

};
