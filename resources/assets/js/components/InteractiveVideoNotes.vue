<template>
    <section id="video-notes">
        <header>
            <h3 class="hide">Notizen</h3>
        </header>

        <form id="notes-form" class="ui form">

            <div class="field">
                <label for="note-content" class="hide">Notizen</label>
                <textarea disabled="disabled"  id="note-content" placeholder="Wählen Sie ein »Fähnchen« und geben Sie Ihre Notizen ein." maxlength="500" ref="note-content" v-model="content" debounce="500"></textarea>
            </div>

        </form>
        <div id="notes-progress" class="ui disabled bottom attached green indicating progress" data-percent="100">
            <div class="bar"></div>
        </div>
    </section>

</template>

<script>
    export default {
        props: ['content'],

        mounted() {
            // jQuery laden
            var $ = require('jquery');
            window.$ = $;
            window.jQuery = $;
            // Semantic UI laden
            require('../../semantic/dist/semantic.js');

            $('#notes-progress').progress();
        },

        watch: {
            content() {
                // @ todo: $dispatch und $broadcast sind deprecated in Vue 2!
                // Es gibt bereits einen Alternativvorschlag mit .on/.emit und mit Vuex. Ich präferiere momentan Variante 1.
                    this.$dispatch('changedContent', this.content);
            }
        }
    }
</script>
