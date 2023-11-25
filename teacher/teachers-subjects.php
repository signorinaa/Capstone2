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
      <a href="logout.php" class="teachers-subjects-navlink">
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
  $db_name = "conde";

  // Assume you have the logged-in teacher's ID
  $loggedInFacultyID = $_SESSION["user_id"]; // Replace with your actual mechanism to get the teacher ID

// SQL query to retrieve class sections, subjects, and faculty assignments for the logged-in teacher
$sql = "SELECT 
            c.ClassID, 
            c.gradeLevel, 
            c.ClassName, 
            s.SubjectID, 
            s.SubjectName
        FROM Classes AS c
        LEFT JOIN Schedules AS sch ON c.ClassID = sch.ClassID
        LEFT JOIN Subjects AS s ON sch.SubjectID = s.SubjectID
        LEFT JOIN TeachingAssignments AS ta ON s.SubjectID = ta.SubjectID
        WHERE ta.FacultyID = $loggedInFacultyID
        ORDER BY c.gradeLevel, c.ClassName, s.SubjectName";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $currentGradeLevel = '';
  
  while ($row = $result->fetch_assoc()) {
      $class_id = $row['ClassID'];
      $class_name = $row['ClassName'];
      $subject_id = $row['SubjectID'];
      $subject_name = $row['SubjectName'];
      
      if ($currentGradeLevel != $row['gradeLevel']) {
          if ($currentGradeLevel !== '') {
              echo "</table>"; // Close the previous table
          }
          
          $currentGradeLevel = $row['gradeLevel'];
          
          echo "<h2>Grade $currentGradeLevel</h2>";
          echo "<table>
              <tr>
                  <th>Class Name</th>
                  <th>Subject Name</th>
                  <th>Action</th>
              </tr>";
      }
      
      echo "<tr>
          <td>$class_name</td>
          <td>$subject_name</td>
          <td style='white-space: nowrap;'>
              <a href='view_class.php?class_id=$class_id' style='white-space:nowrap;display:inline;'>View</a> |
              <a href='delete_class.php?class_id=$class_id' style='white-space:nowrap;display:inline;'>Delete</a>
          </td>
      </tr>";
  }
  
  echo "</table>"; // Close the last table
} else {
  echo "No data found.";
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
