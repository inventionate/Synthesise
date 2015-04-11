import Charts from "./Components/Charts.js";
import Lection from "./Components/Lection.js";
import Messages from "./Components/Messages.js";
import Analytics from "./Components/Analytics.js";
import Navigation from "./Components/Navigation.js";
import Videoplayer from "./Components/Videoplayer.js";

$( document ).ready( () => {

    $('.scale').transition('scale in', 1000);

    $('.shake').transition('shake');

    $('.ui.checkbox').checkbox();

    $('.dropdown').dropdown({transition: 'drop'});

    $('.ui.accordion').accordion();

    new Analytics();

    new Lection();

    new Navigation();

    new Videoplayer();

    if ( document.URL.indexOf('/analytics') > -1 )
    {
        new Charts();
    }

    if( document.URL.indexOf('/') > -1 && $('#messages-manage').length )
    {
        new Messages();
    }

});
