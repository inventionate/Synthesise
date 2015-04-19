import Message from "./Message.jsx";

var MessageList = React.createClass({

    handleDeleteMessage: function (data) {
        this.props.submitDeleteMessage({
            id: data.id
        });
    },

    render: function() {

        var messageNodes = $.map(this.props.data, function (message, index) {
            return (
                <Message key={message.id} id={message.id} title={message.title} content={message.content} colour={message.colour} onDeleteMessage={this.handleDeleteMessage} />
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
