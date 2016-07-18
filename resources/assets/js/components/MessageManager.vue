<style lang="less">
#messages-manage {
    .ui.message {
        min-height: 60px;
    }
    .ui.message > .close.icon {
        top: 0.75em;
        color: #009fda;
    }
    .close.icon + .edit.icon {
        cursor: pointer;
        position: absolute;
        margin: 0em;
        top: 2.55em;
        right: 0.5em;
        opacity: 0.7;
        transition: opacity 0.1s linear 0s;
        color: #009fda;
    }
    .close.icon + .edit.icon:hover {
        opacity: 1;
    }
    .message-list div {
        > .message {
            margin-bottom: 1.5em;
            padding-bottom: 1.5em;
            border-bottom: 1px solid #ddd;
        }
        > .message:last-child {
            margin-bottom: 0;
            border-bottom: none;
        }
    }
    .ui.form .buttons {
        background: #efefef;
        padding: 1rem 2rem;
        border-top: 1px solid rgba(39, 41, 43, 0.15);
        text-align: right;
        margin-left: -1.99rem;
        margin-right: -2rem;
        margin-bottom: -2rem;
        border-bottom-left-radius: 0.2857rem;
        border-bottom-right-radius: 0.2857rem;
        @media (max-width: 768px) {
            margin-left: -1rem;
            margin-right: -1rem;
            margin-bottom: -1rem;
        }
        :first-child {
            margin-right: 1rem;
        }
    }
}
</style>

<template>
    <div id="messages-manage">
        <h1 class="hide">Nachrichten</h1>

        <div id="message-list" class="ui top attached segment">

            <!-- Seit Vue 1.0.0 muss v-for verwendet werden und die Ergebnissen neu gebunden werden. -->
            <message v-for="message in messages" v-bind:title="message.title" v-bind:content="message.content" v-bind:colour="message.colour" v-bind:id="message.id" v-bind:index="$index" v-bind:on-remove="removeMessage" v-bind:on-edit="editMessage"></message>

        </div>

        <div class="new-message ui bottom attached teal button" v-on:click="openForm">Neue Nachricht erstellen</div>

        <message-form></message-form>

        <!-- <pre>
            {{ $data | json }}
        </pre> -->
    </div>
</template>

<script>
    import Message from './Message.vue';
    import MessageForm from './MessageForm.vue';

    export default {
        // @todo index und id system evtl. angleichen, damit es synchron funktioniert und damit übersichtlicher wird.

        props: [
            'url'
        ],

        data() {
            return {
                messages: [],
                indexOfEditedMessage: 0,
                idOfEditedMessage: 0
            };
        },

        created() {
            // Event listener zum Öffnen des Semantic Form-Modals (Vue Component Event System).
            this.$on('storeMessage', function(newMessage) {
                this.storeMessage(newMessage);
            });
            this.$on('updateMessage', function(newMessage) {
                this.updateMessage(newMessage);
            });
        },

        mounted() {
            this.fetchMessages();
        },

        methods: {
            fetchMessages() {
                var self = this;

                // AJAX Abfrage.
                this.$http.get(this.url, function ( messages ) {
                    self.messages = messages;
                })
                .error( function (data, status, request) {
                    console.error('AJAX GET Error: ', request.responseURL, status);
                });
            },

            editMessage(id, index) {
                // Die entsprechende Nachricht übergeben.
                this.$broadcast('editMessage', this.messages[index]);
                // Den Index der editierten Nachricht setzen
                this.indexOfEditedMessage = index;
                this.idOfEditedMessage = id;
            },

            openForm() {
                // Semantic UI Formular öffnen.
                this.$broadcast('openModal');
            },

            storeMessage(newMessage) {
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


            updateMessage(newMessage) {
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

            removeMessage(id, index) {
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
            Message,
            MessageForm
        }
    }
</script>
