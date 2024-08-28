<?php
session_start();
include '/xampp/htdocs/student_staff/data/db.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password check 
    $username = htmlspecialchars($_POST['user_name']);
    $password = htmlspecialchars($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // create loggedin for user session data
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['id'];
            header("Location: ../index.php");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Invalid username";
    }
}

if (!empty($error)) {
    echo '<div class="alert alert-danger mt-3">' . $error . '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #eaeaea;
            height: 100vh;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
        }

        #login-box {
            max-width: 600px;
            border: 1px solid #9c9c9c;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 25px;
        }

        #register-link {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div id="login-box">
                <h3 class="text-center text-info mb-4">Login</h3>
                <form id="login-form" class="form" action="" method="post">
                    <!-- user name -->
                    <div class="mb-3">
                        <label for="user_name" class="form-label text-info">Username:</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" required>
                    </div>
                    <!-- password -->
                    <div class="mb-3">
                        <label for="password" class="form-label text-info">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-info btn-md">Submit</button>
                    <!-- user register -->
                    <div class="mb-1" id="register-link"><br> If you don't have already an account. <a
                            href="../../student_staff/app/register.php">Create Account
                            Here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>