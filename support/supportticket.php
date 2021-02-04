<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Home</title>
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
      <li><a href="support.php">Facilities</a></li>
      <div id="logo">
        <a href="../index.php">
          <img src="logo-nav.png" width="50px">
        </a>
    </ul>
  </nav>
  <div class="sp-ticket">
    <h1>Support Ticket</h1>
      <form name="supform" action="../includes/support.inc.php" method="post">
        <label>Subject</label></br>
        <input type="text" name = "subject" id = subject placeholder="Subject"></br></br>
        <label>Describe your issue</label></br>
        <textarea name="description" rows="18" cols="75">Please Describe Your Issue Here</textarea></br></br>
        <label for="status">Stauts : </label>
          <select id="status" name="status" >
            <option value="pending" selected="selected">Pending</option>
            <option value="solved" disabled>Solved</option>
          </select></br></br>
        <button type="submit" name="submit">Send</button>
      </form>
      <?php
    if(isset($_GET["error"])) {
      if($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all feilds!</p>";
      }
      else if($_GET["error"] == "stmtfailed"){
        echo "<p>Something went wrong!</p>";
      }
      else if($_GET["error"] == "none"){
        echo "<p>Message Sent!</p>";
      }
      else if($_GET["error"] == "cantdelete"){
        echo "<p>Can't delete the issue at the moment!</p>";
      }
      else if($_GET["error"] == "deleted"){
        echo "<p>issue details deleted!</p>";
      }
    }
  ?>
    </div></br></br></br>
    <section>
    <table id="issues">
      <tr>
          <th>Issues Id</th>
          <th>Title</th>
          <th>Description</th>
          <th>Stauts</th>
          <th>View</th>
          <th>Delete</th>
      </tr>
    <?php
      require_once('../includes/dbh.inc.php');
      require_once('../includes/functions.inc.php');
      $usersId = $_SESSION['usersId'];
      $result = yourIssues($conn, $usersId);
      if($result){
        while($row = mysqli_fetch_assoc($result)){?>
          <tr>
            <td><?php echo $row['issuesId'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo htmlspecialchars_decode(substr($row['description'],0,25));?></td>
            <td><?php echo $row['status'];?></td>
            <td><button><a href="viewissue.php?issuesId=<?php echo $row['issuesId'];?>">View</a></button></td>
            <td><button><a href="deleteissue.php?issuesId=<?php echo $row['issuesId'];?>">Delete</a></button></td>
          </tr>
          <?php
          }
        }
      ?>
    </table>
  </section>  
</body>
</html>