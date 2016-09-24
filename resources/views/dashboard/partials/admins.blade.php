<div class="ui four stackable cards">

    @foreach( $admins as $admin )

        <div class="card">
            <div class="content">

                <i class="right floated @if ( Auth::user()->firstname === 'root') spy @else doctor @endif icon"></i>

                <div class="header">
                    {{ $admin->firstname }} {{ $admin->lastname }}
                </div>

                <div class="meta">
                    LSF Benutzername: {{ $admin->username }}
                </div>

            </div>

            <div class="extra content">

                <div class="ui two buttons">

                    <div class="ui teal icon button"><i class="edit icon"></i></div>

                    <div class="ui red icon button @if ( $admin->username === 'root') disabled @endif"><i class="remove icon"></i></div>
                </div>

            </div>

        </div>

    @endforeach

</div>
