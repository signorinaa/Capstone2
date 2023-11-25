<?php
session_start();
if (!isset($_SESSION["user_id"])) {
     header("Location: admin-login.php");
    exit();
}

// Replace these with your actual database credentials
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "conde";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM admin WHERE AdminID = $user_id";
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $firstName = $row["FirstName"];
    $lastName = $row["LastName"];
    $email = $row["Email"];
    $AdminName = $lastName . ", " . $firstName;
}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin-Teacher - CLIS - Student Portal</title>
    <meta property="og:title" content="Admin-Teacher - CLIS - Student Portal" />
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
    <style>
              body {
    font-family: Arial, sans-serif;
    margin: 20px;
    
}

h2 {
    color: #333;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
    font-size: 15px;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #e0e0e0;
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
      <link href="./css/admin-teacher.css" rel="stylesheet" />

      <div class="admin-teacher-container">
        <div class="admin-teacher-container1">
          <a href="logout.php" class="admin-teacher-navlink">
            <img
              alt="pastedImage"
              src="../public/external/pastedimage-1s3-200h.png"
              class="admin-teacher-icon-logout"
            />
          </a>
          <span class="admin-teacher-text">Log Out</span>
          <div class="admin-teacher-button">
            
            <a href="admin-home.php" class="admin-teacher-navlink2 button">
              HOME
            </a>
          </div>
          <div class="admin-teacher-container2">
          <h3>Assign Faculty and Subject to Class</h3><br>
          <form action="assign_teacher.php" method="post">
        <label for="facultyID">Faculty Name:</label>
        <select name="facultyID" required>
            <?php
                // Your database connection code here

                $db_connection = mysqli_connect("localhost", "root", "", "conde");

                if (!$db_connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $facultyQuery = "SELECT facultyID, CONCAT(FirstName, ' ', LastName) AS facultyName FROM faculty";
                $facultyResult = mysqli_query($db_connection, $facultyQuery);

                while ($faculty = mysqli_fetch_assoc($facultyResult)) {
                    echo "<option value='{$faculty['facultyID']}'>{$faculty['facultyName']}</option>";
                }

                mysqli_close($db_connection);
            ?>
        </select><br>

        <label for="subjectID">Subject Name:</label>
        <select name="subjectID" required>
            <?php
                // Your database connection code here

                $db_connection = mysqli_connect("localhost", "root", "", "conde");

                if (!$db_connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $subjectQuery = "SELECT SubjectID, SubjectName FROM subjects";
                $subjectResult = mysqli_query($db_connection, $subjectQuery);

                while ($subject = mysqli_fetch_assoc($subjectResult)) {
                    echo "<option value='{$subject['SubjectID']}'>{$subject['SubjectName']}</option>";
                }

                mysqli_close($db_connection);
            ?>
        </select><br>

        <label for="classID">Class ID:</label>
    <select name="classID" required>
        <?php
            // Your database connection code here

            $db_connection = mysqli_connect("localhost", "root", "", "conde");

            if (!$db_connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $classQuery = "SELECT ClassID, ClassName FROM classes";
            $classResult = mysqli_query($db_connection, $classQuery);

            while ($class = mysqli_fetch_assoc($classResult)) {
                echo "<option value='{$class['ClassID']}'>{$class['ClassName']}</option>";
            }

            mysqli_close($db_connection);
        ?>
    </select><br>

        <input type="submit" value="Assign">
    </form>
    <h3>Add Subject</h3>
    <form action="add_subject.php" method="post">
        <label for="subjectName">Subject Name:</label>
        <input type="text" name="subjectName" required><br>

        <!-- Add more fields as needed -->

        <input type="submit" value="Add Subject">

              </form>



          </div>
          <div class="admin-teacher-container3">
          <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "conde";

$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select faculty information
$sql = "SELECT faculty.facultyID, faculty.FirstName, faculty.LastName, GROUP_CONCAT(subjects.SubjectName) as SubjectsTaught
        FROM faculty
        LEFT JOIN teachingassignments ON faculty.facultyID = teachingassignments.facultyID
        LEFT JOIN subjects ON teachingassignments.subjectID = subjects.subjectID
        GROUP BY faculty.facultyID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Subjects Taught</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["facultyID"] . "</td>
                <td>" . $row["FirstName"] . "</td>
                <td>" . $row["LastName"] . "</td>
                <td>" . $row["SubjectsTaught"] . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No faculty found.";
}

// Close the connection
$conn->close();
?>
          </div>
        </div>
        <footer class="admin-teacher-footer">
          <span class="admin-teacher-text01">
            <span>Copyright © Conde Labac Integrated School</span>
          </span>
          <span class="admin-teacher-text03">
            <span>Conde Labac Integrated School</span>
          </span>
          <span class="admin-teacher-text05">
            <span>P4P6+5WC, Conde Labac, Batangas City</span>
          </span>
          <span class="admin-teacher-text07">
            <span>(043) 728 - 2928</span>
          </span>
          <span class="admin-teacher-text09">
            <span>condelabac@gmail.com</span>
          </span>
          <img
            alt="image"
            src="../public/external/deped-emblem-removebg-preview-200h-200h.png"
            class="admin-teacher-image"
          />
          <img
            alt="image"
            src="../public/external/conde-removebg-preview-200h-200h-200h.png"
            class="admin-teacher-image1"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-biba-200h.png"
            class="admin-teacher-pasted-image"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-6vpl-200h.png"
            class="admin-teacher-pasted-image1"
          />
          <a
            href="https://www.facebook.com/profile.php?id=100064010951891"
            target="_blank"
            rel="noreferrer noopener"
            class="admin-teacher-link"
          >
            <img
              alt="pastedImage"
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/901f97d7-21b6-4883-8645-86b64c281acb/e9ef7f05-bc5c-44f6-92e9-028782e7f4b5?org_if_sml=14138&amp;force_format=original"
              class="admin-teacher-facebook"
            />
          </a>
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-324d-200h-200h.png"
            class="admin-teacher-instagam"
          />
        </footer>
      </div>
    </div>
  </body>
</html>
