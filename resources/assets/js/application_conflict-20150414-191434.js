// Vanilla JS
import Analytics from "./Components/Analytics.js";
import SemanticAnimations from "./Components/SemanticAnimations.js";

// React JS Components
import Messages from "./Components/Messages.jsx";
import InteractiveVideo from "./Components/InteractiveVideo.jsx";
import Statistic from "./Components/Statistic.jsx";

$( document ).ready( () => {

    new Analytics();

    new SemanticAnimations();

    // @todo Nachrichten AJAX programmieren
    React.render(<Messages />, document.getElementById("messages-manage"));

    // @todo Interaktives Video erstellen
    React.render(<InteractiveVideo />, document.getElementById("interactive-video"));

    // Statistik ausgeben (mehrere Module mit variablen Einstellungen)
    React.render(<Statistic />, document.getElementById("statistic-plays"));


});
