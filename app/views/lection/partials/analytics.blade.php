{{-- Piwik Flowplayer bindings --}}
<script type="text/javascript">
  $(".flowplayer:first").bind({
  	resume: function(e, api) {
  	  _paq.push(["trackEvent", "Video", "Abgespielt", "{{ $videoname }}"]);
  	},
  	pause: function(e, api) {
  		_paq.push(["trackEvent", "Video", "Pausiert", "{{ $videoname }}"]);
  	},
  	finish: function(e, api) {
  		_paq.push(["trackEvent", "Video", "Komplett angesehen", "{{ $videoname }}"]);
  	},
  	fullscreen: function(e, api) {
  		_paq.push(["trackEvent", "Video", "Vollbild aktivieren", "{{ $videoname }}"]);
  	},
  	"fullscreen-exit": function(e, api) {
  		_paq.push(["trackEvent", "Video", "Vollbild deaktivieren", "{{ $videoname }}"]);
  	},
  	error: function(e, api) {
  		_paq.push(["trackEvent", "Video", "Fehler", "{{ $videoname }}"]);
  	},
  	seek: function(e, api) {
  	   _paq.push(["trackEvent", "Video", "Springen", "{{ $videoname }}"]);
  	},
  	speed: function(e, api) {
  		_paq.push(["trackEvent", "Video", "Geschwindigkeit verändert", "{{ $videoname }}"]);
  	}
  });
</script>
