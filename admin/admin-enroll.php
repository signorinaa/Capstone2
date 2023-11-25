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
    <title>Admin-Enroll - CLIS - Student Portal</title>
    <meta property="og:title" content="Admin-Enroll - CLIS - Student Portal" />
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
      <link href="./css/admin-enroll.css" rel="stylesheet" />

      <div class="admin-enroll-container">
        <div class="admin-enroll-container1">
          <a href="index.html" class="admin-enroll-navlink">
            <img
              alt="pastedImage"
              src="../public/external/pastedimage-1s3-200h.png"
              class="admin-enroll-icon-logout"
            />
          </a>
          <span class="admin-enroll-text">Log Out</span>
          <div class="admin-enroll-button">
            <a
              href="admin-announcement.html"
              class="admin-enroll-navlink1 button"
            >
              ANNOUNCEMENT
            </a>
            <a href="admin-home.php" class="admin-enroll-navlink2 button">
              HOME
            </a>
          </div>
        </div>
        <div class="admin-enroll-students">
          <div class="admin-enroll-container2">
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
    font-size: 24px;
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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["gradeLevel"])) {
    $selectedGradeLevel = $_POST["gradeLevel"];

    // Query to select all students and sort by selected gradeLevel
    $sql = "SELECT students.LastName, students.FirstName, students.MiddleName, students.StudentID, enrollments.classid, classes.ClassName, classes.gradeLevel, students.EnrollmentStatus
            FROM students
            JOIN enrollments ON students.StudentID = enrollments.studentid
            JOIN classes ON enrollments.classid = classes.classid
            WHERE classes.gradeLevel = '$selectedGradeLevel'
            ORDER BY classes.gradeLevel";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Student ID</th>
                    <th>Class Name</th>
                    <th>Grade Level</th>
                    <th>Status</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["LastName"] . "</td>
                    <td>" . $row["FirstName"] . "</td>
                    <td>" . $row["MiddleName"] . "</td>
                    <td>" . $row["StudentID"] . "</td>
                    <td>" . $row["ClassName"] . "</td>
                    <td>" . $row["gradeLevel"] . "</td>
                    <td>" . $row["EnrollmentStatus"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No students found for the selected grade level.";
    }
}

// Query to get unique grade levels for dropdown options
$gradeLevelQuery = "SELECT DISTINCT gradeLevel FROM classes";
$gradeLevelResult = $conn->query($gradeLevelQuery);

// Close the connection
$conn->close();
?>
          </div>
          <div class="admin-enroll-container3">
            <span class="admin-enroll-subject">
              <span class="admin-enroll-text07">Enrollees</span>
              <br />
            </span>
            <span class="admin-enroll-sort-by">
              <span>Sort By :&nbsp;</span>
              <br />
            </span>
            <div class="admin-enroll-container4" >
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top:11px;margin-left:20px;font-size:19px;">
    <label for="gradeLevel">Grade Level:</label>
    <select name="gradeLevel" id="gradeLevel">
        <?php
        while ($gradeLevelRow = $gradeLevelResult->fetch_assoc()) {
            $selected = isset($selectedGradeLevel) && $selectedGradeLevel == $gradeLevelRow["gradeLevel"] ? "selected" : "";
            echo "<option value='" . $gradeLevelRow["gradeLevel"] . "' $selected>" . $gradeLevelRow["gradeLevel"] . "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Sort">
</form>
              
            </div>
            
            
          </div>
        </div>
        <footer class="admin-enroll-footer">
          <span class="admin-enroll-text15">
            <span>Copyright © Conde Labac Integrated School</span>
          </span>
          <span class="admin-enroll-text17">
            <span>Conde Labac Integrated School</span>
          </span>
          <span class="admin-enroll-text19">
            <span>P4P6+5WC, Conde Labac, Batangas City</span>
          </span>
          <span class="admin-enroll-text21"><span>(043) 728 - 2928</span></span>
          <span class="admin-enroll-text23">
            <span>condelabac@gmail.com</span>
          </span>
          <img
            alt="image"
            src="../public/external/deped-emblem-removebg-preview-200h-200h.png"
            class="admin-enroll-image"
          />
          <img
            alt="image"
            src="../public/external/conde-removebg-preview-200h-200h-200h.png"
            class="admin-enroll-image1"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-biba-200h.png"
            class="admin-enroll-pasted-image"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-6vpl-200h.png"
            class="admin-enroll-pasted-image1"
          />
          <a
            href="https://www.facebook.com/profile.php?id=100064010951891"
            target="_blank"
            rel="noreferrer noopener"
            class="admin-enroll-link"
          >
            <img
              alt="pastedImage"
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/901f97d7-21b6-4883-8645-86b64c281acb/e9ef7f05-bc5c-44f6-92e9-028782e7f4b5?org_if_sml=14138&amp;force_format=original"
              class="admin-enroll-facebook"
            />
          </a>
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-324d-200h-200h.png"
            class="admin-enroll-instagam"
          />
        </footer>
      </div>
    </div>
  </body>
</html>
