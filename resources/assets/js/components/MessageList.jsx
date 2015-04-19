import Message from "./Message.jsx";

var MessageList = React.createClass({
  render: function() {

        var messageNodes = this.props.data.map(function (message) {
            return (
                <Message key={message.id} title={message.title} content={message.content} colour={message.colour} />
            );
        });

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
