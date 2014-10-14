# CHARTS (CHART.JS LIBRARY)
if( document.URL.indexOf('/analytics') > -1 )
  $('document').ready ->

    # VISITORS CHART -----------------------------------------------------------
    visitorsCanvas = $("#visitorsChart").get(0).getContext("2d")
    visitorsOptions =
      responsive: true
      animationEasing: "easeOut"
    # Daten für Chart.js aufbereiten
    visitorsData = [
      {
        value: null
        color: "#F7464A"
        highlight: "#FF5A5E"
        label: "StudentInnen"
      }
      {
        value: null
        color: "#46BFBD"
        highlight: "#5AD3D1"
        label: "DozentInnen"
      }
      {
        value: null
        color: "#FDB45C"
        highlight: "#FFC870"
        label: "MentorInnen"
      }
    ]
    # Daten abfragen
    admins = $('#visitorsChart').attr('data-admins')
    students = $('#visitorsChart').attr('data-students')
    mentors = $('#visitorsChart').attr('data-mentors')
    # Werte Zuweisen
    visitorsData[0].value = parseInt(students)
    visitorsData[1].value = parseInt(admins)
    visitorsData[2].value = parseInt(mentors)
    # Chart plotten
    visitorsChart = new Chart(visitorsCanvas)
    .Pie(visitorsData, visitorsOptions)

    # SEMESTER CHART -----------------------------------------------------------
    semesterCanvas = $("#semesterChart").get(0).getContext("2d")
    semesterOptions =
      responsive: true
      bezierCurve: false
    # Daten für Chart.js aufbereiten
    semesterData =
      labels: [
        "Oktober"
        "November"
        "Dezember"
        "Januar"
        "Februar"
      ]
      datasets: [
        {
          label: "Seitenbesuche"
          fillColor: "rgba(220,220,220,0.2)"
          strokeColor: "rgba(220,220,220,1)"
          pointColor: "rgba(220,220,220,1)"
          pointStrokeColor: "#fff"
          pointHighlightFill: "#fff"
          pointHighlightStroke: "rgba(220,220,220,1)"
          data: null
        }
        {
          label: "Besucher"
          fillColor: "rgba(151,187,205,0.2)"
          strokeColor: "rgba(151,187,205,1)"
          pointColor: "rgba(151,187,205,1)"
          pointStrokeColor: "#fff"
          pointHighlightFill: "#fff"
          pointHighlightStroke: "rgba(151,187,205,1)"
          data: null
        }
      ]
    # Daten abfragen
    visits = $('#semesterChart').attr('data-visits')
    uniqVisitors = $('#semesterChart').attr('data-uniq-visitors')
    # Werte Zuweisen
    semesterData.datasets[0].data = JSON.parse(visits)
    semesterData.datasets[1].data = JSON.parse(uniqVisitors)
    # Chart plotten
    semesterChart = new Chart(semesterCanvas)
    .Line(semesterData, semesterOptions)
