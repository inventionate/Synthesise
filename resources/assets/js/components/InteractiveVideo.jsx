var InteractiveVideo = React.createClass({

    //Aktuelles Video über ein data-attribut abfragen!
    getDefaultProps: function ()
    {
        return {
            name: '/video/mittelalter'
        };
    },

    componentDidMount: function ()
    {
        var videoplayer = videojs("videoplayer");
		videoplayer.markers({
			markers: [
			    {time: 60, text: "this"},
			    {time: 140,  text: "is"},
			    {time: 400,text: "so"},
                {time: 800,text: "cool!"}
			]
		});

    },

    render: function ()
    {
        return (
        <div>
            <video id="videoplayer" className="video-js vjs-sublime-skin vjs-big-play-centered"
                poster="/img/ol_title.jpg"
                data-setup='{ "controls": true, "autoplay": false, "preload": "auto", "width": "100%", "height": "100%" }'
                >
                <source type="video/mp4" src={this.props.name.toString() + ".mp4"} />
                <source type="video/webm" src={this.props.name.toString() + ".webm"} />
            </video>
            <img src="/img/etpm_logo.png" />
        </div>
        );
    }

});

export default InteractiveVideo;
