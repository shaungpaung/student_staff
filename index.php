<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: ../student_staff/app/login.php");
  exit;
}
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
  <h1 style="display: flex; justify-content: center; margin-top: 50px">
    <?php
    echo $_SESSION['username']
      ?>'s Application
  </h1>
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
        <li style="
              padding: 15px;
              display: flex;
              justify-content: center;
              border-bottom: 2px solid;
              border-radius: 10px;
            ">
          <a href="../student_staff/inspiration-quote.php" style="padding: 15px">Inspirational Quote</a>
        </li>
        <li style="padding: 15px; display: flex; justify-content: center">
          <a href="../student_staff/wellbeing-score.php" style="padding: 15px">Wellbeing Score</a>
        </li>
      </ul>
    </div>
    <div style="height: 100%">
      <div style="
            border: 2px solid;
            height: 100%;
            margin: auto;
            border-radius: 9px;
          ">
        <div style="
              padding: 20px;
              box-shadow: 10px 10px black;
              border-radius: 9px;
            ">
          <h1>Welcome <?php
          echo $_SESSION['username']
            ?></h1>
          <p style="margin-top: 30px; font-size: larger">
            Please select the menu for the features of the application
          </p>
          <p style="font-size: medium; margin-top: 20px">Have fun !</p>
        </div>
      </div>
      <div style="margin-top: 30px; display: flex; justify-content: center">
        <img src="../student_staff/img/mood.jpg" alt="" style="height: 250px" />
      </div>
    </div>
  </div>
  <script src="../student_staff/js/script.js"></script>
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