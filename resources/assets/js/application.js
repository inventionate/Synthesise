import HelloWorld from "./HelloWorld.jsx";
import Analytics from "./Analytics.js";
import Test from "./Test.js";

React.render(<HelloWorld />, document.getElementById("react"));

$( document ).ready( () => {
    new Analytics();
    var Mnews = new Test("Monja","Santner-Mundt");
    alert(Mnews.info());
    var Fnews = new Test("Fabian","Mundt");
    alert(Fnews.info());
});
