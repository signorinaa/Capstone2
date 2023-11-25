<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "conde";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get value from the form
    $subjectName = $_POST["subjectName"];

    // Perform the SQL query to add a new subject
    $sql = "INSERT INTO subjects (subject_name) VALUES ('$subjectName')";

    if ($conn->query($sql) === TRUE) {
        echo "Subject added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
