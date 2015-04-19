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

    deleteMessageFromServer: function(message)
    {
        $.ajax({
            url: this.props.url + "/" + message.id,
            type: 'POST',
            data: {_method: 'delete'},
            success: function(data) {
                this.setState({data: data});
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
                <MessageForm />
            </div>
        );
    }

});

export default MessageBox;
