<li @if ( Request::is('manage') ) class="active" @endif><a href="{{ url('manage') }}">Manage</a></li>
<li @if ( Request::is('analytics') ) class="active" @endif><a href="{{ url('analytics') }}">Analytics</a></li>
