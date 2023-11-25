<?php
session_start();
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

  // Get user input
  $student_id = $_POST["student_no"];
  $password = $_POST["password"];

  // Perform user authentication and retrieve class_id
  $sql = "SELECT * FROM students WHERE StudentID = '$student_id' AND password = '$password'";
  
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
      // User authentication successful
      $user = $result->fetch_assoc();
      $class_id = $user["class_id"]; // Retrieve the class_id

      // Store user ID and class_id in session
      $_SESSION["user_id"] = $user["StudentID"];
      $_SESSION["classid"] = $class_id;

      header("Location: student-home.php");
  } else {
      // Invalid login credentials
      $_SESSION["error_message"] = "Invalid username or password.";
  }

  $conn->close();
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student-Login - CLIS - Student Portal</title>
    <meta property="og:title" content="Student-Login - CLIS - Student Portal" />
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
      <link href="./css/student-login.css" rel="stylesheet" />

      <div class="student-login-container">
        <div class="student-login-container1">
          <div class="student-login-container2">
            <div class="student-login-container3">
              <img
                alt="image"
                src="../public/external/rectangle19714-f0uv-1000h-1100h.png"
                class="student-login-image"
              />
              <h1 class="student-login-text">
                <span class="student-login-text01">CONDE LABAC&nbsp;</span>
                <br class="student-login-text02" />
                <span class="student-login-text03">INTEGRATED&nbsp;</span>
                <br class="student-login-text04" />
                <span class="student-login-text05">SCHOOL</span>
                <br />
              </h1>
              <span class="student-login-text07">
                Changing lives igniting success
              </span>
            </div>
          </div>
          <form method ="POST" class="student-login-form" action="student-login.php">
            <input
              type="text"
              placeholder="Student Number"
              name="student_no"
              class="student-login-textinput input"
            />
            <input
              type="password"
              placeholder="Password"
              name="password"
              class="student-login-textinput1 input"
            />
            <a href="../login-page.php" class="student-login-navlink">
              <svg viewBox="0 0 1024 1024" class="student-login-icon">
                <path
                  d="M1014.662 822.66c-0.004-0.004-0.008-0.008-0.012-0.010l-310.644-310.65 310.644-310.65c0.004-0.004 0.008-0.006 0.012-0.010 3.344-3.346 5.762-7.254 7.312-11.416 4.246-11.376 1.824-24.682-7.324-33.83l-146.746-146.746c-9.148-9.146-22.45-11.566-33.828-7.32-4.16 1.55-8.070 3.968-11.418 7.31 0 0.004-0.004 0.006-0.008 0.010l-310.648 310.652-310.648-310.65c-0.004-0.004-0.006-0.006-0.010-0.010-3.346-3.342-7.254-5.76-11.414-7.31-11.38-4.248-24.682-1.826-33.83 7.32l-146.748 146.748c-9.148 9.148-11.568 22.452-7.322 33.828 1.552 4.16 3.97 8.072 7.312 11.416 0.004 0.002 0.006 0.006 0.010 0.010l310.65 310.648-310.65 310.652c-0.002 0.004-0.006 0.006-0.008 0.010-3.342 3.346-5.76 7.254-7.314 11.414-4.248 11.376-1.826 24.682 7.322 33.83l146.748 146.746c9.15 9.148 22.452 11.568 33.83 7.322 4.16-1.552 8.070-3.97 11.416-7.312 0.002-0.004 0.006-0.006 0.010-0.010l310.648-310.65 310.648 310.65c0.004 0.002 0.008 0.006 0.012 0.008 3.348 3.344 7.254 5.762 11.414 7.314 11.378 4.246 24.684 1.826 33.828-7.322l146.746-146.748c9.148-9.148 11.57-22.454 7.324-33.83-1.552-4.16-3.97-8.068-7.314-11.414z"
                ></path>
              </svg>
            </a>
            <button type="submit" class="student-login-navlink1 button">
              <span>
                <span >Sign In</span>
                <br />
              </span>
            </a>
            <span class="student-login-text11">Portal Log In</span>
            <span class="student-login-text12">
              Sign in to start your session
            </span>
          </form>
        </div>
        <footer class="student-login-footer">
          <span class="student-login-text13">
            <span>Copyright © Conde Labac Integrated School</span>
          </span>
          <span class="student-login-text15">
            <span>Conde Labac Integrated School</span>
          </span>
          <span class="student-login-text17">
            <span>P4P6+5WC, Conde Labac, Batangas City</span>
          </span>
          <span class="student-login-text19">
            <span>(043) 728 - 2928</span>
          </span>
          <span class="student-login-text21">
            <span>condelabac@gmail.com</span>
          </span>
          <img
            alt="image"
            src="../public/external/deped-emblem-removebg-preview-200h-200h.png"
            class="student-login-image1"
          />
          <img
            alt="image"
            src="../public/external/conde-removebg-preview-200h-200h-200h.png"
            class="student-login-image2"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-biba-200h.png"
            class="student-login-pasted-image"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-6vpl-200h.png"
            class="student-login-pasted-image1"
          />
          <a
            href="https://www.facebook.com/profile.php?id=100064010951891"
            target="_blank"
            rel="noreferrer noopener"
            class="student-login-link"
          >
            <img
              alt="pastedImage"
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/901f97d7-21b6-4883-8645-86b64c281acb/e9ef7f05-bc5c-44f6-92e9-028782e7f4b5?org_if_sml=14138&amp;force_format=original"
              class="student-login-facebook"
            />
          </a>
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-324d-200h-200h.png"
            class="student-login-instagam"
          />
        </footer>
      </div>
    </div>
  </body>
</html>
