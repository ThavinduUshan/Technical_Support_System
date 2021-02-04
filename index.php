<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Home</title>
</head>
<body>
  <nav>
    <ul>
    <?php
        if(isset($_SESSION["usersId"])){
          echo "<li><a href='./profile/profile.php'>Profile</a></li>";
          echo "<li><a href='./includes/logout.inc.php'>Log Out</a></li>";
        }
      else{
        echo "<li><a href='./login/login.php'>Login</a></li>";
        echo "<li><a href='./register/register.php'>Signup</a></li>";
      }
      ?>
      <li><a href="./faq/faq.php">Help</a></li>
      <li><a href="./support/support.php">Facilities</a></li>
      <div id="logo">
        <a href="#">
          <img src="logo-nav.png" width="50px">
        </a>
    </ul>
  </nav>
  <div class="main">
  <?php
        if(isset($_SESSION["usersId"])){
          echo "<h1>Hello ". $_SESSION["usersName"] ."!</h1>";
          
        }
      else{
        echo "<h1>Hello User!</h1>";
      }
      ?>
    <h2>Welcome to the Tech Support</h2></br>
    <p>Here we provide all the facilities you need to solve your technical problems. First go through the frequently asked questions section and see whether your problem is there!</p>
    <p>If you still can't resolve your issue! Send us a support ticket and Our technician will get back you as soon as possible.</p>
    <?php
        if(isset($_SESSION["usersId"])){
          echo "<button><a href='./support/supportticket.php'>Support ticket</a></button>";
          
        }
      else{
        echo "<button><a href='./login/login.php'>Support ticket</a></button>";  
      }
  ?>
  </div>
</body>
</html>