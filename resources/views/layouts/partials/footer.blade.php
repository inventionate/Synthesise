<footer class="ui page grid">
    <div class="center aligned column">
        <p>
            <small>
                © 2012–{{ date("Y",time()) }} Gesamtkonzeption <span class="etpM"><b>e:t:p:M</b></span> Timo Hoyer | Mediengestaltung und Webentwicklung Fabian Mundt<br>
                <a href="{{ url('impressum') }}">Impressum</a>
                | <a href="{{ url('demo') }}">Informationen zum <span class="etpM">e:t:p:M</span>-Konzept</a>
                | <a href="https://etpm-dev.ph-karlsruhe.de/etpm-evaluation/" target="_blank">Evaluationsergebnisse</a>
            </small>
            {{-- VERSION --}}
            <div id="version" class="ui mini basic label"><i class="code icon"></i> {{ env('VERSION') }}</div>
        </p>
  </div>
</footer>
