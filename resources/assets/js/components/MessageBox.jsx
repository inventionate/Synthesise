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
                // Länge des JSON Array überprüfen
                if ( Object.keys(data).length > 0 )
                {
                    id = data[Object.keys(data).length-1].id + 1;
                }
                this.setState({
                    data: data,
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
        // Asynchrone Abfrage
        if ( this.state.modalType === 'default' )
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

        // Long Polling problematisch, da es die Editierfunktion überschreibt
        setInterval(this.loadMessagesFromServer, this.props.pollInterval);
    },

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
