module.exports = {

    template: require('./message.template.html'),

    props: [
        'id',
        'title',
        'content',
        'colour',
        'onEdit',
        'onRemove'
    ],

    methods: {

        editMessage: function () {
            this.onEdit(this.id, this.$index);
        },

        removeMessage: function () {
            this.onRemove(this.id, this.$index);
        }

    },

};
