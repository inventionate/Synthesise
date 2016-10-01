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

/*
 * View specific scripts
 */
require('./views/dashboard/index.js');
require('./views/seminar/index.js');

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
