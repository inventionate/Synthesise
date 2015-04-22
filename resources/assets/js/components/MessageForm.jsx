var MessageForm = React.createClass({

    getInitialState: function () {
        return {
            title: '',
            content: '',
            colour: 'default',
            stopUpdate: 'no'
        };
    },

    componentDidMount: function()
    {
        var self = this;

        // Semantic UI DOM Manipulationen durchführen.
        $("#new-message")
            .modal({
                detachable: false,
                transition: 'vertical flip',
                closable: false,
                onHidden: function () {
                    $('.ui.form').form('reset');
                }
            });

        $('.ui.radio.checkbox')
            .checkbox({
                onChecked: function ()
                {

                    // Titel und Inhalt updaten
                    self.updateMessage();

                    // Auswahl aktualisieren
                    $(this).prop("checked", true);

                    // Farbauswahl setzen
                    var colour = $(this).val();

                    self.setState({colour: colour});

                }
            });

        // Formvalidierung
        $('.ui.form')
            .form(
            {
                title: {
                  identifier  : 'title',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Bitte geben Sie einen Titel ein.'
                    }
                  ]
                },
                content: {
                  identifier  : 'content',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Bitte geben Sie eine Nachricht ein.'
                    }
                  ]
                }
            },
            {
                inline: true,
                on: 'blur',
                onSuccess: function() {
                    this.handleSubmit();
                    this.closeModal();
                }.bind(this)
            })
            .submit(function(event)
            {
                // Standardevent verhindern (wie wird der event aber übergeben durch Success?)
                return event.preventDefault();
            });
    },

    componentWillReceiveProps: function (nextProps) {

        if ( nextProps.modalType === 'edit' )
        {
            // Initalwerte für zu editierende Nachricht setzen
            this.setState({
                title: nextProps.editData.message.title,
                content: nextProps.editData.message.content,
                colour: nextProps.editData.message.colour
            });
        }

    },

    componentDidUpdate: function () {

        if ( this.props.modalType === 'edit' && this.state.stopUpdate === 'no' )
        {
            // Titel einfügen
            $("input[name='title']").val(this.state.title);

            // Inhalt einfügen
            $("textarea[name='content']").val(this.state.content);

            // Farbauwahl einfügen
            $("input[value='"+this.state.colour+"']").prop("checked", true);

            this.openModal();
        }

    },

    updateMessage: function () {

        // Titel auslesen
        var title = React.findDOMNode(this.refs.title).value.trim();

        // Inhalt auslesen
        var content = React.findDOMNode(this.refs.content).value.trim();

        this.setState({
            title: title,
            content: content
        });

    },

    openModal: function () {

        // Hier muss eigentlich rein, dass jetzt keine Updates mehr kommen sollen.
        this.setState({
            stopUpdate: 'yes'
        });

        $("#new-message").modal('show');

    },

    closeModal: function () {

        $("#new-message").modal('hide');

        this.setState({
            stopUpdate: 'no'
        });

        this.props.onCloseModal('default');

    },

    handleSubmit: function () {

        // Titel und Inhalt aktualisieren
        this.updateMessage();

        // Neue ID festlegen
        var id = this.props.latestMessageID;

        // Ist das Model im Editiermodus
        if ( this.props.modalType === 'edit' )
        {
            id = this.props.editData.message.id;
        }

        // Callback Datensatz
        this.props.onSubmitNewMessage({
            id: id,
            title: this.state.title,
            content: this.state.content,
            colour: this.state.colour
        });
        this.setState( this.getInitialState() );
        return;
    },

    render: function ()
    {
        return (
            <div className="message-form">

                <div className="new-message ui bottom attached teal button" onClick={this.openModal}>Neue Nachricht erstellen</div>

                {/* Modal */}

                <div id="new-message" className="ui modal">
                    <div className="header">
                        Neue Nachricht
                    </div>
                    <div className="content">

                        <form className="ui form">

                            <div className="required field">
                                <label htmlFor="title" className="hide">Titel</label>
                                <input name="title" placeholder="Titel eingeben." ref="title" type="text" />
                            </div>

                            <div className="required field">
                                <label htmlFor="content" className="hide">Inhalt</label>
                                <textarea name="content" placeholder="Nachricht eingeben." maxLength="500" ref="content" />
                            </div>

                            <div className="inline fields" ref="colour">
                                <label htmlFor="colour">Hintergrundfarbe wählen:</label>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" value="black" />
                                        <label>Schwarz</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" value="yellow" />
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
                                        <input name="colour" type="radio" value="orange" />
                                        <label>Orange</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" value="purple" />
                                        <label>Violett</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" value="pink" />
                                        <label>Pink</label>
                                    </div>
                                </div>
                                <div className="field">
                                    <div className="ui radio checkbox">
                                        <input name="colour" type="radio" value="red" />
                                        <label>Rot</label>
                                    </div>
                                </div>
                            </div>

                            <div className="buttons">

                                <div className="ui black reset button" onClick={this.closeModal}>
                                    Abbrechen
                                </div>

                                <div className="ui positive right labeled submit icon button">
                                    Erstellen
                                    <i className="checkmark icon"></i>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
        );
    }

});

export default MessageForm;
