<footer class="ui page grid">
    <div class="center aligned column">
        <p>
            <small>
                © 2012–{{ date("Y",time()) }} Gesamtkonzeption <span class="etpM"><b>e:t:p:M</b></span> Timo Hoyer | Mediengestaltung und Webentwicklung Fabian Mundt<br>
                <a href="{{ url('impressum') }}">Impressum</a>
                {{-- @todo Infoseite erstellen --}}
                | <a href="{{ url('promo') }}">Informationen zum <span class="etpM">e:t:p:M</span>-Konzept</a>
                {{-- @todo Evaluationsergebnisse --}}
                | <a href="https://etpm-dev.ph-karlsruhe.de/etpm-evaluation/" target="_blank">Evaluationsergebnisse</a>
                @if( ! Request::is('auth/login') )
                    <br> <a href="#etpM-de">nach oben</a>
                @endif
            </small>
        </p>
  </div>
</footer>
