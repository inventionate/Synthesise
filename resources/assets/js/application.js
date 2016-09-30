/*
 * Boot JavaScript environment.
 */
require('./bootstrap.js');

/*
 * Init Semantic UI.
 */
require('./semantic-animations.js');

/*
 * Init Piwik Analytics.
 */
require('./piwik-analytics.js');

/*
 * Site features.
 */
require('./navigation.js');
require('./cookie-bar.js');
require('./messages.js');
require('./infoblocks.js');
require('./lections.js');

/*
 * View specific scripts
 */
require('./views/dashboard.js');
require('./views/seminar.js');
require('./views/lection.js');

/*
 * Vue JS Framework.
 * Load Vue components and init application.
 */

import InteractiveVideo from './components/InteractiveVideo.vue';

if( $("main.vue")[0] )
{

    new Vue({
        el: 'main.vue',

        components: {
            InteractiveVideo
        }

    });

}
