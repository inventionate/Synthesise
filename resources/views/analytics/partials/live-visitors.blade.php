<section class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Live Besucher</h3>
  </div>
  <div class="panel-body">
    {{ $liveVisitors }}
    <canvas id="lChart" height="139px"></canvas>
  </div>
</section>

<script>

var lc = $("#lChart").get(0).getContext("2d");

var options = {responsive: true, animationEasing: 'easeOut'};

var data = [
    {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "StudentInnen"
    },
    {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "DozentInnen"
    },
    {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "MentorInnen"
    }
]

var lChart = new Chart(lc).Pie(data, options);

</script>
