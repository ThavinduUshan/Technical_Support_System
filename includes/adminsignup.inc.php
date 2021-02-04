<?php

  if(isset($_POST["submit"])){

    $name = $_POST["uname"];
    $email = $_POST["email"];
    $pwd = $_POST["psw"];
    $repwd = $_POST["repsw"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputAdminSignup($name,$email,$pwd,$repwd) !== false){
      header("location: ../admin/register.php?error=emptyinput");
      exit();
    }

    if(invaliduName($name) !== false){
      header("location: ../admin/register.php?error=invaliduname");
      exit();
    }

    if(invalidEmail($email) !== false){
      header("location: ../admin/register.php?error=invalidemail");
      exit();
    }

    if(pwdMatch($pwd,$repwd) !== false){
      header("location: ../admin/register.php?error=pwddontmatch");
      exit();
    }

    if(adminnameExists($conn, $name, $email) !== false){
      header("location: ../admin/register.php?error=unametaken");
      exit();
    }

    createAdmin($conn, $name, $email, $pwd);


  }
  else {
    header("location: ../admin/register.php");
    exit();
  }