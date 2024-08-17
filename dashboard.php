<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: ../student_staff/app/login.php");
}
include '../student_staff/data/db.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT date, happiness, workload, anxiety FROM well_beings WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = [
    $row['date'],
    (int) $row['happiness'],
    (int) $row['workload'],
    (int) $row['anxiety']
  ];
}

$data_json = json_encode($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../student_staff/css/dashboard.css" />
</head>

<body>
  <div>
    <div style="
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 50px;
        ">
      <div style="position: absolute; right: 90%; cursor: pointer">
        <a href="../student_staff/index.php"><img src="../../student_staff/img/back-page.png" alt=""
            style="width: 60px" /></a>
      </div>
      <h1 style="">Score Dashboard</h1>
    </div>
    <div style="max-width: 70%; margin: auto">
      <div id="dashboard" style="width: 100%; height: 500px"></div>
    </div>
  </div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Days');
      data.addColumn('number', 'Happiness');
      data.addColumn('number', 'Workload');
      data.addColumn('number', 'Anxiety');

      var jsonData = <?php echo $data_json; ?>;

      data.addRows(jsonData);

      var options = {
        title: 'Well Being Scores Data',
        curveType: 'function',
        legend: {
          position: 'bottom'
        },
        hAxis: {
          title: 'Date',
          slantedText: true,
          slantedTextAngle: 90,
          textStyle: {
            fontSize: 12,
            fontName: 'Arial',
            color: '#000000',
            bold: true
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true
          },
          viewWindow: {
            min: [0, 0],
            max: [data.getNumberOfRows(), 0]
          }
        },
        vAxis: {
          title: 'Scores'
        },
        chartArea: {
          left: 80,
          top: 50,
          width: '80%',
          height: '60%'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('dashboard'));
      chart.draw(data, options);
    }
  </script>
</body>

</html>