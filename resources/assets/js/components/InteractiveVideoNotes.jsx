var InteractiveVideoNotes = React.createClass({

    componentDidMount: function ()
    {
        $('#notes-progress').progress();
    },

    render: function ()
    {

        return (
            <section id="video-notes">
                <header>
                    <h3 className="hide">Notizen</h3>
                </header>

                <form id="notes-form" className="ui form">

                    <div className="field">
                        <label htmlFor="note-content" className="hide">Notizen</label>
                        <textarea disabled="disabled"  id="note-content" placeholder="Wählen Sie ein »Fähnchen« und geben Sie Ihre Notizen ein." maxLength="500" ref="textarea" />
                    </div>

                </form>
                <div id="notes-progress" className="ui disabled bottom attached green indicating progress" data-percent="100">
                    <div className="bar"></div>
                </div>

            </section>
        );
    }
});

export default InteractiveVideoNotes;
