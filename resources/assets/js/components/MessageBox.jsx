import MessageList from "./MessageList.jsx";
import MessageForm from "./MessageForm.jsx";

var MessageBox = React.createClass({

    getInitialState: function () {
        return {
            data: [],
            latestMessageID: 1,
            modalType: 'default',
            editData: []
        };
    },

    loadMessagesFromServer: function ()
    {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            success: function(data) {
                var id = 1;
                if ( data.length > 0 )
                {
                    id = data[data.length-1].id + 1;
                }
                this.setState({
                    data: data,
                    modalType: this.state.modalType,
                    latestMessageID: id
                });
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },

    createNewMessageOnServer: function (message)
    {
        // Das aktuelle Problem besteht darin, dass die editierte Message angehängt wird anstatt die vorhandene zu ersetzen.

        // Asynchrone Abfrage
        if ( this.state.visible === 'default' )
        {

            // Optimistische updates um Geschwindigkeit zu simulieren

            // Aktuelle Daten abfragen
            var messages = this.state.data;

            // Neue komponente anhängen
            var newMessages = messages.concat([message]);

            // Datensatz aktualisieren
            this.setState({data: newMessages});

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
        }
        else
        {
            var id = message.id;
            delete message.id;

            console.log (message);

            $.ajax({
                url: this.props.url + "/" + id,
                type: 'PUT',
                dataType: 'json',
                data: message,
                success: function(data) {
                    this.loadMessagesFromServer();
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(this.props.url, status, err.toString());
                }.bind(this)
            });
        }
        this.setState({
            modalType: 'default'
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

    handleEditMessageForm: function (message) {

        this.setState({
            modalType: 'edit',
            editData: message
        });
    },

    handleCloseModal: function (status) {

        this.setState({
            modalType: status,
            editData: []
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

        if ( this.state.visible === 'hide' )
        {
            setInterval(this.loadMessagesFromServer, this.props.pollInterval);
        }
    },

    // Hier eine Ajaxabfrage einbauen.

    render: function ()
    {
        return(
            <div className="message-box">
                <h1 className="hide">Nachrichten</h1>
                <MessageList
                    data={this.state.data}
                    submitDeleteMessage={this.deleteMessageFromServer}
                    openEditMessageForm={this.handleEditMessageForm} />
                <MessageForm
                    onSubmitNewMessage={this.createNewMessageOnServer}
                    onCloseModal={this.handleCloseModal}
                    modalType={this.state.modalType}
                    editData={this.state.editData}
                    latestMessageID={this.state.latestMessageID} />
            </div>
        );
    }

});

export default MessageBox;
