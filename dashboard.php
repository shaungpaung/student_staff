<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: ../student_staff/app/login.php");
}

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
      <div style="position: absolute; right: 80%; cursor: pointer; bottom: 87%">
        <a href="../student_staff/index.php"><img src="../../student_staff/img/back-page.png" alt=""
            style="width: 60px" /></a>
      </div>
      <h1 style="display: flex; justify-content: center; text-align: center" class="mobile-margin">
        Score Dashboard
      </h1>
    </div>
    <div style="max-width: 70%; margin: auto">
      <div id="dashboard" style="width: 100%; height: 500px"></div>
    </div>
  </div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="js/dashboard.js"></script>

</body>

</html>