<template>
    <div id="message-form" class="ui modal">
        <div class="header">
            Neue Nachricht
        </div>
        <div class="content">

            <form class="ui form">

                <div class="required field">
                    <label for="title" class="hide">Titel</label>
                    <input name="title" placeholder="Bitte geben Sie einen Titel ein." ref="title" type="text" v-model="title">
                </div>

                <div class="required field">
                    <label for="content" class="hide">Inhalt</label>
                    <textarea name="content" placeholder="Bitte geben Sie Ihre Nachricht ein." maxlength="500" ref="content" v-model="content"></textarea>
                </div>

                <div class="inline fields" ref="colour">
                    <label for="colour">Hintergrundfarbe wählen:</label>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="default" v-model="colour">
                            <label>Grau</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="black" v-model="colour">
                            <label>Schwarz</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="yellow" v-model="colour">
                            <label>Gelb</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="green" v-model="colour">
                            <label>Grün</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="blue" v-model="colour">
                            <label>Blau</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="orange" v-model="colour">
                            <label>Orange</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="purple" v-model="colour">
                            <label>Violett</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="pink" v-model="colour">
                            <label>Pink</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="radio checkbox">
                            <input name="colour" type="radio" value="red" v-model="colour">
                            <label>Rot</label>
                        </div>
                    </div>
                </div>

                <div class="buttons">

                    <div class="ui black reset button" v-on:click="closeModal">
                        Abbrechen
                    </div>

                    <div class="ui positive right labeled submit icon button" v-on:click="submitMessage">
                        Erstellen
                        <i class="checkmark icon"></i>
                    </div>

                </div>

            </form>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                newMessage: {},
                title: '',
                content: '',
                colour: 'default',
                updateMessage: false,
                picked: 'purple'
            };
        },

        created() {
            var self = this;
            // Event listener zum Öffnen des Semantic Form-Modals (Vue.js Component Event System).
            this.$on('editMessage', function(message) {
                self.editMessage(message);
            });
            this.$on('openModal', function() {
                self.openModal();
            });
        },

        mounted() {
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
                onHidden() {
                    // Eingaben löschen.
                    self.newMessage = {};
                    self.title = '';
                    self.content = '';
                    self.colour = 'default';
                }
            });
        },

        methods: {
            openModal() {
                // Semantic UI Modal öffnen
                $("#message-form").modal('show');
            },

            closeModal() {
                // Semantic UI Modal schließen
                $("#message-form").modal('hide');
            },

            submitMessage() {
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

            editMessage(message) {
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
    }
</script>
