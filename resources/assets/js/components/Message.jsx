var Message = React.createClass({

    deleteMessage: function ()
    {
        this.props.onDeleteMessage({
            id: this.props.id
        });
    },

    editMessage: function ()
    {
        this.props.onEditMessage({
            id: this.props.id,
            title: this.props.title,
            content: this.props.content,
            colour: this.props.colour
        });
    },

    render: function ()
    {

        var messageClass = "ui " + this.props.colour + " message";

        return (
            <div className="message">

                <div className={messageClass}>
                    <i className="close icon" onClick={this.deleteMessage}></i>
                    <i className="edit icon" onClick={this.editMessage}></i>
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
