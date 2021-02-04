<?php

  if(isset($_POST["submit"])) {

    $name = $_POST["uname"];
    $pwd = $_POST["psw"];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if(emptyInputAdminLogin($name,$pwd) !== false){
      header("location: ../admin/login.php?error=emptyinput");
      exit();
    }

    loginAdmin($conn,$name,$pwd);
  }
  else{
    header("location:../admin/login.php");
    exit();
  }