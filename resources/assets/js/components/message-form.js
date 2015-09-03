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
        $("#message-form")
        .modal({
            //transition: 'vertical flip',
            //closable: false,
            onHidden: function () {
                // Zurücksetzen aller Werte.
                $('.ui.form').form('reset');
            }
        });
    },

    methods: {
        openModal: function () {
            $("#message-form").modal('show');
        },

        closeModal: function () {
            $("#message-form").modal('hide');
        },

        submitMessage: function () {
            console.log("MESSAGE-FORM")
            console.log(this.title);
            console.log(this.content);

            // newMessage updaten
            this.newMessage = {
                title: this.title,
                content: this.content,
                // @todo colour noch dynamisieren!
                colour: 'default'
            };

            // Event startet, dass Nachricht gespeichert werden kann.
            this.$dispatch('storeMessage', this.newMessage);

            // Eingaben löschen.
            this.newMessage = {};
            this.title = '';
            this.content = '';
            this.colour = '';

            // Modal schließen.
            this.closeModal();
        }
    }

};
