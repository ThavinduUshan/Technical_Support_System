<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Panel</title>
</head>
<body>
<nav>
    <ul>
      <li><a href="../../includes/logoutadmin.inc.php">Logout</a></li>
      <div id="logo">
        <a href="#">
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
  
  <div class="ai">
    <h1>User Management</h1>
    <span class="block">
    <button><a href="viewuser.php">View Users</a></button>
    <button><a href="adduser.php">Add Users</a></button></br></br></br>
  </span>
    <h1>Issue Management</h1>
   <button><a href="viewissue.php">View Issue</a></button></br></br></br>
    </div>
</body>
</html>