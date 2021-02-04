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
    <h1>Admin Panel</h1>
    <h2>Hello Admin!</h2>
    <form name="adform" method="post" action="../includes/adminlogin.inc.php">
      <label>Username</label>
      <input type="text" placeholder="Enter your username" name="uname" id="uname">
      <label>Password</label>
      <input type="password" placeholder="Enter your password" name="psw" id="psw">
      <button type="submit" name="submit">Login</button>
    </form>
    <?php
    if(isset($_GET["error"])) {
      if($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all feilds!</p>";
      }
      else if($_GET["error"] == "invalidlogin"){
        echo "<p>Invalid Username!</p>";
      }
      else if($_GET["error"] == "wrongpassword"){
        echo "<p>Incorrect Password!</p>";
      }
    }
  ?>
  </div>
</body>
</html>