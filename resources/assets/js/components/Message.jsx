var Message = React.createClass({

    deleteMessage: function () {
        this.props.onDeleteMessage({
            id: this.props.id
        });
    },

    render: function () {

        var messageClass = "ui " + this.props.colour + " message";

        return (
            <div className="message">

                <div className={messageClass}>
                    <i className="close icon" onClick={this.deleteMessage} ></i>
                    <i className="edit icon"></i>
                    <div className="header">
                        {this.props.title}
                    </div>
                    {this.props.content}
                </div>

            </div>
        );
    }
});

export default Message;
