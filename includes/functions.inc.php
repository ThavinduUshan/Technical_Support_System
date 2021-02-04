<?php

  function emptyInputSinup($name,$email,$phone,$pwd,$repwd) {
    $result;
    if(empty($name) || empty($email) || empty($phone) || empty($pwd) || empty($repwd)) {
        $result = true;
    }
    else{
      $result = false;
    }
    return $result;
  }

  function invaliduName($name) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
      $result= true;
    }
    else{
      $result = false;
    }
    return $result;
  }

  function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $result= true;
    }
    else{
      $result = false;
    }
    return $result;
    
  }

  function invalidPwd($pwd) {
    $result;
    if(strlen($pwd) > 6){
      $result= true;
    }
    else{
      $result = false;
    }
    return $result;
    
  }

  function pwdMatch($pwd,$repwd) {
    $result;
    if($pwd !== $repwd){
      $result= true;
    }
    else{
      $result = false;
    }
    return $result;
  }

  function unameExists($conn, $name,$email) {
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../register/register.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "ss",$name,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
      $result = false;
      return $result;
    }

    mysqli_stmt_close($stmt);
    
  }  
    function createUser($conn, $name, $email, $phone, $pwd){
      $sql = "INSERT INTO users (usersName, usersEmail, usersPhone, usersPwd) VALUES (?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register/register.php?error=stmtfailed");
        exit();
      }

      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  
      mysqli_stmt_bind_param($stmt, "ssss",$name,$email,$phone,$hashedPwd);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../register/register.php?error=none");
      exit();
    } 
    
    function emptyInputLogin($name,$pwd) {
      $result;
      if(empty($name)  || empty($pwd)) {
          $result = true;
      }
      else{
        $result = false;
      }
      return $result;
    }

    function loginUser($conn,$name,$pwd){
      $unameExists = unameExists($conn, $name, $name);

      if($unameExists === false){
        header("location:../login/login.php?error=invalidlogin");
        exit();
      }

      $pwdHashed = $unameExists["usersPwd"];
      $checkPwd = password_verify($pwd, $pwdHashed);

      if($checkPwd === false){
        header("location:../login/login.php?error=wrongpassword");
        exit();
      }
      else if($checkPwd === true) {
        session_start();
        $_SESSION["usersId"] = $unameExists["usersId"];
        $_SESSION["usersName"] = $unameExists["usersName"];
        header("location:../index.php");
        exit();
      }  
    }

    function emptyInputAdminSignup($name,$email,$pwd,$repwd) {
      $result;
      if(empty($name) || empty($email) || empty($pwd) || empty($repwd)) {
          $result = true;
      }
      else{
        $result = false;
      }
      return $result;
    }

    function adminnameExists($conn, $name,$email) {
      $sql = "SELECT * FROM admins WHERE adminName = ? OR adminEmail = ?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/register.php?error=stmtfailed");
        exit();
      }
  
      mysqli_stmt_bind_param($stmt, "ss",$name,$email);
      mysqli_stmt_execute($stmt);
  
      $resultData = mysqli_stmt_get_result($stmt);
  
      if($row = mysqli_fetch_assoc($resultData)) {
          return $row;
      }
      else {
        $result = false;
        return $result;
      }
  
      mysqli_stmt_close($stmt);
      
    }  

    function createAdmin($conn, $name, $email, $pwd){
      $sql = "INSERT INTO admins (adminName, adminEmail, adminPwd) VALUES (?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/register.php?error=stmtfailed");
        exit();
      }

      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  
      mysqli_stmt_bind_param($stmt, "sss",$name,$email,$hashedPwd);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../admin/register.php?error=none");
      exit();
    }

    function emptyInputAdminLogin($name,$pwd) {
      $result;
      if(empty($name)  || empty($pwd)) {
          $result = true;
      }
      else{
        $result = false;
      }
      return $result;
    }

    function loginAdmin($conn,$name,$pwd){
      $adminnameExists = adminnameExists($conn, $name, $name);

      if($unameExists === false){
        header("location:../admin/login.php?error=invalidlogin");
        exit();
      }

      $pwdHashed = $adminnameExists["adminPwd"];
      $checkPwd = password_verify($pwd, $pwdHashed);

      if($checkPwd === false){
        header("location:../admin/login.php?error=wrongpassword");
        exit();
      }
      else if($checkPwd === true) {
        session_start();
        $_SESSION["adminId"] = $adminnameExists["adminId"];
        $_SESSION["adminName"] = $adminnameExists["adminName"];
        header("location:../admin/panel/admin.php");
        exit();
      }  
    }

    function emptyInputSupport($title,$des) {
      $result;
      if(empty($title)  || empty($des)) {
          $result = true;
      }
      else{
        $result = false;
      }
      return $result;
    }

    function submitIssue($conn,$usersId,$title,$des,$status){
      $sql = "INSERT INTO issues (usersId ,title, description, status) VALUES (?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../support/supportticket.php?error=stmtfailed");
        exit();
      }
  
      mysqli_stmt_bind_param($stmt, "ssss",$usersId,$title,$des,$status);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../support/supportticket.php?error=none");
      exit();
    }

    function addUser($conn, $name, $email, $phone, $pwd){
      $sql = "INSERT INTO users (usersName, usersEmail, usersPhone, usersPwd) VALUES (?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/panel/adduser.php?error=stmtfailed");
        exit();
      }

      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  
      mysqli_stmt_bind_param($stmt, "ssss",$name,$email,$phone,$hashedPwd);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../admin/panel/adduser.php?error=none");
      exit();
    } 

    function getUserData($conn){
      $sql = "SELECT usersId, usersName, usersEmail, usersPhone FROM users";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){
          return $result;
      }else{
        header("location:../admin/panel/viewuser.php?error=notworking");
        exit();
      }
    }

    function updateGet($conn){
      if(isset($_GET['usersId']) && is_numeric($_GET['usersId'])){
        $usersId = $_GET['usersId'];
        $sql = "SELECT usersId, usersName, usersEmail, usersPhone FROM users WHERE usersId='$usersId';";
        $get_usersId = mysqli_query($conn, $sql);

        if(mysqli_num_rows($get_usersId) == 1){
          $row = mysqli_fetch_assoc($get_usersId);
          return($row);
        }
      }
    }

    function emptyInputUpdate($name,$email,$phone) {
      $result;
      if(empty($name) || empty($email) || empty($phone)) {
          $result = true;
      }
      else{
        $result = false;
      }
      return $result;
    }

    
    function updateUserData($conn, $usersId, $name, $email, $phone){
      $sql = "UPDATE users SET usersName='$name', usersEmail='$email', usersPhone='$phone' WHERE usersId='$usersId';";
      $update_query = mysqli_query($conn, $sql);

      if($update_query){
        header("location:../admin/panel/viewuser.php?error=none");
        exit();
      }else{
        header("location:../admin/panel/viewuser.php?error=cantupdate");
        exit();
      }
    }

    function deleteUser($conn){
      if(isset($_GET['usersId']) && is_numeric($_GET['usersId'])){

        $usersId=$_GET['usersId'];
        $sql = "DELETE FROM users WHERE usersId='$usersId';";
        $delete_user = mysqli_query($conn,$sql);

        if($delete_user){
          header("location:../panel/viewuser.php?error=deleted");
          exit();
        }else{
          header("location:../panel/viewuser.php?error=cantdelete");
          exit();
        }
      }
    }

    function getIssueData($conn){
      $sql = "SELECT issues.*, users.UsersId, users.usersName, users.usersEmail, users.usersPhone FROM issues INNER JOIN users ON issues.UsersId = users.UsersId;";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){
          return $result;
      }else{
        header("location:../admin/panel/viewissue.php?error=notworking");
        exit();
      }
    }

    function issueGet($conn){
      if(isset($_GET['issuesId']) && is_numeric($_GET['issuesId'])){
        $issuesId = $_GET['issuesId'];
        $sql = "SELECT usersId, issuesId, title, description, status FROM issues WHERE issuesId='$issuesId';";
        $get_issuesId = mysqli_query($conn, $sql);

        if(mysqli_num_rows($get_issuesId) == 1){
          $row = mysqli_fetch_assoc($get_issuesId);
          return($row);
        }
      }
    }

    function updateissueData($conn, $usersId, $issuesId, $title, $des, $status){
      $sql = "UPDATE issues SET usersId='$usersId', issuesId='$issuesId', title='$title', description='$des', status='$status' WHERE issuesId='$issuesId';";
      $update_query = mysqli_query($conn, $sql);

      if($update_query){
        header("location:../admin/panel/viewissue.php?error=none");
        exit();
      }else{
        header("location:../admin/panel/viewissue.php?error=cantupdate");
        exit();
      }
    }


    function deleteIssue($conn){
      if(isset($_GET['issuesId']) && is_numeric($_GET['issuesId'])){
        $issuesId = $_GET['issuesId'];
        $sql = "DELETE FROM issues WHERE issuesId='$issuesId';";

        $delete_issue = mysqli_query($conn, $sql);

        if($delete_issue){
          header("location:../panel/viewissue.php?error=deleted");
          exit();
        }else{
          header("location:../panel/viewissue.php?error=cantdelete");
          exit();
        }
      }
      
    }

    function yourIssues($conn,$usersId){
      $sql = "SELECT issuesId, title, description, status FROM issues WHERE usersId='$usersId'ORDER BY issuesId DESC;";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){
          return $result;
      }else{
        header("location:../support/supportticketfirst.php");
        exit();
      }
    }

    function updateUserDataProfile($conn, $usersId, $name, $email, $phone,  $pwd){
      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
      $sql = "UPDATE users SET usersName='$name', usersEmail='$email', usersPhone='$phone', usersPwd='$hashedPwd' WHERE usersId='$usersId';";
      $update_query = mysqli_query($conn, $sql);

      if($update_query){
        header("location:../profile/profile.php?error=none");
        exit();
      }else{
        header("location:../profile/profile.php?error=cantupdate");
        exit();
      }
    }

    function deleteAccount($conn){
      if(isset($_GET['usersId']) && is_numeric($_GET['usersId'])){

        $usersId=$_GET['usersId'];
        $sql = "DELETE FROM users WHERE usersId='$usersId';";
        $delete_user = mysqli_query($conn,$sql);

        if($delete_user){
          header("location:../login/login.php?error=deleted");
          exit();
        }else{
          header("location:../login/login.php?error=cantdelete");
          exit();
        }
      }
    }

    function deleteIssueUser($conn){
      if(isset($_GET['issuesId']) && is_numeric($_GET['issuesId'])){
        $issuesId = $_GET['issuesId'];
        $sql = "DELETE FROM issues WHERE issuesId='$issuesId';";

        $delete_issue = mysqli_query($conn, $sql);

        if($delete_issue){
          header("location:../support/supportticket.php?error=deleted");
          exit();
        }else{
          header("location:../support/supportticket.php?error=cantdelete");
          exit();
        }
      }
      
    }

    