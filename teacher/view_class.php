<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    // header("Location: login.php");
    exit();
}

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

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM faculty WHERE FacultyID = $user_id";
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $firstName = $row["FirstName"];
    $lastName = $row["LastName"];
    $AdminName = $firstName . " ". $lastName;
    $Email = $row["Email"];
}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Teachers-Subjects - CLIS - Student Portal</title>
    <meta
      property="og:title"
      content="Teachers-Subjects - CLIS - Student Portal"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
  </head>
  <body>
    <link rel="stylesheet" href="./css/style.css" />
    <div>
  <link href="./css/teachers-subjects.css" rel="stylesheet" />
  <div class="teachers-subjects-container">
    <div class="teachers-subjects-container1">
      <a href="index.html" class="teachers-subjects-navlink">
        <img
          alt="pastedImage"
          src="../public/external/pastedimage-1s3-200h.png"
          class="teachers-subjects-icon-logout"
        />
      </a>
      <span class="teachers-subjects-text">Log Out</span>
      <div class="teachers-subjects-button">
        <a href="teachers-home.html" class="teachers-subjects-navlink1 button">
          HOME
        </a>
      </div>
    </div>
    <div class="teachers-subjects-container2">
    <style type="text/css">
table  {border-collapse:collapse;border-color:#ccc;border-spacing:0; width: 100%;text-align: center;}
 td{background-color:#fff;border-color:#ccc;border-style:solid;border-width:0px;color:#333;
  font-size:18px;overflow:hidden;padding:10px 5px;word-break:normal;}
 th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:0px;color:#333;
  font-size:18px;font-weight:bold;overflow:hidden;padding:10px 5px;word-break:normal; text-align: center;}

</style>
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

// Check if a class_id parameter is provided in the URL
if (isset($_GET['class_id'])) {
    $class_id = $_GET['class_id'];

    // SQL query to retrieve class details
    $class_query = "SELECT * FROM Classes WHERE ClassID = $class_id";
    $class_result = $conn->query($class_query);

    if ($class_result->num_rows > 0) {
        $class_row = $class_result->fetch_assoc();
        $class_name = $class_row['ClassName'];
        $grade_level = $class_row['gradeLevel'];

        // Display class details
        echo "<h2>Class Details</h2>";
        echo "<p>Class ID: $class_id</p>";
        echo "<p>Class Name: $class_name</p>";
        echo "<p>Grade Level: $grade_level</p>";

        // SQL query to retrieve enrolled students
        // SQL query to retrieve enrolled students and their grades
        $students_query = "SELECT students.StudentID, students.FirstName, students.MiddleName, students.LastName, grading.Grade
                            FROM students
                            LEFT JOIN Grading ON students.StudentID = grading.StudentID
                            LEFT JOIN enrollments ON students.StudentID = enrollments.StudentID
                            WHERE enrollments.ClassID = $class_id";
        $students_result = $conn->query($students_query);

        if ($students_result->num_rows > 0) {
            // Display list of enrolled students with grades and a form to update grades
            echo "<h3>Enrolled Students</h3>";
            echo "<form action='update_grades.php' method='post'>";
            echo "<input type='hidden' name='class_id' value='$class_id'>";
            echo "<table>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Grade</th>
                </tr>";
            while ($student_row = $students_result->fetch_assoc()) {
                $student_id = $student_row['StudentID'];
                $student_name = "{$student_row['FirstName']} {$student_row['MiddleName']}, {$student_row['LastName']}";
                $grade = $student_row['Grade'];
                
                echo "<tr>
                    <td>$student_id</td>
                    <td>$student_name</td>
                    <td><input type='text' name='grades[$student_id]' value='$grade'></td>
                </tr>";
            }
            echo "</table>";
            echo "<input type='submit' value='Update Grades'>";
            echo "</form>";
        } else {
            echo "<p>No students enrolled in this class.</p>";
        }

        // Add a link to go back to the class list
        echo "<p><a href='teachers-subjects.php'>Back to Class List</a></p>";
    } else {
        echo "Class not found.";
    }
} else {
    echo "Invalid request. Class ID not provided.";
}

$conn->close();
?>

    </div>
    <footer class="teachers-subjects-footer">
      <span class="teachers-subjects-text01">
        <span>Copyright © Conde Labac Integrated School</span>
      </span>
      <span class="teachers-subjects-text03">
        <span>Conde Labac Integrated School</span>
      </span>
      <span class="teachers-subjects-text05">
        <span>P4P6+5WC, Conde Labac, Batangas City</span>
      </span>
      <span class="teachers-subjects-text07">
        <span>(043) 728 - 2928</span>
      </span>
      <span class="teachers-subjects-text09">
        <span>condelabac@gmail.com</span>
      </span>
      <img
        alt="image"
        src="../public/external/deped-emblem-removebg-preview-200h-200h.png"
        class="teachers-subjects-image"
      />
      <img
        alt="image"
        src="../public/external/conde-removebg-preview-200h-200h-200h.png"
        class="teachers-subjects-image1"
      />
      <img
        alt="pastedImage"
        src="../public/external/pastedimage-biba-200h.png"
        class="teachers-subjects-pasted-image"
      />
      <img
        alt="pastedImage"
        src="../public/external/pastedimage-6vpl-200h.png"
        class="teachers-subjects-pasted-image1"
      />
      <a
        href="https://www.facebook.com/profile.php?id=100064010951891"
        target="_blank"
        rel="noreferrer noopener"
        class="teachers-subjects-link"
      >
        <img
          alt="pastedImage"
          src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/901f97d7-21b6-4883-8645-86b64c281acb/e9ef7f05-bc5c-44f6-92e9-028782e7f4b5?org_if_sml=14138&amp;force_format=original"
          class="teachers-subjects-facebook"
        />
      </a>
      <img
        alt="pastedImage"
        src="../public/external/pastedimage-324d-200h-200h.png"
        class="teachers-subjects-instagam"
      />
    </footer>
  </div>
</div>
  </body>
</html>
