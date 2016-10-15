{{-- Piwik --}}
<script type="text/javascript">
  var _paq = _paq || [];

  @if ( Auth::check() )
    @if ( Auth::user()->role === 'Admin' )
      _paq.push(["setCustomVariable", 4, "Status", "Administartor/in", "visit"]);
    @elseif ( Auth::user()->role === 'Teacher'  )
      _paq.push(["setCustomVariable", 3, "Status", "Dozent/in", "visit"]);
    @elseif ( Auth::user()->role === 'Mentor'  )
      _paq.push(["setCustomVariable", 2, "Status", "Mentor/in", "visit"]);
    @elseif ( Auth::user()->role === 'Student'  )
      _paq.push(["setCustomVariable", 1, "Status", "Student/in", "visit"]);
    @endif
    _paq.push(['setUserId', '{{ base64_encode(Auth::user()->username) }}']);
  @endif

  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://{{ $piwik_url }}";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', {{ $piwik_site_id }}]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="http://{{ $piwik_url }}/piwik.php?idsite={{ $piwik_site_id }}" style="border:0;" alt="" /></p></noscript>
