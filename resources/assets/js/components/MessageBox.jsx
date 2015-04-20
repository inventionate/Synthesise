import MessageList from "./MessageList.jsx";
import MessageForm from "./MessageForm.jsx";

var MessageBox = React.createClass({

    getInitialState: function () {
        return {
            data: []
        };
    },


    loadMessagesFromServer: function ()
    {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            success: function(data) {
                this.setState({data: data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },

    createNewMessageOnServer: function (message)
    {
        // Optimistische updates um Geschwindigkeit zu simulieren

        // Aktuelle Daten abfragen
        var messages = this.state.data;

        var newID = 1;

        console.log(messages.length);

        // Auf aktuelle Daten zugreifen, ID auslesen und erhöhen
        if ( messages.length > 0 )
        {
            newID = messages[messages.length-1].id + 1;
        }

        // Wahrscheinliche ID der neuen Nachricht hinzufügen
        message.id = newID;

        // Neue komponente anhängen
        var newMessages = messages.concat([message]);

        // Datensatz aktualisieren
        this.setState({data: newMessages});

        // Asynchrone Abfrage
        $.ajax({
            url: this.props.url,
            type: 'POST',
            dataType: 'json',
            data: message,
            success: function(data) {
                this.loadMessagesFromServer();
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },

    deleteMessageFromServer: function(message)
    {
        // Optimistische updaten um Geschwindigkeit zu simulieren
        var messages = this.state.data;

        // Zu löschendes Objekt herausfiltern
        var newMessages = $.grep(messages, function(e){
            return e.id != message.id;
        });

        // Datensatz aktualisieren
        this.setState({data: newMessages});

        $.ajax({
            url: this.props.url + "/" + message.id,
            type: 'POST',
            data: {_method: 'delete'},
            success: function(data) {
                this.loadMessagesFromServer();
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },

    componentDidMount: function ()
    {
        // CSRF Token abfragenu
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        this.loadMessagesFromServer();
        // @todo Momentan wird "Long Polling" verwendet. Irgendwann wäre es ggf. sinnvoll auf WebSockets umzusteigen.
        setInterval(this.loadMessagesFromServer, this.props.pollInterval);
    },

    // Hier eine Ajaxabfrage einbauen.

    render: function ()
    {
        return(
            <div className="message-box">
                <h1 className="hide">Nachrichten</h1>
                <MessageList data={this.state.data} submitDeleteMessage={this.deleteMessageFromServer} />
                <MessageForm onSubmitNewMessage={this.createNewMessageOnServer} />
            </div>
        );
    }

});

export default MessageBox;
