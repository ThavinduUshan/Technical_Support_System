<?php

  if(isset($_POST["submit"])){

    $name = $_POST["uname"];
    $email = $_POST["email"];
    $phone = $_POST["pnumber"];
    $pwd = $_POST["psw"];
    $repwd = $_POST["repsw"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSinup($name,$email,$phone,$pwd,$repwd) !== false){
      header("location: ../register/register.php?error=emptyinput");
      exit();
    }

    if(invaliduName($name) !== false){
      header("location: ../register/register.php?error=invaliduname");
      exit();
    }

    if(invalidEmail($email) !== false){
      header("location: ../register/register.php?error=invalidemail");
      exit();
    }

    if(pwdMatch($pwd,$repwd) !== false){
      header("location: ../register/register.php?error=pwddontmatch");
      exit();
    }

    if(unameExists($conn, $name, $email) !== false){
      header("location: ../register/register.php?error=unametaken");
      exit();
    }
    if($name == "admin"){
      createAdmin($conn, $name, $email, $pwd);
    }
    else{
      createUser($conn, $name, $email, $phone, $pwd);
    }

  }
  else {
    header("location: ../register/register.php");
    exit();
  }