<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../student_staff/app/login.php");
exit;
?>