<?php
  require_once('../../includes/dbh.inc.php');
  require_once('../../includes/functions.inc.php');
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
  <div class="update-issue">
  <h1>Update Issue status</h1>
    <form action="../../includes/updateissue.inc.php" method="post">
        <input type="text" name="uid" id="uid" placeholder="User ID" value="<?php echo $row['usersId'];?>"></br></br>
        <input type="text" name="issuesId" id="issuesId" placeholder="Issues ID" value="<?php echo $row['issuesId'];?>"></br></br>
        <input type="text" name="subject" id ="subject" placeholder="subject" value="<?php echo $row['title'];?>"></br></br>
        <textarea name="description" rows="20" cols="75"><?php echo $row['description'];?></textarea></br></br>
        <label for="status">Stauts : </label>
        <select name="status" id="status" value="<?php echo $row['status'];?>">
          <option selected="selected">Pending</option>
          <option >Solved</option>
        </select></br></br>
        <button type="submit" name="submit">Update</button>
      </form>
  </div>
</body>
</html>