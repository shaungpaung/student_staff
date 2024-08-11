<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: ../student_staff/app/login.php"); // Change this to your login page
  exit;
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
  <script src="../student_staff/js/dashboard.js"></script>
</body>

</html>