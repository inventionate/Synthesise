<template>
    <section id="video-notes">
        <header>
            <h3 class="hide">Notizen</h3>
        </header>

        <form id="notes-form" class="ui form">

            <div class="field">
                <label for="note-content" class="hide">Notizen</label>
                <textarea disabled="disabled" id="note-content" placeholder="Wählen Sie ein »Fähnchen« und geben Sie Ihre Notizen ein." maxlength="500" v-bind:value="value" v-on:input="onInput"></textarea>
            </div>

        </form>
        <div id="notes-progress" class="ui disabled bottom attached green indicating progress" data-percent="100">
            <div class="bar"></div>
        </div>
    </section>

</template>

<script>
    export default {
        props: ['value'],

        computed: {
            localContent() {
                return this.content;
            }
        },

        mounted() {
            // jQuery laden
            var $ = require('jquery');
            window.$ = $;
            window.jQuery = $;
            // Semantic UI laden
            require('semantic-ui-css/semantic.js');

            $('#notes-progress').progress();
        },

        methods: {
            onInput: function (event) {
                this.$emit('input', event.target.value)
            }
        }
    }
</script>
