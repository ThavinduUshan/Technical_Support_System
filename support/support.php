<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Facilities</title>
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
      <li><a href="../support/support.php">Facilities</a></li>
      <div id="logo">
        <a href="../index.php">
          <img src="logo-nav.png" width="50px">
        </a>
    </ul>
  </nav>
  <div class="help">
    <h1>Welcome to your tech support system!</h1>
    <p>Here we are providing you the best and all facilities to solve your problem.
      you can first go through the frequently asked questions page and see whether the 
      answer for your problem is there or not. If it isn't, you can send us a support 
      ticket describing your issue. But in order to do that first you have to create an account
      in our system or login to the exisiting account as we need some of your information to assist you properly.</p>
    <p> In below sections we have list down our facilites and expalin them breifly so that you can get a good understatnding
    about them. If you have any questions feel free to contact us, we are always here to assist you!</p>

    <h2>Frequently Asked questions</h2>
    <p>In here we have list down the basic errors such as basic installation errors, how to upgrade, 
      minimum requirements for use and many more errors you get and answers for them. Here we describe
      the answers step by step and very clearly so that you can get a good understading about them.
      <b>Please kindly check the frequently asked questions before sending us support ticket because 
      it will help us a lot in managing and resolving your problems.</b>You can click below button
      to go the frequently asked questions.</p>
      <button type="submit" name="faq" id="faq"><a href="../faq/faq.php">Frequently asked questions</a></button>
      <h2>Support Ticket System</h2>
    <p>You go through the frequently asked questions and still you can't find a solution for 
      your problem, please send us a support ticket describing your issue. Our admin team is always
      here to assist and you and solve your problem as soon as possible. You can send us a support ticket by 
      clicking the below button. But first you have to create an account or login to the existing account.
    </p>
    <?php
        if(isset($_SESSION["usersId"])){
          echo "<button><a href='supportticket.php'>Support ticket</a></button>";
          
        }
      else{
        echo "<button><a href='../login/login.php'>Support ticket</a></button>";  
      }
    ?>
    </div>
</body>
</html>