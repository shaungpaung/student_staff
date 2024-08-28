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
    <title>Document</title>
    <link rel="stylesheet" href="../student_staff/css/quote.css" />
    <!-- <link rel="stylesheet" href="../css/quote.css" /> -->
</head>

<body>
    <div>
        <div style="position: absolute; right: 90%; cursor: pointer">
            <a href="../student_staff/index.php"><img src="../student_staff/img/back-page.png" alt=""
                    style="width: 60px" /></a>
        </div>
        <h1 style="display: flex; justify-content: center; margin-top: 50px">
            Inspirational quote for the day
        </h1>
        <div
            style="display: flex; justify-content: space-between;align-items: center;max-width: 70%;margin: auto; margin-top: 80px;">
            <div id="previous-button">
                <img src="../student_staff/img/left.png" alt="" style="width: 80px;cursor: pointer;">
            </div>
            <div class="quote-container">
                <div style="margin: 20px;font-size: 50px;">"</div>
                <p style="margin: 20px; text-align: center;font-size:23px;" id="quote-content"></p>
                <div style="margin: 20px; text-align: end;font-size: 50px;">"</div>
                <h3 style="margin: 40px;text-align: end;font-weight: 800;" id="quote-author"></h3>
            </div>
            <div id="next-button">
                <img src="../student_staff/img/next.png" alt="" style="width: 80px;cursor: pointer;">
            </div>
        </div>
        <div style="margin-top: 70px">
            <h2 style="text-align: center;">---------- Made with love by <?php
            echo $_SESSION['username']
                ?> ----------</h3>
        </div>
    </div>
    <script src="../student_staff/js/quote.js"></script>
</body>

</html>