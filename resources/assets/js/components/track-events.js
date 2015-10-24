module.exports = function (type, name) {

    // Syntax, um die Trackingfunktion zu verwenden:
    // <div class="foo" v-on:click="trackEvent(type, name)">…

    return _paq.push(['trackEvent', type, 'Downloaded', name]);
};
