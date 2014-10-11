<section class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Besuche insgesamt (keine Einzelpersonen)</h3>
  </div>
  <div class="panel-body">
    {{-- @todo CSS auslagern!!! --}}
    <canvas id="visitorsChart" height="120px" data-admins="{{ $admins }}" data-mentors="{{ $mentors }}" data-students="{{ $students }}"></canvas>
  </div>
</section>
