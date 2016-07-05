<style>
</style>

<template>
    <div class="ui {{ colour }} message">
        <i class="close icon" v-on:click="removeMessage"></i>
        <!-- Über das Event System das Modal öffnen -->
        <i class="edit icon" v-on:click="editMessage"></i>
        <div class="header">
            {{ title }}
        </div>
        {{ content }}
    </div>
</template>

<script>
    module.exports = {

            props: [
                'id',
                'title',
                'content',
                'colour',
                'onEdit',
                'onRemove',
                'index'
            ],

            methods: {

                editMessage: function () {
                    this.onEdit(this.id, this.index);
                },

                removeMessage: function () {
                    this.onRemove(this.id, this.index);
                }

            }
    }
</script>
