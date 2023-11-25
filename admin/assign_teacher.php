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

    // Get values from the form
    $facultyID = $_POST["facultyID"];
    $subjectID = $_POST["subjectID"];
    $classID = $_POST["classID"];

    // Perform the SQL query to assign a teacher to a subject for a class
    $sql = "INSERT INTO teachingassignments (FacultyID, SubjectID, ClassID) VALUES ('$facultyID', '$subjectID', '$classID')";

    if ($conn->query($sql) === TRUE) {
        echo "Assignment successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
