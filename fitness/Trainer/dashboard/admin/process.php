<?php
require '../../include/db_conn.php';
page_protect();
 
// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = $_POST["link"];
    $text = $_POST["text"];

    // Validate and sanitize data

    // Insert data into the database
    $sql = "INSERT INTO links (link, text) VALUES ('$link', '$text')";

    if (mysqli_query($conn, $sql)) {
        echo "Data added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>