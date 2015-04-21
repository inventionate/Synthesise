var MessageForm = React.createClass({

    // getInitialState: function() {
    //     return {
    //         colour: 'default'
    //     };
    // },

    componentDidMount: function()
    {
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
            .checkbox(
            // {
            //     onChecked: function () {
            //
            //         // Ausgewählte Farbe abfragen und Auswahl zurücksetzen
            //         var colour = $('.ui.radio.checkbox.checked input').val();
            //         $('.ui.radio.checkbox.checked').removeClass('checked');
            //
            //         // Ein neuer Satus der Farbe, rendert die Komponente neu. D. h., auch Titel und Content Updates müssen gespeichert oder übergeben werden.
            //
            //         // Farbe festlegen
            //         // this.setState({
            //         //     colour: colour
            //         // });
            //
            //     }.bind(this)
            // }
        );

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

    componentDidUpdate: function () {

        if ( this.props.modalType === 'edit' )
        {
            // Initialen Werte mit übergeben, so dass ein neuer Datensatz generiert werden kann, der wieder an die Box gesendet wird.

            // Titel einfügen
            $("input[name='title']").val(this.props.editData.message.title);

            // Inhalt einfügen
            $("textarea[name='content']").val(this.props.editData.message.content);

            // Farbauwahl einfügen
            $("input[value='"+this.props.editData.message.colour+"']").prop("checked", true);

            this.openModal();
        }

    },

    openModal: function () {

        $("#new-message").modal('show');

    },

    closeModal: function () {

        $("#new-message").modal('hide');

        $("input[value='"+this.props.editData.message.colour+"']").removeAttr('checked');

        this.props.onCloseModal('default');
    },

    handleSubmit: function () {

        // Variablenwerte auslesen
        var title = React.findDOMNode(this.refs.title).value.trim();
        var content = React.findDOMNode(this.refs.content).value.trim();
        var colour = 'default';
        // var colour = React.findDOMNode(this.refs.colour).


        var id = this.props.latestMessageID;

        // Die ausgewählte Farbe bestimmen!
        //var colour = this.props.props.editData.message.colour;

        // DAS PROBLEM IST DIE ÜBERGABE DER KORREKTEN FARBE (hier weg vom ^ und andere Lösung überlegen!!!!)
        // AM BESTEN ETWAS MIT findDOMNode oder so…


        // var colour = this.state.colour;

        // Ist das Model im Editiermodus
        if ( this.props.modalType === 'edit' )
        {
            console.log ("Es wird gerade editiert.");

            id = this.props.editData.message.id;
        }

        // Callback Datensatz
        this.props.onSubmitNewMessage({
            id: id,
            title: title,
            content: content,
            colour: colour
        });

        // Auf den  Ausgangsstatus zurücksetzen
        // this.replaceState(this.getInitialState());

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

                            <div className="inline fields">
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
