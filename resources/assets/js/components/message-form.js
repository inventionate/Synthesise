module.exports = {

    template: require('./message-form.template.html'),

    data: function () {
        return {
            newMessage: {},
            title: '',
            content: '',
            colour: ''
        };
    },

    created: function () {
        // Event listener zum Öffnen des Semantic Form-Modals (Vue.js Component Event System).
        this.$on('openModal', function() {
            this.openModal();
        });
    },

    ready: function () {
        var self = this;

        // Werte "global" zurücksetzen, sobald das Modal ausgeblendet wird.
        $("#message-form").modal({
            onHidden: function () {
                // Eingaben löschen.
                self.newMessage = {};
                self.title = '';
                self.content = '';
                self.colour = '';
            }
        });
    },

    methods: {
        openModal: function () {
            $("#message-form").modal('show');
        },

        closeModal: function () {
            var self = this;

            // Semantic UI Modal schließen
            $("#message-form").modal('hide');
        },

        submitMessage: function () {
            // newMessage updaten
            this.newMessage = {
                title: this.title,
                content: this.content,
                // @todo colour noch dynamisieren!
                colour: 'default'
            };

            // Event startet, dass Nachricht gespeichert werden kann.
            this.$dispatch('storeMessage', this.newMessage);

            // Modal schließen.
            this.closeModal();
        }
    }

};
