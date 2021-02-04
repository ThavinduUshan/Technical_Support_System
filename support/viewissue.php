<?php
  require_once('../includes/dbh.inc.php');
  require_once('../includes/functions.inc.php');
  $row = issueGet($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Update issue</title>
</head>
<body>
<nav>
    <ul>
    <?php
        if(isset($_SESSION["usersId"])){
          echo "<li><a href='../profile/profile.php'>Profile</a></li>";
          echo "<li><a href='../includes/logout.inc.php'>Log Out</a></li>";
        }
      else{
        echo "<li><a href='../login/login.php'>Login</a></li>";
        echo "<li><a href='../register/register.php'>Signup</a></li>";
      }
      ?>
      <li><a href="../faq/faq.php">Help</a></li>
      <li><a href="support.php">Facilities</a></li>
      <div id="logo">
        <a href="../index.php">
          <img src="logo-nav.png" width="50px">
        </a>
    </ul>
  </nav>
  <div class="view-issue">
  <h1>View Issue</h1>
    <form>
        <textarea readonly name="description" rows="20" cols="75"><?php echo $row['description'];?></textarea></br></br>
      </form>
  </div>
</body>
</html>