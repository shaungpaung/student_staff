<!DOCTYPE html>
<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: ../student_staff/app/login.php"); // Change this to your login page
  exit;
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../student_staff/css/wellbeing-score.css" />
  <title>Document</title>
</head>

<body>
  <div style="position: absolute; right: 90%; cursor: pointer">
    <a href="../student_staff/index.php"><img src="../student_staff/img/back-page.png" alt="" style="width: 60px" /></a>
  </div>
  <h1 style="display: flex; justify-content: center; margin-top: 60px">
    Categories to add wellbeing score
  </h1>
  <div style="
        display: flex;
        max-width: 80%;
        margin: auto;
        justify-content: space-around;
        margin-top: 100px;
        flex-wrap: wrap;
      ">
    <div style="
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        ">
      <h2>Happiness</h2>
      <div id="happy" style="
            border: 1px solid black;
            margin-top: 25px;
            /* box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5);  */
            box-shadow: 13px 13px black;
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
          ">
        <div class="happy-content">Your's hapiness card is here !</div>
        <img src="../student_staff/img/happy.png" alt="" style="width: 50px" />
        <button id="happy-give-score-button" style="
              margin: 20px;
              border: 1px solid rgb(61, 60, 60);
              padding: 10px;
              background: transparent;
              box-shadow: 5px 5px black;
              cursor: pointer;
            ">
          Give score
        </button>
      </div>
    </div>
    <div style="
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        ">
      <h2>Workload management</h2>
      <div id="workload" style="
            border: 1px solid black;
            margin-top: 25px;
            box-shadow: 13px 13px black;
            /* box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5); */
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
          ">
        <p class="workload-content">Your's workload card is here !</p>
        <img src="../student_staff/img/working.png" alt="" style="width: 70px" />
        <button id="workload-give-score-button" style="
              margin: 20px;
              border: 1px solid rgb(61, 60, 60);
              padding: 10px;
              background: transparent;
              box-shadow: 5px 5px black;
              cursor: pointer;
            ">
          Give score
        </button>
      </div>
    </div>
    <div style="
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        ">
      <h2>Anxiety level</h2>
      <div id="anxiety" style="
            border: 1px solid black;
            margin-top: 25px;
            box-shadow: 13px 13px black;
            /* box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5);  */
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
          ">
        <p class="anxiety-content">Your's anxiety card is here !</p>
        <img src="../student_staff/img/anxiety.png" alt="" style="width: 80px" />
        <button id="anxiety-give-score-button" style="
              margin: 20px;
              border: 1px solid rgb(61, 60, 60);
              padding: 10px;
              background: transparent;
              box-shadow: 5px 5px black;
              cursor: pointer;
            ">
          Give score
        </button>
      </div>
    </div>
  </div>
  <div style="margin-top: 90px">
    <h2 style="text-align: center;">---------- Made with love by Agga ----------</h3>
  </div>
  <script src="../student_staff/js/wellbeing-score.js"></script>
</body>

</html>