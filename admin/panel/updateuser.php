<?php
  require_once('../../includes/dbh.inc.php');
  require_once('../../includes/functions.inc.php');
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
  <div class="update-user">
  <form action="../../includes/updateuser.inc.php" name=myform method="post" >
  <h1>Update User</h1>
    <input type="hidden" name="update-uid" placeholder="UserId" id="uid" value="<?php echo $row['usersId'];?>" readonly>
    <label>Username: </label>
    <input type="text" name="update-uname" placeholder="Username" id="uname" value="<?php echo $row['usersName'];?>" readonly></br></br>
    <label>Email </label>
    <input type="text" name="update-email" placeholder="Email" id="email" value="<?php echo $row['usersEmail'];?>"></br></br>
    <label>Phone Number: </label>
    <input type="text" name="update-pnumber" placeholder="Phone number" id="pnumber" value="<?php echo $row['usersPhone'];?>"></br></br>
    <button type="submit" name="submit">Update the user</button>
  </form>
</div>
</body>
</html>