<?php
// Include the database connection file
require_once('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process registration form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];

    // Check if the passwords match
    if ($password == $cpassword) {
        // Hash the password
        $pass = password_hash($password, PASSWORD_BCRYPT);
        
        // Create a prepared statement
        $query = "INSERT INTO dummy_users (username, email, dob, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $dob, $pass);
            if (mysqli_stmt_execute($stmt)) {
                // Registration successful
                // Redirect to login page or user dashboard
                header('Location: login.php');
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Error in preparing the statement.";
        }
    } else {
        echo "Password doesn't match";
    }
}
?>
