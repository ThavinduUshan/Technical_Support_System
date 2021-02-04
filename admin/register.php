<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>admin</title>
</head>
<body>
 
  <div class="admin">
    <h1>Admin Signup</h1></br>
    <form name="adform" method="post" action="../includes/adminsignup.inc.php">
      <label>Username</label>
      <input type="text" placeholder="Enter your username" name="uname" id="uname">
      <label>Email</label>
      <input type="email" placeholder="Enter your email" name="email" id="email">
      <label>Password</label>
      <input type="password" placeholder="Enter your password" name="psw" id="psw">
      <label>Re-Enter Password</label>
      <input type="password" placeholder="Re-Enter your password" name="repsw" id="repsw">
      <button type="submit" name="submit">Register</button>
    </form>
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
        echo "<p>You have signed up!</p>";
      }
    }
  ?>
  </div>
</body>
</html>