<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>
<body>
  <a href="../index.php">
    <img src="logo-nav.png" width="60px" class="logo">
  </a>
  <div class="login">
    <h1>User Login</h1>
    <h2>Welcome back!</h2>
    <form name="logform" method="post" action="../includes/login.inc.php">
      <label>Username</label>
      <input type="text" placeholder="Enter your username" id="uname" name="uname">
      <label>Password</label>
      <input type="password" placeholder="Enter your password" id="psw" name="psw">
      <button type="submit" name="submit">Login</button>
      <h3>Don't have an account? <a href="../register/register.php">Register</a></h3>
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