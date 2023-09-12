<?php
require '../../include/db_conn.php'; // Replace with your database connection code

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = $_POST['uname'];
    $gender = $_POST['gender'];
    $phn = $_POST['phn'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $jdate = $_POST['jdate'];

    // Use prepared statements to insert data into the trainers table
    $query = "INSERT INTO trainers (tname, gender, mobile, email, pass_key, dob, joining_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "sssssss", $uname, $gender, $phn, $email, $password, $dob, $jdate);
        if (mysqli_stmt_execute($stmt)) {
            // Registration successful, redirect to login page
            header("Location: table_tra_view.php");
            exit();
        } else {
            echo "Registration failed: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing the statement: " . mysqli_error($con);
    }
    mysqli_close($con);
}

?>
