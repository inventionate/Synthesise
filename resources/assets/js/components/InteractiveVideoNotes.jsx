var InteractiveVideoNotes = React.createClass({

    //React.findDOMNode(this.refs.textarea).

    render: function ()
    {

        return (
            <section id="video-notes">
                <header>
                    <h3 className="hide">Notizen</h3>
                </header>

                <form className="ui form">

                    <div className="field">
                        <label htmlFor="note-content" className="hide">Notizen</label>
                        <textarea disabled="disabled"  id="note-content" placeholder="Wählen Sie ein »Fähnchen« und geben Sie Ihre Notizen ein." maxLength="500" ref="textarea" />
                    </div>

                </form>
                {/* Über eine Progressbar nachdenken (oder einfach direkt, "graceful" gespeichert) */}

            </section>
        );
    }
});

export default InteractiveVideoNotes;
