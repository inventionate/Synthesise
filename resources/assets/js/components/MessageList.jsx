import Message from "./Message.jsx";

var MessageList = React.createClass({

    handleDeleteMessage: function (message) {
        this.props.submitDeleteMessage({
            id: message.id
        });
    },

    handleEditMessage: function (message) {
        this.props.openEditMessageForm({
            message
        });
    },

    render: function() {

        console.log(this.props.data);

        var messageNodes = $.map(this.props.data, function (message, index) {
            return (
                <Message key={message.id} id={message.id} title={message.title} content={message.content} colour={message.colour}
                    onDeleteMessage={this.handleDeleteMessage} onEditMessage={this.handleEditMessage} />
            );
        }.bind(this));

        return (
            <div className="message-list">
                <div className="ui top attached segment">
                    {messageNodes}
                </div>
            </div>
        );
    }
});

export default MessageList;
