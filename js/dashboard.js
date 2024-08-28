google.charts.load("current", {
  packages: ["corechart"],
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = new google.visualization.DataTable();
  data.addColumn("string", "Days");
  data.addColumn("number", "Happiness");
  data.addColumn("number", "Workload");
  data.addColumn("number", "Anxiety");

  fetch("../../student_staff/api/get_well_being_data.php")
    .then((response) => response.json())
    .then((jsonData) => {
      data.addRows(jsonData);

      var options = {
        title: "Well Being Scores Data",
        curveType: "function",
        legend: { position: "bottom" },
        hAxis: {
          title: "Date",
          slantedText: true,
          slantedTextAngle: 90,
          textStyle: {
            fontSize: 12,
            fontName: "Arial",
            color: "#000000",
            bold: true,
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
          },
          viewWindow: {
            min: [0, 0],
            max: [data.getNumberOfRows(), 0],
          },
        },
        vAxis: {
          title: "Scores",
        },
        chartArea: {
          left: 80,
          top: 50,
          width: "80%",
          height: "60%",
        },
      };

      var chart = new google.visualization.LineChart(
        document.getElementById("dashboard")
      );
      chart.draw(data, options);
    })
    .catch((error) => console.error("Error fetching data:", error));
}
