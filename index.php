<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: ../student_staff/app/login.php");
  exit;
}
include '../student_staff/data/db.php';

$user_id = $_SESSION['user_id'];
function checkAveragesAndWarn($conn, $user_id)
{
  $checkRecentRecordsQuery = "
        SELECT happiness, workload, anxiety
        FROM well_beings
        WHERE user_id = ?
        ORDER BY date DESC
        LIMIT 3
    ";
  $stmt = $conn->prepare($checkRecentRecordsQuery);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $recentResults = $stmt->get_result();

  $totalHappiness = 0;
  $totalWorkload = 0;
  $totalAnxiety = 0;
  $count = 0;

  while ($record = $recentResults->fetch_assoc()) {
    $totalHappiness += $record['happiness'];
    $totalWorkload += $record['workload'];
    $totalAnxiety += $record['anxiety'];
    $count++;
  }

  $message = '';
  if ($count > 0) {
    $averageHappiness = $totalHappiness / $count;
    $averageWorkload = $totalWorkload / $count;
    $averageAnxiety = $totalAnxiety / $count;

    if ($averageHappiness < 1.5 || $averageWorkload < 1.5 || $averageAnxiety < 1.5) {
      $message = 'Your scores indicate you may need to see a doctor.';
    }
  }

  return $message;
}
$warningMessage = checkAveragesAndWarn($conn, $user_id);

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
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../student_staff/css/quote.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <button type="button" name="button" id="logout" style="
              margin: 20px;
              border: 1px solid rgb(61, 60, 60);
              padding: 10px;
              background: transparent;
              box-shadow: 5px 5px black;
              cursor: pointer;
            ">
    Logout
  </button>
  <div style="
        max-width: 80%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 30px;
        height: 100%;
      ">

    <!-- menubar -->
    <div style="
          width: 250px;
          display: flex;
          justify-content: center;
          border: 2px solid black;
          border-radius: 5px;
          height: 100%;
        ">
      <ul style="list-style-type: none; width: 100%">
        <li style="
              padding: 15px;
              display: flex;
              justify-content: center;
              border-bottom: 2px solid;
              border-radius: 10px;
            ">
          <a href="../student_staff/dashboard.php" style="padding: 15px">Dashboard</a>
        </li>
        <li style="padding: 15px; display: flex; justify-content: center">
          <a href="../student_staff/wellbeing-score.php" style="padding: 15px">Wellbeing Score</a>
        </li>
      </ul>
    </div>

    <div style="height: 100%">
      <?php if (!empty($warningMessage)): ?>
        <div class="text-center text-danger" style="font-weight: bold; margin-top: -30px; margin-left: 10px;">
          <?php echo htmlspecialchars($warningMessage); ?>
        </div>
      <?php endif; ?>
      <div style="
            border: 2px solid;
            height: 100%;
            margin: auto;
            margin-top: 30px;
            border-radius: 9px;
          ">
        <div style="
              padding: 20px;
              box-shadow: 10px 10px black;
              border-radius: 9px;
            ">
          <h1>Welcome
            <?php
            echo $_SESSION['username']
              ?>
          </h1>
          <p style="margin-top: 30px; font-size: larger">
            Please select the menu for the features of the application
          </p>
        </div>
      </div>
      <div>
        <h1 style="display: flex; justify-content: center; margin-top: 50px">
          Inspirational quote for the day
        </h1>
        <div class="search-container">
          <input type="text" class="search-box" placeholder="Search..." id="search-input" value="" />
        </div>
        <div style="
              display: flex;
              justify-content: space-between;
              align-items: center;
              max-width: 100%;
              margin: auto;
              margin-top: 40px;
            ">
          <div id="previous-button">
            <img src="../student_staff/img/left.png" alt="" style="width: 80px; cursor: pointer" />
          </div>
          <blockquote class="quote-container">
            <div style="margin: 20px; font-size: 50px">"</div>
            <p id="quote-content"></p>
            <div style="margin: 20px; text-align: end; font-size: 50px">
              "
            </div>
            <p id="quote-author"></p>
          </blockquote>
          <div id="next-button">
            <img src="../student_staff/img/next.png" alt="" style="width: 80px; cursor: pointer" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../student_staff/js/quote.js"></script>
  <script>
    $('#logout').on('click', function () {
      $.ajax({
        url: '../student_staff/app/logout.php',
        type: 'POST',
        success: function (response) {
          window.location.href = '../student_staff/app/login.php';
        },
        error: function () {
          alert('Logout failed!');
        }
      });
    });
  </script>
</body>

</html>