// Vanilla JS
import Analytics from "./Components/Analytics.js";
import SemanticAnimations from "./Components/SemanticAnimations.js";

// React JS Components
import MessageBox from "./Components/MessageBox.jsx";
import InterativeVideo from "./Components/InteractiveVideo.jsx";
import Statistic from "./Components/Statistic.jsx";

$( document ).ready( () => {

    new Analytics();

    new SemanticAnimations();

    // @todo ReactKomponenten ggf. anders laden!
    if ( $("#interactive-video").length )
    {
        var name = $("#interactive-video").attr('data-name');
        React.render(<InterativeVideo name = {name} />, document.getElementById("interactive-video"));
    }
    if ( $("#messages-manage").length )
    {
        var url = $("#messages-manage").attr('data-url');
        var pollInterval = $("#messages-manage").attr('data-poll-interval');
        React.render(<MessageBox url = {url} pollInterval = {pollInterval} />, document.getElementById("messages-manage"));
    }
    if ( $("#statistic-plays").length )
    {
        React.render(<Statistic />, document.getElementById("statistic-plays"));
    }

});
