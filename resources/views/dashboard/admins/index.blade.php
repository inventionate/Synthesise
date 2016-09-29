<div class="ui info message">
    <div class="header">
        Informationen zum »root«-User
    </div>

    <p>
        Der »root«-User wird während des Installationsvorgangs eingerichtet. Sie können lediglich das Passwort verändern. Beim »root«-User handelt es sich um einen Super-User, der die Rechte hat alle Inhalte zu verändern. Dieser Status wurd durch den Spion symbolisiert. Andere Administratoren werde durch ein Doktorsymbol gekennzeichnet und können beliebig konfiguriert werden. 
    </p>
</div>

<div class="ui four stackable cards">

    @foreach( $admins as $admin )

        <div class="card">
            <div class="content">

                <i class="right floated @if ( $admin->username === 'root') spy @else doctor @endif icon"></i>

                <div class="header">
                    {{ $admin->firstname }} {{ $admin->lastname }}
                </div>

                <div class="meta">
                    LSF Benutzername: {{ $admin->username }}
                </div>

            </div>

            <div class="extra content">

                <div class="ui two buttons">

                    <button class="ui teal icon button admin-edit" data-id="{{ $admin->id }}" data-username="{{ $admin->username }}" data-firstname="{{ $admin->firstname }}" data-lastname="{{ $admin->lastname }}" data-password="{{ bcrypt($admin->password) }}"><i class="edit icon"></i></button>

                    <form class="admin-delete" role="form" method="POST" action="{{ action('UserController@destroy', ['id' => $admin->id]) }}">

                        {{ method_field('DELETE') }}

                        {{ csrf_field() }}

                        <button class="ui red fluid icon button @if ( $admin->username === 'root') disabled @endif" type="submit"><i class="remove icon"></i></button>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

</div>
