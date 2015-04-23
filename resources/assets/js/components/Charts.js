class Charts {

    constructor ()
    {
        var admins, downloadedPapers, downloadsCanvas, downloadsChart, downloadsData, downloadsOptions, mentors, playedVideos, playsCanvas, playsChart, playsData, playsOptions, semesterCanvas, semesterChart, semesterData, semesterOptions, students, uniqVisitors, visitorsCanvas, visitorsChart, visitorsData, visitorsOptions, visits;
        visitorsCanvas = $("#visitorsChart").get(0).getContext("2d");
        visitorsOptions = {
          responsive: true,
          animationEasing: "easeOut"
        };
        visitorsData = [
          {
            value: null,
            color: "#F7464A",
            highlight: "#FF5A5E",
            label: "StudentInnen"
          }, {
            value: null,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "DozentInnen"
          }, {
            value: null,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "MentorInnen"
          }
        ];
        admins = $('#visitorsChart').attr('data-admins');
        students = $('#visitorsChart').attr('data-students');
        mentors = $('#visitorsChart').attr('data-mentors');
        visitorsData[0].value = parseInt(students);
        visitorsData[1].value = parseInt(admins);
        visitorsData[2].value = parseInt(mentors);
        visitorsChart = new Chart(visitorsCanvas).Pie(visitorsData, visitorsOptions);
        semesterCanvas = $("#semesterChart").get(0).getContext("2d");
        semesterOptions = {
          responsive: true,
          bezierCurve: false
        };
        semesterData = {
          labels: ["Oktober", "November", "Dezember", "Januar", "Februar"],
          datasets: [
            {
              label: "Seitenbesuche",
              fillColor: "rgba(220,220,220,0.2)",
              strokeColor: "rgba(220,220,220,1)",
              pointColor: "rgba(220,220,220,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: null
            }, {
              label: "Besucher",
              fillColor: "rgba(151,187,205,0.2)",
              strokeColor: "rgba(151,187,205,1)",
              pointColor: "rgba(151,187,205,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(151,187,205,1)",
              data: null
            }
          ]
        };
        visits = $('#semesterChart').attr('data-visits');
        uniqVisitors = $('#semesterChart').attr('data-uniq-visitors');
        semesterData.datasets[0].data = JSON.parse(visits);
        semesterData.datasets[1].data = JSON.parse(uniqVisitors);
        semesterChart = new Chart(semesterCanvas).Line(semesterData, semesterOptions);
        downloadsCanvas = $("#downloadsChart").get(0).getContext("2d");
        downloadsOptions = {
          responsive: true,
          bezierCurve: false
        };
        downloadsData = {
          labels: ["Oktober", "November", "Dezember", "Januar", "Februar"],
          datasets: [
            {
              label: "Heruntergeladene Texte",
              fillColor: "rgba(220,220,220,0.2)",
              strokeColor: "rgba(220,220,220,1)",
              pointColor: "rgba(220,220,220,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: null
            }
          ]
        };
        downloadedPapers = $('#downloadsChart').attr('data-downloaded-papers');
        downloadsData.datasets[0].data = JSON.parse(downloadedPapers);
        downloadsChart = new Chart(downloadsCanvas).Line(downloadsData, downloadsOptions);
        playsCanvas = $("#playsChart").get(0).getContext("2d");
        playsOptions = {
          responsive: true,
          bezierCurve: false
        };
        playsData = {
          labels: ["Oktober", "November", "Dezember", "Januar", "Februar"],
          datasets: [
            {
              label: "Abgespielte online-Lektionen",
              fillColor: "rgba(220,220,220,0.2)",
              strokeColor: "rgba(220,220,220,1)",
              pointColor: "rgba(220,220,220,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: null
            }
          ]
        };
        playedVideos = $('#playsChart').attr('data-plays');
        playsData.datasets[0].data = JSON.parse(playedVideos);
        playsChart = new Chart(playsCanvas).Line(playsData, playsOptions);
    }

}

export default Charts;
