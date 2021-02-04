<?php
  session_start();
?>
<?php
  require_once('../includes/dbh.inc.php');
  require_once('../includes/functions.inc.php');
  $row = updateGet($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <link rel="stylesheet" href="style.css">
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
        <a href="profile.php">
          <img src="logo-nav.png" width="50px">
        </a>
    </ul>
  </nav>
  <div class="update-user">
  <h1>Update User</h1>
  <form action="../includes/updateuserprofile.inc.php" name=myform method="post" >
    <input type="hidden" name="uid" placeholder="UserId" id="uid" value="<?php echo $row['usersId'];?>" readonly>
    
    <label>Username:</label>
    <input type="text" name="uname" placeholder="Username" id="uname" value="<?php echo $row['usersName'];?>" readonly>
    </br></br>
    <label>Email </label>
    <input type="text" name="email" placeholder="Email" id="email" value="<?php echo $row['usersEmail'];?>"></br></br>
    <label>Phone Number: </label>
    <input type="text" name="pnumber" placeholder="Phone number" id="pnumber" value="<?php echo $row['usersPhone'];?>"></br></br>
    <label>Password</label>
    <input type="password" placeholder="Enter your password" name="psw" id="psw"></br></br>
    <label>Re-Enter Password</label>
    <input type="password" placeholder="Re-Enter your password" name="repsw" id="repsw"></br></br>
    <button type="submit" name="submit">Update Details</button>
  </form>
</div>
<div class="del">
<button onclick=delete_account()><a href="deleteuser.php?usersId=<?php echo $row['usersId'];?>">Delete the Account</a></button>
</div>
</body>
</html>
