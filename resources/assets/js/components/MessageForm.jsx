var MessageForm = React.createClass({

    componentDidMount: function()
    {
        // Semantic UI DOM Manipulationen durchführen.
        $("#new-message")
            .modal({
                detachable: false,
                transition: 'vertical flip',
                onHidden: function () {
                    $('#new-message')[0].reset();
                }
            });
            //.modal('attach events', '.new-message.button', 'show');

        $('.ui.radio.checkbox').checkbox();

    },

    openModal: function() {

        $("#new-message").modal('show');

    },

    render: function()
    {
        return (
            <div className="message-form">

                <div className="new-message ui bottom attached teal button" onClick={this.openModal} >Neue Nachricht erstellen</div>



                <form id="new-message" className="ui modal">
                    <div className="header">
                        Neue Nachricht
                    </div>
                    <div className="content">
                        <div className="ui form">

                            <div className="required field">
                                <label className="hide">Titel</label>
                                <input placeholder="Titel eingeben" defaultValue=""  />
                            </div>

                            <div className="required field">
                                <label className="hide">Inhalt</label>
                                <textarea placeholder="Nachricht eingeben"></textarea>
                            </div>

                            <div className="inline fields">
                                <label htmlFor="colour">Hintergrundfarbe wählen:</label>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" checked="" type="radio" />
                                        <label>Schwarz</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" />
                                        <label>Gelb</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" value="green" />
                                        <label>Grün</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" value="blue" />
                                        <label>Blau</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" />
                                        <label>Orange</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" />
                                        <label>Violett</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" />
                                        <label>Pink</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" />
                                        <label>Rot</label>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div className="actions">
                        <button className="ui black button" type="reset">
                            Abbrechen
                        </button>
                        <button className="ui positive right labeled icon button" type="submit">
                            Erstellen
                            <i className="checkmark icon"></i>
                        </button>
                    </div>
                </form>

            </div>
        );
    }

});

export default MessageForm;
