module.exports = {

    template: require('./interactive-video-notes.template.html'),

    props: ['content'],

    ready: function () {
        // jQuery laden
        var $ = require('jquery');
        window.jQuery = $; 
        // Semantic UI laden
        require('../../semantic/dist/semantic.js');

        $('#notes-progress').progress();
    },

    watch: {
        content: function () {
                this.$dispatch('changedContent', this.content);
        }
    }

};
