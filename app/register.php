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
            background-color: #17a2b8;
            height: 100vh;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
        }

        #login-box {
            max-width: 600px;
            height: auto;
            border: 1px solid #9c9c9c;
            background-color: #eaeaea;
            padding: 20px;
            border-radius: 25px;
        }

        #register-link {
            text-align: center;
        }
    </style>
    <script>
        //  error notification handler
        function showNotification(message, type = 'danger') {
            const notificationDiv = document.getElementById('notification');
            notificationDiv.innerHTML = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                </div>`;
        }

        function validateForm() {
            const phoneNumber = document.getElementById('phone_number').value;
            const password = document.getElementById('password').value;

            // Check phone number is an integer 
            if (!/^\d+$/.test(phoneNumber)) {
                showNotification('Phone number must be an integer.');
                return false;
            }

            // Check password length and show warning if exactly 8 characters
            if (password.length === 8) {
                showNotification('Password is exactly 8 characters long. Consider making it longer for better security.');
                return false;
            }

            // Check password length
            if (password.length < 8) {
                showNotification('Password must be at least 8 characters long.');
                return false;
            }

            return true;
        }
    </script>

</head>

<body>
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div id="login-box">
                <!-- error notification -->
                <div id="notification"></div>
                <h3 class="text-center text-info mb-3">Login</h3>
                <form action="../../student_staff/api/create_user.php" method="post" id="login-form" class="form"
                    autocomplete="off" onsubmit="return validateForm(); ">
                    <!-- user name -->
                    <div class="mb-1">
                        <label for="user_name" class="form-label text-info">Username:</label>
                        <input type="text" name="user_name" id="user_name" class="form-control text-info" required>
                    </div>
                    <!-- password -->
                    <div class="mb-1">
                        <label for="password" class="form-label text-info">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <!-- user role -->
                    <div class="mb-1">
                        <label for="type" class="form-label text-info">Role</label>
                        <select class="form-select text-info" id="type" name="type" required>
                            <option value="student" class="text-info">Student</option>
                            <option value="staff" class="text-info">Staff</option>
                        </select>
                    </div>
                    <!-- phone number -->
                    <div class="mb-1">
                        <label for="phone_number" class="form-label text-info">Phone Number:</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control text-info"
                            required>
                    </div>
                    <!-- address -->
                    <div class="mb-1">
                        <label for="address" class="form-label text-info">Address:</label>
                        <input type="text" name="address" id="address" class="form-control text-info" required>
                    </div>
                    <!-- submit button -->
                    <button type="submit" name="submit" class="btn btn-info btn-md mt-2">Submit</button>
                    <div class="mb-1" id="register-link"><br> If you have already an account. <a
                            href="../../student_staff/app/login.php">Login
                            Here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>