<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../student_staff/data/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $happiness = isset($_POST['happiness']) ? (int) $_POST['happiness'] : 0;
    $workload = isset($_POST['workload']) ? (int) $_POST['workload'] : 0;
    $anxiety = isset($_POST['anxiety']) ? (int) $_POST['anxiety'] : 0;
    $date = date("Y-m-d");

    // Check if record exists
    $checkQuery = "SELECT id FROM well_beings WHERE user_id = ? AND date = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("is", $user_id, $date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Record exists, perform update
        $row = $result->fetch_assoc();
        $id = $row['id'];

        $updateQuery = "UPDATE well_beings SET happiness = ?, workload = ?, anxiety = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("iiii", $happiness, $workload, $anxiety, $id);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
        } else {
            $error = $stmt->error;
            echo json_encode(['status' => 'error', 'message' => 'Failed to update record', 'error' => $error]);
        }
    } else {
        // Record does not exist, perform insert
        $insertQuery = "INSERT INTO well_beings (user_id, happiness, workload, anxiety, date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("iiiss", $user_id, $happiness, $workload, $anxiety, $date);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Record added successfully']);
        } else {
            $error = $stmt->error;
            echo json_encode(['status' => 'error', 'message' => 'Failed to add record', 'error' => $error]);
        }
    }
}
?>