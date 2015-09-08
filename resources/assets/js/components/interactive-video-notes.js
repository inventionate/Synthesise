module.exports = {

    template: require('./interactive-video-notes.template.html'),

    props: ['content'],

    ready: function () {
        $('#notes-progress').progress();
    },

    watch: {
        content: function () {
                this.$dispatch('changedContent', this.content);
        }
    }

};
