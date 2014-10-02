{{-- Piwik --}}
<script type="text/javascript">
  var _paq = _paq || [];

  @if ( Auth::check() )
    @if ( Auth::user()->role === 'Teacher' )
      _paq.push(["setCustomVariable", 2, "Status", "MentorIn", "visit"]);
      _paq.push(["setCustomVariable", 3, "Status", "DozentIn", "visit"]);
    @else --}}
      _paq.push(["setCustomVariable", 1, "Status", "StudentIn", "visit"]);
    @endif
    _paq.push(['setUserId', '{{ Auth::user()->username }}']);
  @endif

  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://etpm-analytics.ph-karlsruhe.de/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="http://etpm-analytics.ph-karlsruhe.de/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>