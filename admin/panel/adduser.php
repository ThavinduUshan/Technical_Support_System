<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User registration</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <ul>
      <li><a href="../../includes/logoutadmin.inc.php">Logout</a></li>
      <div id="logo">
        <a href="admin.php">
          <img src="logo-nav.png" width="50px">
        </a>
      </div>
      <li style="float:left">
        <a href="#">
          <?php
            if(isset($_SESSION["adminId"])){
               echo "Admin : ". $_SESSION["adminName"] ." ";
           }
          ?>
        </a>
      </li>
    </ul>
  </nav>
<div class="adduseradmin">
<h1>Add a new user</h1>
<form name=myform action="../../includes/adduser.inc.php" method="post">
    <label>Username: </label>
    <input type="text" name="uname" placeholder="Username" id="uname"></br></br>
    <label>Email </label>
    <input type="text" name="email" placeholder="Email" id="psw"></br></br>
    <label>Phone Number: </label>
    <input type="text" name="pnumber" placeholder="Phone number" id="pnumber"></br></br>
    <label>Password: </label>
    <input type="password" name="psw" placeholder="Password" id="psw"></br></br>
    <label>Re-typePassword: </label>
    <input type="password" name="repsw" placeholder="Re-type Password" id="repsw"></br></br>
    <button type="submit" name="submit">Register a new user</button>
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
      else if($_GET["error"] == "pwddontmatch"){
        echo "<p>Passwords Don't Match!</p>";
      }
      else if($_GET["error"] == "unametaken"){
        echo "<p>Username is already taken!</p>";
      }
      else if($_GET["error"] == "stmtfailed"){
        echo "<p>Something went wrong!</p>";
      }
      else if($_GET["error"] == "none"){
        echo "<p>User Registerd!</p>";
      }
    }
  ?>
  </form>
  </div>
</body>
</html>