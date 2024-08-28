<?php
session_start();
$_SESSION = [];
// destroy user data from session
session_unset();
session_destroy();
header("Location: login.php");
exit;