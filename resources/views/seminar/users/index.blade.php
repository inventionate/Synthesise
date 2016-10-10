@extends('layouts.default')

@section('title')
  <title>e:t:p:M® – Seminar
  Teilnehmer/innen Verwaltung</title>
@stop

@section('content')
<main id="main-content-seminar-users" class="ui grid container">

    <div class="fourteen wide column">

    <h1 class="ui header">
        Teilnehmer/innen verwalten
    </h1>

    <div class="ui warning message">
        <div class="header">
            Es können nur LSF Benutzernamen hinzugefügt werden!
        </div>
        <p>
            Im Moment unterstützt die App lediglich das Hinzufügen von LSF Benutzernamen über deren Benutzernamen. Entweder geben Sie jeden Namen einzeln ein oder laden eine Stud.IP 3 CSV Datei hoch. Diese können Sie über die <a href="http://docs.studip.de/help/3.5/de/Basis/VeranstaltungenVerwaltenTeilnehmer" target="_blank">Stud.IP 3 Teilnehmerverwaltung</a> exportieren.
            <br>
            <b>Die Verifikation erfolgt erst wenn die Benutzer/innen sich das erste Mal anmelden.</b> Danach können Sie den Namen und die E-Mail Adresse hier einsehen. Eine komplette Benutzerverwaltung ist für die kommende Version vorgesehen.
        </p>
    </div>

    @if ( count($errors) > 0 )
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

    @if ( session('status') )

        <div class="ui warning message">
            <div class="header">
                Informationen zur Änderung von Benuter/innenrollen
            </div>
            <p>
                {{ session('status') }}
            </p>
        </div>
    @endif

<h2 class="ui header" id="manage-teachers">Dozent/innen</h2>

<table id="teacher-user-table" class="ui @if( count($admins) + count($teachers) !== 1 ) definition @endif teal table">
  <thead class="full-width">
    <tr>
      @if( count($admins) + count($teachers) !== 1 )
          <th></th>
      @endif
      <th>LSF Benutzername</th>
      <th>Name</th>
      <th>E-Mail Adresse</th>
      <th>Verifiziert</th>
    </tr>
  </thead>
    <tbody>

        {{-- Show all admins, who can edit this seminar. --}}
        @foreach ($admins as $admin)

            <tr class="disabled">

                @if( ( count($admins) + count($teachers) ) !== 1 )
                    <td></td>
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

        {{-- Show all teachers, who can edit this seminar. --}}
        @foreach ($teachers as $teacher)

            <tr @if( $teacher->username === Auth::user()->username ) class="disabled" @endif>

                @if( ( count($admins) + count($teachers) ) !== 1 )
                    <td class="collapsing">
                        @if( $teacher->username != Auth::user()->username )
                            <div class="ui fitted slider checkbox">
                                <input type="checkbox" value="{{$teacher->id}}">
                            </div>
                        @endif
                    </td>
                @endif

                <td>{{ $teacher->username }}</td>

                <td>{{ $teacher->firstname . ' ' . $teacher->lastname }}</td>

                <td><a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a></td>

                <td class="center aligned">
                    @if($teacher->created_at != $teacher->updated_at)
                        <i class="large green checkmark icon"></i>
                    @endif
                </td>
            </tr>

        @endforeach
  </tbody>
  <tfoot class="full-width">
    <tr>

      @if( ( count($admins) + count($teachers) ) !== 1 )
          <th></th>
      @endif

      <th colspan="4">

        <div class="ui right floated small primary labeled icon button user-new">
          <i class="user icon"></i> Dozent/in hinzufügen
        </div>

        <form id="teacher-user-delete-many" role="form" method="POST" action="{{ action('UserController@destroyMany', ['seminar_names' => $seminar_name]) }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <div class="field hide">
                <label for="role">Rolle</label>
                <input name="role" ref="role" value="Teacher">
            </div>

            <button class="ui small red button disabled delete-many" type="submit">Löschen</i></button>

        </form>

        <form id="teacher-user-delete-all" role="form" method="POST" action="{{ action('UserController@destroyAll', ['role' => 'Teacher', 'except_ids' => Auth::user()->id, 'seminar_names' => $seminar_name]) }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <button class="ui small red button delete-all @if( count($teachers) === 0 ) disabled @endif )" type="submit">Alle Löschen</button>

        </form>

      </th>
    </tr>
  </tfoot>
</table>


<h2 class="ui header" id="manage-mentors">Mentor/innen</h2>

<table id="mentor-user-table" class="ui @if( count($mentors) !== 0 ) definition @endif orange table">
  <thead class="full-width">
    <tr>
      @if( count($mentors) !== 0 )
          <th></th>
      @endif
      <th>LSF Benutzername</th>
      <th>Name</th>
      <th>E-Mail Adresse</th>
      <th>Verifiziert</th>
    </tr>
  </thead>
    <tbody>
        @foreach ($mentors as $mentor)

            <tr>

                @if( count($mentors) !== 0 )
                    <td class="collapsing">
                        <div class="ui fitted slider checkbox">
                            <input type="checkbox" value="{{$mentor->id}}">
                        </div>
                    </td>
                @endif

                <td>{{ $mentor->username }}</td>

                <td>{{ $mentor->firstname . ' ' . $mentor->lastname }}</td>

                <td><a href="mailto:{{ $mentor->email }}">{{ $mentor->email }}</a></td>

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

      @if( count($mentors) !== 0 )
          <th></th>
      @endif

      <th colspan="4">

        <div class="ui right floated small primary labeled icon button user-new">
          <i class="user icon"></i> Mentor/in hinzufügen
        </div>

        <form id="mentor-user-delete-many" role="form" method="POST" action="{{ action('UserController@destroyMany') }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <div class="field hide">
                <label for="role">Rolle</label>
                <input name="role" ref="role" value="Mentor">
            </div>

            <button class="ui small red button disabled delete-many" type="submit">Löschen</i></button>

        </form>

        <form id="mentor-user-delete-all" role="form" method="POST" action="{{ action('UserController@destroyAll', ['role' => 'Mentor', 'except_ids' => Auth::user()->id]) }}">

            {{ method_field('DELETE') }}

            {{ csrf_field() }}

            <button class="ui small red button delete-all @if( count($mentors) === 0 ) disabled @endif )" type="submit">Alle Löschen</button>

        </form>

      </th>
    </tr>
  </tfoot>
</table>


<h2 class="ui header" id="manage-students">Student/innen</h2>

<table id="student-user-table"  class="ui @if( count($students) !== 0 ) definition @endif green table">
  <thead class="full-width">
    <tr>
      @if( count($students) !== 0 ) <th></th> @endif
      <th>LSF Benutzername</th>
      <th>Name</th>
      <th>E-Mail Adresse</th>
      <th>Verifiziert</th>
    </tr>
  </thead>
    <tbody>
        @foreach ($students as $student)

            <tr>

                @if( count($students) !== 0 )
                    <td class="collapsing">
                        <div class="ui fitted slider checkbox">
                            <input type="checkbox" value="{{$student->id}}">
                        </div>
                    </td>
                @endif

                <td>{{ $student->username }}</td>

                <td>{{ $student->firstname . ' ' . $student->lastname }}</td>

                <td><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></td>

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

      @if( count($students) !== 0 ) <th></th> @endif

      <th colspan="4">
        <div class="ui right floated small primary labeled icon button user-new">
          <i class="user icon"></i> Student/in hinzufügen
      </div>

      <form id="student-user-delete-many" role="form" method="POST" action="{{ action('UserController@destroyMany') }}">

          {{ method_field('DELETE') }}

          {{ csrf_field() }}

          <div class="field hide">
              <label for="role">Rolle</label>
              <input name="role" ref="role" value="Student">
          </div>

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

{{-- @include ADMIN BACKEND --------------------------------------------------}}
@if( Seminar::authorizedEditor($seminar_name) )

    @include('seminar.users.create')

    {{-- Load create and edit Modals --}}
    @include('seminar.modals')

@endif

@stop
