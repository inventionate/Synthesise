class SemanticAnimations {

    constructor ()
    {
        $('.scale').transition('scale in', 1000);

        $('.shake').transition('shake');

        $('.ui.checkbox').checkbox();

        $('.dropdown').dropdown({transition: 'drop'});

        $('.ui.accordion').accordion();

        $('.ui.message.shake').transition('shake');
    }

}

export default SemanticAnimations;
