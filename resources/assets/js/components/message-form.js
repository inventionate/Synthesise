module.exports = {

    template: require('./message-form.template.html'),

    data: function () {
        return {
            newMessage: {},
            title: '',
            content: '',
            colour: '',
            updateMessage: false
        };
    },

    created: function () {
        var self = this;
        // Event listener zum Öffnen des Semantic Form-Modals (Vue.js Component Event System).
        this.$on('editMessage', function(message) {
            self.editMessage(message);
        });
        this.$on('openModal', function() {
            self.openModal();
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
            // Semantic UI Modal öffnen
            $("#message-form").modal('show');
        },

        closeModal: function () {
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
            if ( this.updateMessage )
            {
                console.log("Jetzt wird editiert");
                this.$dispatch('updateMessage', this.newMessage);
                // Editiermodus deaktivieren
                this.updateMessage = false;
            }
            else
            {
                console.log("Jetzt wird kreiert");
                // Event startet, dass Nachricht gespeichert werden kann.
                this.$dispatch('storeMessage', this.newMessage);
            }

            // Modal schließen.
            this.closeModal();
        },

        editMessage: function (message) {
            // Editiermodus aktivieren
            this.updateMessage = true;
            // Zu editierende Nachricht laden
            this.title = message.title;
            this.content = message.content;
            // @todo colour noch dynamisieren!
            this.colour = 'default';
            // Modal öffnen
            this.openModal();
        }
    }

};
