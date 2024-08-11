google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Days", "Happiness", "Workload", "Anxiety"],
    ["Monday", 5, 1, 1],
    ["Tuesday", 1, 4, 1],
    ["Wednesday", 1, 4, 1],
    ["Thursday", 4, 3, 1],
    ["Friday", 3, 5, 5],
    ["Saturday", 2, 5, 5],
    ["Sunday", 5, 4, 5],
  ]);

  var options = {
    title: "Score Data",
    curveType: "function",
    legend: { position: "bottom" },
  };

  var chart = new google.visualization.LineChart(
    document.getElementById("dashboard")
  );

  chart.draw(data, options);
}
