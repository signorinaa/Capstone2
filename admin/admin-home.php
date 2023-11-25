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
    <title>Admin-Home - CLIS - Student Portal</title>
    <meta property="og:title" content="Admin-Home - CLIS - Student Portal" />
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
      <link href="./css/admin-home.css" rel="stylesheet" />

      <div class="admin-home-container">
        <img
          alt="image"
          src="../public/conde-removebg-preview-800h.png"
          class="admin-home-image"
        />
        <img
          alt="image"
          src="../public/60fe99d03d624000048712a8-400w.png"
          class="admin-home-image1"
        />
        <h1 class="admin-home-text">Welcome, <?php echo $AdminName?>, Admin</h1>
        
        <a href="admin-enroll.php" class="admin-home-navlink">
          <div class="admin-home-forms">
            <span class="admin-home-text04">
              <span>STUDENTS</span>
              <br />
            </span>
            <img
              alt="pastedImage"
              src="../public/external/pastedimage-3pd-200h.png"
              class="admin-home-pasted-image1"
            />
          </div>
        </a>
        <div class="admin-home-vision">
          <h1 class="admin-home-text07">Vision</h1>
          <span class="admin-home-text08">
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
        <div class="admin-home-mission">
          <h1 class="admin-home-text36">Mission</h1>
          <span class="admin-home-text37">
            <span>
              To protect and promote the right of every Filipino to quality,
              equitable, culture-based, and complete basic education where:
            </span>
            <br class="admin-home-text39" />
            <br />
            <br class="admin-home-text41" />
            <br />
            <span>
              Students learn in a child-friendly, gender-sensitive, safe, and
              motivating environment.
            </span>
            <br class="admin-home-text44" />
            <br />
            <span>
              Teachers facilitate learning and constantly nurture every learner.
            </span>
            <br class="admin-home-text47" />
            <br />
            <span>
              Administrators and staff, as stewards of the institution, ensure
              an enabling and supportive environment for effective learning to
              happen.
            </span>
            <br class="admin-home-text50" />
            <br />
            <span>
              Family, community, and other stakeholders are actively engaged and
              share responsibility for developing life-long learners.
            </span>
          </span>
        </div>
        <div class="admin-home-core-values">
          <h1 class="admin-home-text53">Core Values</h1>
          <span class="admin-home-text54">
            <span>Maka-Diyos</span>
            <br class="admin-home-text56" />
            <br />
            <span>Maka-tao</span>
            <br class="admin-home-text59" />
            <br />
            <span>Makakalikasan</span>
            <br class="admin-home-text62" />
            <br />
            <span>Makabansa</span>
          </span>
        </div>
        <span class="admin-home-text65">November 12, 2023</span>
        <a href="logout.php" class="admin-home-navlink1">
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-1s3-200h.png"
            class="admin-home-icon-logout"
          />
        </a>
        <a href="logout.php" class="admin-home-navlink2">Log Out</a>
        <a href="admin-teacher.php">
        <div class="admin-home-forms1">
          <span class="admin-home-text66">
            <span>TEACHERS</span>
            <br />
          </span>
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-fxh-200h.png"
            class="admin-home-pasted-image2"
          />
        </div></a>
        <div class="admin-home-button">
          
          <button type="button" class="admin-home-button1 button">HOME</button>
        </div>
        <footer class="admin-home-footer">
          <span class="admin-home-text69">
            <span>Copyright © Conde Labac Integrated School</span>
          </span>
          <span class="admin-home-text71">
            <span>Conde Labac Integrated School</span>
          </span>
          <span class="admin-home-text73">
            <span>P4P6+5WC, Conde Labac, Batangas City</span>
          </span>
          <span class="admin-home-text75"><span>(043) 728 - 2928</span></span>
          <span class="admin-home-text77">
            <span>condelabac@gmail.com</span>
          </span>
          <img
            alt="image"
            src="../public/external/deped-emblem-removebg-preview-200h-200h.png"
            class="admin-home-image2"
          />
          <img
            alt="image"
            src="../public/external/conde-removebg-preview-200h-200h-200h.png"
            class="admin-home-image3"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-biba-200h.png"
            class="admin-home-pasted-image3"
          />
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-6vpl-200h.png"
            class="admin-home-pasted-image4"
          />
          <a
            href="https://www.facebook.com/profile.php?id=100064010951891"
            target="_blank"
            rel="noreferrer noopener"
            class="admin-home-link"
          >
            <img
              alt="pastedImage"
              src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/901f97d7-21b6-4883-8645-86b64c281acb/e9ef7f05-bc5c-44f6-92e9-028782e7f4b5?org_if_sml=14138&amp;force_format=original"
              class="admin-home-facebook"
            />
          </a>
          <img
            alt="pastedImage"
            src="../public/external/pastedimage-324d-200h-200h.png"
            class="admin-home-instagam"
          />
        </footer>
      </div>
    </div>
  </body>
</html>
