module.exports = {

    template: require('./message-manager.template.html'),

    props: [
        'url'
    ],

    data: function () {
        return {
            messages: []
        };
    },

    created: function () {
        // Event listener zum Öffnen des Semantic Form-Modals (Vue Component Event System).
        this.$on('storeMessage', function(newMessage) {
            this.storeMessage(newMessage);
        });
    },

    ready: function () {
        this.fetchMessages();
    },

    methods: {
        fetchMessages: function () {
            var self = this;

            // AJAX Abfrage.
            this.$http.get(this.url, function ( messages ) {
                self.messages = messages;
            })
            .error( function (data, status, request) {
                console.error('AJAX GET Error: ', request.responseURL, status);
            });
        },

        editMessage: function (id) {
            // Die entsprechende Nachricht übergeben.

            // Semantic Form Modal öffnen.
            this.openForm();
        },

        storeMessage: function (newMessage) {
            var self = this;

            // Datensatz aktualisieren
            // Vor der AJAX Abfrage, um Geschwindigkeit zu simulieren.
            this.messages.push(newMessage);

            // AJAX call um Datensatz auf dem Server zu speichern.
            this.$http.post(this.url, newMessage)
            .success( function () {
                // Datensatz abrufen
                self.fetchMessages();
            })
            .error( function (data, status, request) {
                console.error('AJAX POST Error: ', request.responseURL, status);
            });
        },

        removeMessage: function (id, index) {
            var self = this;

            // Datensatz aktualisieren.
            // Vor der AJAX Abfrage, um Geschwindigkeit zu simulieren.
            // Der Index beginnt bei 0, die id bei 1.
            this.messages.$remove(index);

            // AJAX call um Datensatz vom Server zu löschen.
            this.$http.delete(this.url + "/" + id)
            .success( function () {
                // Nach erfolgreichem Löschen eine Abfrage zur Sicherheit starten.
                self.fetchMessages();
            })
            .error( function (data, status, request) {
                console.error('AJAX DELETE Error: ', request.responseURL, status);
            });
        },

        openForm: function () {
            // Semantic Form Modal öffnen.
            this.$broadcast('openModal');
        }

    },

    components: {
        'message': require('./message.js'),
        'message-form': require('./message-form.js')
    }
};
