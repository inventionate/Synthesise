module.exports = {

    template: require('./message-form.template.html'),

    data: function () {
        return {
            newMessage: {},
            title: '',
            content: '',
            colour: 'default',
            updateMessage: false,
            picked: 'purple'
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
        // jQuery laden
        var $ = require('jquery');
        window.$ = $;
        window.jQuery = $;
        // Semantic UI laden
        require('../../semantic/dist/semantic.js');

        // Werte "global" zurücksetzen, sobald das Modal ausgeblendet wird.
        $('#message-form')
        // Formvalidierung
        .form({
            fields: {
                title: {
                    identifier  : 'title',
                        rules: [
                        {
                            type   : 'empty',
                            prompt : 'Bitte geben Sie einen Titel ein.'
                        }
                      ]
                    },
                    content: {
                        identifier  : 'content',
                        rules: [
                        {
                            type   : 'empty',
                            prompt : 'Bitte geben Sie eine Nachricht ein.'
                        }
                      ]
                    }
                }
            })
        .modal({
            onHidden: function () {
                // Eingaben löschen.
                self.newMessage = {};
                self.title = '';
                self.content = '';
                self.colour = 'default';
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
            // Formvalidierung
            if ( $('#message-form').form('is valid') )
            {

                // newMessage updaten
                this.newMessage = {
                    title: this.title,
                    content: this.content,
                    colour: this.colour
                };
                // Entscheidung, ob angelegt oder aktualisiert wird.
                if ( this.updateMessage )
                {
                    this.$dispatch('updateMessage', this.newMessage);
                    // Editiermodus deaktivieren
                    this.updateMessage = false;
                }
                else
                {
                    // Event startet, dass Nachricht gespeichert werden kann.
                    this.$dispatch('storeMessage', this.newMessage);
                }

                // Modal schließen.
                this.closeModal();
            }
        },

        editMessage: function (message) {
            // Editiermodus aktivieren
            this.updateMessage = true;
            // Zu editierende Nachricht laden
            this.title = message.title;
            this.content = message.content;
            this.colour = message.colour;
            // Modal öffnen
            this.openModal();
        }
    }

};
