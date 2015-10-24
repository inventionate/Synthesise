module.exports = {

    // @todo index und id system evtl. angleichen, damit es synchron funktioniert und damit übersichtlicher wird.

    template: require('./message-manager.template.html'),

    props: [
        'url'
    ],

    data: function () {
        return {
            messages: [],
            indexOfEditedMessage: 0,
            idOfEditedMessage: 0
        };
    },

    created: function () {
        // Event listener zum Öffnen des Semantic Form-Modals (Vue Component Event System).
        this.$on('storeMessage', function(newMessage) {
            this.storeMessage(newMessage);
        });
        this.$on('updateMessage', function(newMessage) {
            this.updateMessage(newMessage);
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

        editMessage: function (id, index) {
            // Die entsprechende Nachricht übergeben.
            this.$broadcast('editMessage', this.messages[index]);
            // Den Index der editierten Nachricht setzen
            this.indexOfEditedMessage = index;
            this.idOfEditedMessage = id;
        },

        openForm: function () {
            // Semantic UI Formular öffnen.
            this.$broadcast('openModal');
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


        updateMessage: function (newMessage) {
            var self = this;

            // Datensatz aktualisieren.
            // Vor der AJAX Abfrage, um Geschwindigkeit zu simulieren.
            // Das direkte Tauschen der Arrayobjekte wird nicht von Vue erkannt. Daher mü+ssen spezielle Setter verwendet werden.
            this.messages.$set(this.indexOfEditedMessage, newMessage);

            // AJAX call um Datensatz vom Server zu löschen.
            this.$http.put(this.url + "/" + this.idOfEditedMessage, newMessage)
            .success( function () {
                // Nach erfolgreichem Löschen eine Abfrage zur Sicherheit starten.
                self.fetchMessages();
            })
            .error( function (data, status, request) {
                console.error('AJAX PUT Error: ', request.responseURL, status);
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
        }

    },

    components: {
        'message': require('./message.js'),
        'message-form': require('./message-form.js')
    }
};
