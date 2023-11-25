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

$sql = "SELECT * FROM Faculty WHERE FacultyID = $user_id";
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $firstName = $row["FirstName"];
    $lastName = $row["LastName"];
    $email = $row["Email"];
    $TeacherName = $lastName . ", " . $firstName;
}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Teachers-Home - CLIS - Student Portal</title>
    <meta property="og:title" content="Teachers-Home - CLIS - Student Portal" />
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
      <link href="./css/teachers-home.css" rel="stylesheet" />

      <div class="teachers-home-container">
        <img
          alt="image"
          src="../public/conde-removebg-preview-800h.png"
          class="teachers-home-image"
        />
        <img
          alt="image"
          src="../public/60fe99d03d624000048712a8-400w.png"
          class="teachers-home-image1"
        />
        <h1 class="teachers-home-text">Welcome, <?php echo $TeacherName?></h1>
        <a href="teachers-subjects.php" class="teachers-home-navlink">
          <div class="teachers-home-subjects">
            <svg viewBox="0 0 1152 1024" class="teachers-home-icon-subject">
              <path
                d="M224 128h-192c-17.6 0-32 14.4-32 32v704c0 17.6 14.4 32 32 32h192c17.6 0 32-14.4 32-32v-704c0-17.6-14.4-32-32-32zM192 320h-128v-64h128v64z"
              ></path>
              <path
                d="M544 128h-192c-17.6 0-32 14.4-32 32v704c0 17.6 14.4 32 32 32h192c17.6 0 32-14.4 32-32v-704c0-17.6-14.4-32-32-32zM512 320h-128v-64h128v64z"
              ></path>
              <path
                d="M765.088 177.48l-171.464 86.394c-15.716 7.918-22.096 27.258-14.178 42.976l287.978 571.548c7.918 15.718 27.258 22.098 42.976 14.178l171.464-86.392c15.716-7.92 22.096-27.26 14.178-42.974l-287.978-571.55c-7.92-15.718-27.26-22.1-42.976-14.18z"
              ></path>
            </svg>
            <span class="teachers-home-text01">
              <span>Subjects</span>
              <br />
            </span>
          </div>
        </a>
       
        <div class="teachers-home-vision">
          <h1 class="teachers-home-text07">Vision</h1>
          <span class="teachers-home-text08">
            <span>We dream of Filipinos</span>
            <br />
            <br />
            <span>who passionately love their country</span>
            <br />
            <br />
            <span>and whose values and competencies</span>
            <br />
            <br />
            <span>enable them to realize their full potential</span>
            <br />
            <br />
            <span>and contribute meaningfully to building the nation.</span>
            <br />
            <br />
            <br />
            <br />
            <span>As a learner-centered public institution,</span>
            <br />
            <br />
            <span>the Department of Education</span>
            <br />
            <br />
            <span>continuously improves itself</span>
            <br />
            <br />
            <span>to better serve its stakeholders.</span>
          </span>
        </div>
        <div class="teachers-home-mission">
          <h1 class="teachers-home-text36">Mission</h1>
          <span class="teachers-home-text37">
            <span>
              To protect and promote the right of every Filipino to quality,
              equitable, culture-based, and complete basic education where:
            </span>
            <br class="teachers-home-text39" />
            <br />
            <br class="teachers-home-text41" />
            <br />
            <span>
              Students learn in a child-friendly, gender-sensitive, safe, and
              motivating environment.
            </span>
            <br class="teachers-home-text44" />
            <br />
            <span>
              Teachers facilitate learning and constantly nurture every learner.
            </span>
            <br class="teachers-home-text47" />
            <br />
            <span>
              Administrators and staff, as stewards of the institution, ensure
              an enabling and supportive environment for effective learning to
              happen.
            </span>
            <br class="teachers-home-text50" />
            <br />
            <span>
              Family, community, and other stakeholders are actively engaged and
              share responsibility for developing life-long learners.
            </span>
          </span>
        </div>
        <div class="teachers-home-core-values">
          <h1 class="teachers-home-text53">Core Values</h1>
          <span class="teachers-home-text54">
            <span>Maka-Diyos</span>
            <br class="teachers-home-text56" />
            <br />
            <span>Maka-tao</span>
            <br class="teachers-home-text59" />
            <br />
            <span>Makakalikasan</span>
            <br class="teachers-home-text62" />
            <br />
            <span>Makabansa</span>
          </span>
        </div>
        <span class="teachers-home-text65">November 12, 2023</span>
        <a href="logout.php" class="teachers-home-navlink1">
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-1s3-200h.png"
            class="teachers-home-icon-logout"
          />
        </a>
        <span class="teachers-home-text66">Log Out</span>
        
        <div class="teachers-home-button">
          
          <a href="teachers-home.php" class="teachers-home-navlink3 button">
            HOME
          </a>
        </div>
        <footer class="teachers-home-footer">
          <span class="teachers-home-text70">
            <span>Copyright © Conde Labac Integrated School</span>
          </span>
          <span class="teachers-home-text72">
            <span>Conde Labac Integrated School</span>
          </span>
          <span class="teachers-home-text74">
            <span>P4P6+5WC, Conde Labac, Batangas City</span>
          </span>
          <span class="teachers-home-text76">
            <span>(043) 728 - 2928</span>
          </span>
          <span class="teachers-home-text78">
            <span>condelabac@gmail.com</span>
          </span>
          <img
            alt="image"
            src="../public/external/deped-emblem-removebg-preview-200h-200h.png"
            class="teachers-home-image2"
          />
          <img
            alt="image"
            src="../public/external/conde-removebg-preview-200h-200h-200h.png"
            class="teachers-home-image3"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-biba-200h.png"
            class="teachers-home-pasted-image"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-6vpl-200h.png"
            class="teachers-home-pasted-image1"
          />
          <a
            href="https://www.facebook.com/profile.php?id=100064010951891"
            target="_blank"
            rel="noreferrer noopener"
            class="teachers-home-link"
          >
            <img
              alt="pastedImage"
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/901f97d7-21b6-4883-8645-86b64c281acb/e9ef7f05-bc5c-44f6-92e9-028782e7f4b5?org_if_sml=14138&amp;force_format=original"
              class="teachers-home-facebook"
            />
          </a>
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-324d-200h-200h.png"
            class="teachers-home-instagam"
          />
        </footer>
      </div>
    </div>
  </body>
</html>
