<?php
  session_start();
?>
<?php

if(isset($_POST["submit"])) {

  $usersId = $_SESSION["usersId"];
  $title = $_POST["subject"];
  $des = $_POST["description"];
  $status = $_POST["status"];

  require_once('dbh.inc.php');
  require_once('functions.inc.php');

  if(emptyInputSupport($title,$des) !== false){
    header("location: ../support/supportticket.php?error=emptyinput");
    exit();
  }

  submitIssue($conn,$usersId,$title, $des, $status);
}
else{
  header("location:../support/supportticket.php");
  exit();
}