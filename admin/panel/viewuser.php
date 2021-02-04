<?php
  require_once('../../includes/dbh.inc.php');
  require_once('../../includes/functions.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>View users</title>
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
<table id="users">
  <tr>
    <th>Users Id</th>
    <th>Users Name</th>
    <th>Users Email</th>
    <th>Users Phone</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
      $result = getUserData($conn);
      if($result){
        while($row = mysqli_fetch_assoc($result)){?>
          <tr>
            <td><?php echo $row['usersId'];?></td>
            <td><?php echo $row['usersName'];?></td>
            <td><?php echo $row['usersEmail'];?></td>
            <td><?php echo $row['usersPhone'];?></td>
            <td><button><a href="updateuser.php?usersId=<?php echo $row['usersId'];?>">Edit</a></button></td>
            <td><button id="del"><a href="deleteuser.php?usersId=<?php echo $row['usersId'];?>">Delete</a></button></td>
          </tr>
        <?php
        }
      }
    ?>
</table>
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

      else if($_GET["error"] == "cantupdate"){
        echo "<p>Can't update the user at the moment!</p>";
      }
      else if($_GET["error"] == "none"){
        echo "<p>User details Updated!</p>";
      }
      else if($_GET["error"] == "cantdelete"){
        echo "<p>Can't delete the user at the moment!</p>";
      }
      else if($_GET["error"] == "deleted"){
        echo "<p>User details deleted!</p>";
      }
    }
  ?>
</body>
</html>
