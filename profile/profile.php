<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Profile</title>
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
      <li><a href="../support/support.php">Facilities</a></li>
      <div id="logo">
        <a href="../index.php">
          <img src="logo-nav.png" width="50px">
        </a>
    </ul>
  </nav>
  <div class="error">
  <?php
    if(isset($_GET["error"])) {
      if($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all feilds!</p>";
      }
      else if($_GET["error"] == "invaliduname"){
        echo "<p>Invalid Username!</p>";
      }
      else if($_GET["error"] == "invalidemail"){
        echo "<p>Invalid Email!</p>";
      }
      else if($_GET["error"] == "unametaken"){
        echo "<p>Username is already taken!</p>";
      }
      else if($_GET["error"] == "pwddontmatch"){
        echo "<p>Passwords aren't matched!</p>";
      }
      else if($_GET["error"] == "cantupdate"){
        echo "<p>Can't update the details at the moment!</p>";
      }
      else if($_GET["error"] == "none"){
        echo "<p>User details Updated!</p>";
      }
    }
  ?>
  </div>
  <div class="profile">
  <?php
        if(isset($_SESSION["usersId"])){
          echo "<h2>Welcome Back ". $_SESSION["usersName"] ."! </h2>";
        }
  ?>
  
  <h1>Profile Details</h1>
  </div>
  <table class="table-p">
  <tr>
    <td>
    <h2>User Details</h2>
    <p>By clicking the below button, you can update your user details such as name, email, phone
      number and password. Also you can delete your user acoount if needed</p>
      <button><a href="updateuser.php?usersId=<?php echo $_SESSION['usersId']?>">View User Details</a></button>
    </td>
    <td>
    <h2>Support Ticket</h2>
    <p>By clicking the below button, You can send us a support ticket by describing your issue.
      we are always here to assist your problem as soon as possible. </p>
      <button><a href="../support/supportticket.php">Send us a Support ticket</a></button>

    </td>
    </tr>
  </table>
</body>
</html>

<?php