<?php
// Replace these with your actual database credentials
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "bnhs";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the class_id from the form
    $class_id = $_POST['class_id'];

    // Loop through the posted grades and update the Grading table
    foreach ($_POST['grades'] as $student_id => $grade) {
        // Sanitize the input
        $student_id = $conn->real_escape_string($student_id);
        $grade = $conn->real_escape_string($grade);

        // Check if the grade already exists for the student
        $existingGradeQuery = "SELECT * FROM Grading WHERE StudentID = $student_id";
        $existingGradeResult = $conn->query($existingGradeQuery);

        if ($existingGradeResult->num_rows > 0) {
            // Update the existing grade
            $updateGradeQuery = "UPDATE Grading SET Grade = '$grade' WHERE StudentID = $student_id";
            $conn->query($updateGradeQuery);
        } else {
            // Insert a new grade record
            $insertGradeQuery = "INSERT INTO Grading (StudentID, Grade) VALUES ($student_id, '$grade')";
            $conn->query($insertGradeQuery);
        }
    }

    // Redirect back to the class details page
    header("Location: view_class.php?class_id=$class_id");
} else {
    // If the form is not submitted, redirect to the homepage
    header("Location: manage-class.php");
}

$conn->close();
?>
