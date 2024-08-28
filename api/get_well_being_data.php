<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../student_staff/app/login.php");
}
include '../data/db.php';

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
header('Content-Type: application/json');
echo json_encode($data);
?>