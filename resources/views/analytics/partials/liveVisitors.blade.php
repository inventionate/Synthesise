<section class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Live Besucher</h3>
  </div>
  <div class="panel-body">
    {{ $liveVisitors }}
    <canvas id="myChart" width="500" height="500"></canvas>
  </div>
</section>

<script>

var ctx = $("#myChart").get(0).getContext("2d");

var myNewChart = new Chart(ctx);

var options = {responsive: true};

var data = [
    {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    }
]



var myBarChart = new Chart(ctx).Pie(data, options );

</script>
