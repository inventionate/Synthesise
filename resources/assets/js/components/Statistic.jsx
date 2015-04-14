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
              <div className="header">
                You must register before you can do that!
              </div>
              Visit our registration page, then try again
            </div>

            <div className="ui divider"></div>

            <div className="ui info message">
              <i className="close icon"></i>
              <div className="header">
                You must register before you can do that!
              </div>
              Visit our registration page, then try again
            </div>

        </div>
            <div className="new-message ui bottom attached blue button">Neue Nachricht erstellen</div>

            // @todo: Eigene Komponente inkl. AJAX Abfragen (CSRF Token über die Meta-Tag Idee).
            <div id="new-message" className="ui modal">
              <div className="header">
                Neue Nachricht
              </div>
              <div className="content">
                <div className="ui medium image">
                  <img src="/images/avatar/large/chris.jpg" />
                </div>
                <div className="description">
                  <div className="ui header">We've auto-chosen a profile image for you.</div>
                  <p>We've grabbed the following image from the <a href="https://www.gravatar.com" target="_blank">gravatar</a> image associated with your registered e-mail address.</p>
                  <p>Is it okay to use this photo?</p>
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
