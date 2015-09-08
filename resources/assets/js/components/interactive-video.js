module.exports = {

    // @todo index und id system evtl. angleichen, damit es synchron funktioniert und damit übersichtlicher wird.

    template: require('./interactive-video.template.html'),

    props: [
        'name',
        'path',
        'markers',
        'poster'
    ],

    ready: function () {

    },

    components: {
        'message': require('./message.js')
    }
};
