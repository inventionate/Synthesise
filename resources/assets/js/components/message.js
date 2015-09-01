module.exports = {

    template: require('./message.template.html'),

    data: function () {
            return {
                message: 'Hello Worls 2!'
            };
    },

    ready: function () {
            return this.fancyAlert();
    },

    methods: {
        fancyAlert: function () {
            return alert(this.message);
        }
    }
};
