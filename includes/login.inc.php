<?php

  if(isset($_POST["submit"])) {

    $name = $_POST["uname"];
    $pwd = $_POST["psw"];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if(emptyInputLogin($name,$pwd) !== false){
      header("location: ../login/login.php?error=emptyinput");
      exit();
    }
    if($name == "admin"){
      loginAdmin($conn,$name,$pwd);
    }
    else{
      loginUser($conn,$name,$pwd);
    }
  }
  else{
    header("location:../login/login.php");
    exit();
  }