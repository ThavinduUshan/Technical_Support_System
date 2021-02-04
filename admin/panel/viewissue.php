<?php
  require_once('../../includes/dbh.inc.php');
  require_once('../../includes/functions.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>User Table</title>
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
  <thead>
    <tr>
      <th>Users Id</th>
      <th>Users Name</th>
      <th>Users Email</th>
      <th>Users Phone</th>
      <th>Issues Id</th>
      <th>title</th>
      <th>description</th>
      <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $result = getIssueData($conn);
      if($result){
        while($row = mysqli_fetch_assoc($result)){?>
          <tr>
            <td><?php echo $row['usersId'];?></td>
            <td><?php echo $row['usersName'];?></td>
            <td><?php echo $row['usersEmail'];?></td>
            <td><?php echo $row['usersPhone'];?></td>
            <td><?php echo $row['issuesId'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo htmlspecialchars_decode(substr($row['description'],0,25));?></td>
            <td><?php echo $row['status'];?></td>
            <td><button><a href="updateissue.php?issuesId=<?php echo $row['issuesId'];?>">Edit</a></button></td>
            <td><button><a href="deleteissue.php?issuesId=<?php echo $row['issuesId'];?>">Delete</a></button></td>
          </tr>
        <?php
        }
      }
    ?>
  </tbody>
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
        echo "<p>Can't update the issue at the moment!</p>";
      }
      else if($_GET["error"] == "none"){
        echo "<p>Issue details Updated!</p>";
      }
      else if($_GET["error"] == "cantdelete"){
        echo "<p>Can't delete the issue at the moment!</p>";
      }
      else if($_GET["error"] == "deleted"){
        echo "<p>issue details deleted!</p>";
      }
    }
  ?>
</body>
</html>