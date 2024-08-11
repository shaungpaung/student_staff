<?php
namespace createUser;

include '../../student_staff/data/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user_name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $type = $_POST['type'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];


    $sql = "INSERT INTO users (user_name, password, type, phone_number, address) 
    VALUES ('$username', '$password', '$type', '$phone_number', '$address')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../app/login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();