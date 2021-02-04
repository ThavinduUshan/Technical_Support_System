<?php

  if(isset($_POST["submit"])){

    $usersId = $_POST["uid"];
    $name = $_POST["uname"];
    $email = $_POST["email"];
    $phone = $_POST["pnumber"];
    $pwd = $_POST["psw"];
    $repwd = $_POST["repsw"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSinup($name,$email,$phone,$pwd,$repwd) !== false){
      header("location: ../profile/profile.php?error=emptyinput");
      exit();
    }

    if(invaliduName($name) !== false){
      header("location: ../profile/profile.php?error=invaliduname");
      exit();
    }

    if(invalidEmail($email) !== false){
      header("location: ../profile/profile.php?error=invalidemail");
      exit();
    }

    if(pwdMatch($pwd,$repwd) !== false){
      header("location: ../profile/profile.php?error=pwddontmatch");
      exit();
    }

    updateUserDataProfile($conn, $usersId, $name, $email, $phone,  $pwd);


  }
  else {
    header("location: ../profile/profile.php");
    exit();
  }