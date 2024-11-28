<?php
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection failed due to " . mysqli_connect_error());
    }

    // Get form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo '<script>alert("Passwords do not match!"); window.location.href = "index.php";</script>';
    } else {
        // Check if the email already exists in the database
        $checkEmailSql = "SELECT * FROM `user_form`.`user_form` WHERE `email` = '$email'";
        $result = $con->query($checkEmailSql);

        if ($result->num_rows > 0) {
            // Email already exists, show an error message and redirect to index.php
            echo '<script>alert("Email already exists!"); window.location.href = "index.php";</script>';
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the data into the database
            $sql = "INSERT INTO `user_form`.`user_form` (`name`, `email`, `contact`, `password`, `date`) 
                    VALUES ('$name', '$email', '$contact', '$hashed_password', current_timestamp());";

            if ($con->query($sql) == true) {
                // Redirect to home.php after successful submission
                header('Location: home.php');
                exit(); // Ensure the script stops after redirection
            } else {
                echo '<script>alert("Error, Something went wrong!"); window.location.href = "index.php";</script>';
            }
        }

        // Close the connection
        $con->close();
    }
}
?>
