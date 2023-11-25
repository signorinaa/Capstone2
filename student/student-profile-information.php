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
$db_name = "conde";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM Students WHERE StudentID = $user_id";
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $firstName = $row["FirstName"];
    $lastName = $row["LastName"];
    $middleName = $row["MiddleName"];
    $email = $row["Email"];
    $StudentID = $row["StudentID"];
    $Status = $row["EnrollmentStatus"];
    $StudentName = $lastName . ", " . $firstName . " " . $middleName;
    $DOB = $row["DateOfBirth"];
    $Address = $row["Address"];
    $Gender = $row["Gender"];
}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student-Profile-Information - CLIS - Student Portal</title>
    <meta
      property="og:title"
      content="Student-Profile-Information - CLIS - Student Portal"
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
      <link href="./css/student-profile-information.css" rel="stylesheet" />

      <div class="student-profile-information-container">
        <div class="student-profile-information-container1">
          <div class="student-profile-information-buttons">
            <a
              href="student-announcement.php"
              class="student-profile-information-navlink button"
            >
              ANNOUNCEMENT
            </a>
            <a
              href="student-home.php"
              class="student-profile-information-navlink1 button"
            >
              HOME
            </a>
            <a
              href="student-profile.php"
              class="student-profile-information-navlink2 button"
            >
              PROFILE
            </a>
          </div>
          <div class="student-profile-information-student-information">
            <h1 class="student-profile-information-text">
              STUDENT INFORMATION
            </h1>
            <span class="student-profile-information-text01">
              <span>Birthday : <?php echo $DOB?></span>
              <br />
            </span>
            <span class="student-profile-information-text04">
              <span>Birth Place : Conde Labac Batangas CIty</span>
              <br />
            </span>
            <span class="student-profile-information-text07">
              <span>Address : <?php echo $Address?></span>
              <br />
            </span>
            <span class="student-profile-information-text10">
              <span>Gender : <?php echo $Gender?></span>
              <br />
            </span>
            <span class="student-profile-information-text13">
              <span>Mother Tounge : Filipino</span>
              <br />
            </span>
            <a
              href="student-profile.php"
              class="student-profile-information-navlink3"
            >
              <img
                alt="pastedImage"
                src="../public/external/pastedimage-3bps-200h.png"
                class="student-profile-information-pasted-image"
              />
            </a>
          </div>
          <div class="student-profile-information-container2">
            <img
              alt="image"
              src="../public/illustration-of-formal-photo-of-indonesian-elementary-school-students-faceless-indonesian-female-student-vector-300h.jpg"
              class="student-profile-information-image"
            />
            <h1 class="student-profile-information-text16"><?php echo $StudentName?></h1>
            <span class="student-profile-information-text17">
              Student No. : <?php echo $StudentID?>
            </span>
            <span class="student-profile-information-text18">
              Status : <?php echo $Status?>
            </span>
          </div>
          <a href="index.html" class="student-profile-information-navlink4">
            <img
              alt="pastedImage"
              src="../public/external/pastedimage-1s3-200h.png"
              class="student-profile-information-icon-logout"
            />
          </a>
          <a href="index.html" class="student-profile-information-navlink5">
            Log Out
          </a>
        </div>
        <footer class="student-profile-information-footer">
          <span class="student-profile-information-text19">
            <span>Copyright © Conde Labac Integrated School</span>
          </span>
          <span class="student-profile-information-text21">
            <span>Conde Labac Integrated School</span>
          </span>
          <span class="student-profile-information-text23">
            <span>P4P6+5WC, Conde Labac, Batangas City</span>
          </span>
          <span class="student-profile-information-text25">
            <span>(043) 728 - 2928</span>
          </span>
          <span class="student-profile-information-text27">
            <span>condelabac@gmail.com</span>
          </span>
          <img
            alt="image"
            src="../public/external/deped-emblem-removebg-preview-200h-200h.png"
            class="student-profile-information-image1"
          />
          <img
            alt="image"
            src="../public/external/conde-removebg-preview-200h-200h-200h.png"
            class="student-profile-information-image2"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-biba-200h.png"
            class="student-profile-information-pasted-image1"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-6vpl-200h.png"
            class="student-profile-information-pasted-image2"
          />
          <a
            href="https://www.facebook.com/profile.php?id=100064010951891"
            target="_blank"
            rel="noreferrer noopener"
            class="student-profile-information-link"
          >
            <img
              alt="pastedImage"
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/901f97d7-21b6-4883-8645-86b64c281acb/e9ef7f05-bc5c-44f6-92e9-028782e7f4b5?org_if_sml=14138&amp;force_format=original"
              class="student-profile-information-facebook"
            />
          </a>
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-324d-200h-200h.png"
            class="student-profile-information-instagam"
          />
        </footer>
      </div>
    </div>
  </body>
</html>
