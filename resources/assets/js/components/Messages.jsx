var SemanticTest = React.createClass({

    componentDidMount: function()
    {
        $('#new-message')
            .modal('setting', 'transition', 'vertical flip')
            .modal('attach events', '.new-message.button', 'show');
    },

    render: function()
    {
        return(
        <div>
            <div className="ui top attached segment">

                <div className="ui warning message">
                    <i className="close icon"></i>
                    <i className="edit icon"></i>
                    <div className="header">
                        You must register before you can do that!
                    </div>
                    Visit our registration page, then try again
                </div>

                <div className="ui divider"></div>

                <div className="ui info message">
                    <i className="close icon"></i>
                    <i className="edit icon"></i>
                    <div className="header">
                        You must register before you can do that!
                    </div>
                    Visit our registration page, then try again
                </div>

            </div>

            <div className="new-message ui bottom attached blue button">Neue Nachricht erstellen</div>

            <div id="new-message" className="ui modal">
                <div className="header">
                    Neue Nachricht
                </div>
                <div className="content">
                    <div className="ui form">
                        <div className="required field">
                            <label className="hide">Text</label>
                            <textarea></textarea>
                        </div>

                        <div className="inline fields">
                            <label for="colour">Hintergrundfarbe wählen:</label>
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
                                    <input name="colour" type="radio" />
                                    <label>Grün</label>
                                </div>
                            </div>
                            <div className="field">
                                <div className="ui radio checkbox">
                                    <input name="colour" type="radio" />
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
                            <div className="field">
                                <div className="ui radio checkbox">
                                    <input name="colour" type="radio" />
                                    <label>Aquamarin</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="actions">
                    <div className="ui black button">
                        Abbrechen
                    </div>
                    <div className="ui positive right labeled icon button">
                        Erstellen
                        <i className="checkmark icon"></i>
                    </div>
                </div>
            </div>

        </div>

        );
    }

});

export default SemanticTest;
