@extends('layouts.default')

@section('title')
  <title>Erziehungswissenschaftliche Grundfragen –
  TeilnehmerInnen Verwaltung</title>
@stop

@section('content')
<main id="main-content-{{ Request::segment(1) }}" class="ui centered page grid">

    <div class="fourteen wide column">

<h1>
    TeilnehmerInnen verwalten
</h1>

    <div class="ui warning message">
      <div class="header">
        Es wird lediglich das Hinzufügen von LSF Accounts unterstützt!
      </div>
      Im Moment unterstützt die App lediglich das hinzufügen von LSF Accounts über deren Benutzernamen. Bei einem erstmaligen Anmelden werden diese authentifiziert und vollständig verifiziert. <b>Erst danach sind hier alle Informationen zu sehen.</b> Eine komplette Benutzerverwaltung ist für die kommende Version vorgesehen.
    </div>

    @if (count($errors) > 0)
    <div class="ui error message">
        <div class="header">
            Fehler beim Erstellen der Benutzer/innen!
        </div>
        <ul class="list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>Administrator/innen</h2>

<table id="admin-user-table" class="ui @if( count($admins) != 1 ) definition @endif teal table">
  <thead class="full-width">
    <tr>
      @if( count($admins) != 1 ) <th></th> @endif
      <th>LSF Account</th>
      <th>Name</th>
      <th>E-Mail Adresse</th>
      <th>Verifiziert</th>
    </tr>
  </thead>
    <tbody>
        @foreach ($admins as $admin)

            <tr @if( $admin->username === Auth::user()->username ) class="disabled" @endif>

                @if( count($admins) != 1 )
                    <td class="collapsing">
                        @if( $admin->username != Auth::user()->username )
                            <div class="ui fitted slider checkbox">
                                <input type="checkbox" value="{{$admin->id}}">
                            </div>
                        @endif
                    </td>
                @endif

                <td>{{ $admin->username }}</td>

                <td>{{ $admin->firstname . ' ' . $admin->lastname }}</td>

                <td>{{ $admin->email }}</td>

                <td class="center aligned">
                    @if($admin->created_at != $admin->updated_at)
                        <i class="large green checkmark icon"></i>
                    @endif
                </td>
            </tr>

        @endforeach
  </tbody>
  <tfoot class="full-width">
    <tr>

      @if( count($admins) != 1 ) <th></th> @endif

      <th colspan="4">

        <div class="ui right floated small primary labeled icon button user-new">
          <i class="user icon"></i> Administrator/in hinzufügen
        </div>

        <form id="admin-user-delete-many" role="form" method="POST" action="{{ action('UserController@destroyMany') }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <button class="ui small red button disabled delete-many" type="submit">Löschen</i></button>

        </form>

        <form id="admin-user-delete-all" role="form" method="POST" action="{{ action('UserController@destroyAll', ['role' => 'Admin', 'except_ids' => Auth::user()->id]) }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <button class="ui small red button delete-all @if( count($admins) === 1 ) disabled @endif )" type="submit">Alle Löschen</button>

        </form>

      </th>
    </tr>
  </tfoot>
</table>


<h2>Mentor/innen</h2>

<table id="mentor-user-table" class="ui @if( count($mentors) != 0 ) definition @endif orange table">
  <thead class="full-width">
    <tr>
      @if( count($mentors) != 0 ) <th></th> @endif
      <th>LSF Account</th>
      <th>Name</th>
      <th>E-Mail Adresse</th>
      <th>Verifiziert</th>
    </tr>
  </thead>
    <tbody>
        @foreach ($mentors as $mentor)

            <tr>

                @if( count($mentors) != 0 )
                    <td class="collapsing">
                        <div class="ui fitted slider checkbox">
                            <input type="checkbox" value="{{$mentor->id}}">
                        </div>
                    </td>
                @endif

                <td>{{ $mentor->username }}</td>

                <td>{{ $mentor->firstname . ' ' . $mentor->lastname }}</td>

                <td>{{ $mentor->email }}</td>

                <td class="center aligned">
                    @if($mentor->created_at != $mentor->updated_at)
                        <i class="large green checkmark icon"></i>
                    @endif
                </td>
            </tr>

        @endforeach
  </tbody>
  <tfoot class="full-width">
    <tr>

      @if( count($mentors) != 0 ) <th></th> @endif

      <th colspan="4">

        <div class="ui right floated small primary labeled icon button user-new">
          <i class="user icon"></i> Mentor/in hinzufügen
        </div>

        <form id="mentor-user-delete-many" role="form" method="POST" action="{{ action('UserController@destroyMany') }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <button class="ui small red button disabled delete-many" type="submit">Löschen</i></button>

        </form>

        <form id="mentor-user-delete-all" role="form" method="POST" action="{{ action('UserController@destroyAll', ['role' => 'Teacher', 'except_ids' => Auth::user()->id]) }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <button class="ui small red button delete-all @if( count($mentors) === 0 ) disabled @endif )" type="submit">Alle Löschen</button>

        </form>

      </th>
    </tr>
  </tfoot>
</table>


<h2>Student/innen</h2>

<table id="student-user-table"  class="ui @if( count($students) != 0 ) definition @endif green table">
  <thead class="full-width">
    <tr>
      @if( count($students) != 0 ) <th></th> @endif
      <th>LSF Account</th>
      <th>Name</th>
      <th>E-Mail Adresse</th>
      <th>Verifiziert</th>
    </tr>
  </thead>
    <tbody>
        @foreach ($students as $student)

            <tr>

                @if( count($students) != 0 )
                    <td class="collapsing">
                        <div class="ui fitted slider checkbox">
                            <input type="checkbox" value="{{$student->id}}">
                        </div>
                    </td>
                @endif

                <td>{{ $student->username }}</td>

                <td>{{ $student->firstname . ' ' . $student->lastname }}</td>

                <td>{{ $student->email }}</td>

                <td class="center aligned">
                    @if($student->created_at != $student->updated_at)
                        <i class="large green checkmark icon"></i>
                    @endif
                </td>
            </tr>

        @endforeach
  </tbody>
  <tfoot class="full-width">
    <tr>

      @if( count($students) != 0 ) <th></th> @endif

      <th colspan="4">
        <div class="ui right floated small primary labeled icon button user-new">
          <i class="user icon"></i> Student/in hinzufügen
      </div>

      <form id="student-user-delete-many" role="form" method="POST" action="{{ action('UserController@destroyMany') }}">

          {{ method_field('DELETE') }}

          {{ csrf_field() }}

          <button class="ui small red button disabled delete-many" type="submit">Löschen</i></button>

      </form>

      <form id="student-user-delete-all" role="form" method="POST" action="{{ action('UserController@destroyAll', ['role' => 'Student', 'except_ids' => Auth::user()->id]) }}">

          {{ method_field('DELETE') }}

          {{ csrf_field() }}

          <button class="ui small red button delete-all @if( count($students) === 0 ) disabled @endif )" type="submit">Alle Löschen</button>

      </form>

      </th>
    </tr>
  </tfoot>
</table>

</div>

</main>

{{-- Include Modals for create and edit users. --}}
@if ( Auth::user()->role === 'Admin' )

    @include('user.partials.create')

@endif

@stop
