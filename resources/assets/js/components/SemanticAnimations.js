class SemanticAnimations {

    constructor ()
    {
        $('.scale').transition('scale in', 1000);

        $('.shake').transition('shake');

        $('.ui.checkbox').checkbox();

        $('.dropdown').dropdown({transition: 'drop'});

        $('.ui.accordion').accordion();

        $('#faq-accordion').accordion({
            selector: {
                trigger: '.trigger.column'
            }
        });

        $('.ui.message.shake').transition('shake');

        $('#edit-lection')
            .modal('setting', 'transition', 'vertical flip')
            .modal('attach events', 'td.edit > div.ui.button', 'show');

        $('td.edit > div.ui.button').click( function() {

            var name = $(this).attr('data-name');
            $('#edit-lection-name').attr('placeholder',name);

            var lecturer = $(this).attr('data-lecturer');
            $('#edit-lection-lecturer').attr('placeholder',lecturer);

            var section = $(this).attr('data-section');
            $('#edit-lection-section').attr('placeholder',section);

        });
    }

}

export default SemanticAnimations;
