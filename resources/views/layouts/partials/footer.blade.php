<footer class="ui page grid">
  <div class="center aligned column">
  <p>
    <small>
      © 2012–{{ date("Y",time()) }} Gesamtkonzeption <span class="etpM"><b>e:t:p:M</b></span> Timo Hoyer | Mediengestaltung und Webentwicklung Fabian Mundt<br> <a href="{{ url('impressum') }}">Impressum</a> @if( ! Request::is('auth/login') ) | <a href="#etpM-de">Nach oben</a> @endif
    </small>
  </p>
  </div>
</footer>
