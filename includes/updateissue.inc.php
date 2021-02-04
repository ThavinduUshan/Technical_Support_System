<?php

  if(isset($_POST["submit"])){
    $usersId = $_POST["uid"];
    $issuesId = $_POST["issuesId"];
    $title = $_POST["subject"];
    $des = $_POST["description"];
    $status = $_POST["status"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    updateissueData($conn, $usersId, $issuesId, $title, $des, $status);


  }
  else {
    header("location: ../admin/panel/viewissue.php");
    exit();
  }