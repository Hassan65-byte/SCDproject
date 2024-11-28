<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "user_form";

    // Create connection
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to find the user
    $sql = "SELECT * FROM user_form WHERE email = '$email'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the entered password
        if (password_verify($password, $hashed_password)) {
            echo '<script>alert("Login Successful!")</script>';
            // Redirect to home or dashboard
            header('Location: home.php');
            exit();
        } else {
            echo '<script>alert("Incorrect password. Please try again.")</script>';
        }
    } else {
        echo '<script>alert("No user found with this email.")</script>';
    }

    // Close the connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('ban1.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 bg-transparent">
        <div class="card-body p-5">
            <h1 class="text-center text-white fw-bold mb-4" style="font-size:50px;">Login Form</h1>
            <form action="login.php" method="POST" class="w-75 mx-auto">
                <div class="form-floating mb-4">
                    <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="info@example.com" required>
                    <label for="email">Email</label>
                </div>
                
                <div class="form-floating mb-4">
                    <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                
                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary btn-lg rounded-3">Login</button>
                </div>
            </form>
            <div class="text-center">
                <p>Not registered? <a href="index.php" class="text-decoration-none fw-bold">Signup here</a></p>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
