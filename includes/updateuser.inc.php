<?php

  if(isset($_POST["submit"])){
    $usersId = $_POST["update-uid"];
    $name = $_POST["update-uname"];
    $email = $_POST["update-email"];
    $phone = $_POST["update-pnumber"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputUpdate($name,$email,$phone) !== false){
      header("location: ../admin/panel/viewuser.php?error=emptyinput");
      exit();
    }

    if(invaliduName($name) !== false){
      header("location: ../admin/panel/viewuser.php?error=invaliduname");
      exit();
    }

    if(invalidEmail($email) !== false){
      header("location: ../admin/panel/viewuser.php?error=invalidemail");
      exit();
    }

    updateUserData($conn, $usersId, $name, $email, $phone);


  }
  else {
    header("location: ../admin/panel/viewuser.php");
    exit();
  }