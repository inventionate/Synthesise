<section class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Besucher in diesem Semester</h3>
  </div>
  <div class="panel-body">
    {{-- @todo Überlappen deaktivieren via CSS oder JS Design --}}
    <canvas id="semesterChart" data-visits="{{ $visits }}" data-uniq-visitors="{{ $uniqVisitors }}"></canvas>
  </div>
</section>
