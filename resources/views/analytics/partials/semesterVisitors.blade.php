<section class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Besucher in diesem Semester</h3>
  </div>
  <div class="panel-body">
    <canvas id="myChart" width="500" height="500"></canvas>
  </div>
</section>

<script>

  var ctx = $("#myChart").get(0).getContext("2d");

  var myNewChart = new Chart(ctx);

  var options = {responsive: true};

  var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    };

  var myBarChart = new Chart(ctx).Line(data, options );



</script>
