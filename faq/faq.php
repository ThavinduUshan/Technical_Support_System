<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Help</title>
  <link rel="stylesheet" href="style.css">
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
      <li><a href="faq.php">Help</a></li>
      <li><a href="../support/support.php">Facilities</a></li>
      <div id="logo">
        <a href="../index.php">
          <img src="logo-nav.png" width="50px">
        </a>
      </div>
    </ul>
  </nav>
  <div class="faq">
    <h1>Frequently Asked Questions</h1>
    <p>Here are some frequently asked questions of our users. Feeel free to go through the list and see whether you can find an answer for your questions from here!</p>
    <h3>Q: How can I install/upgrade Dummy Content?</h3>
    <p>You can either install Dummy Content by using the core extension manager available in the Joomla! Administrator Control Panel, or by using the powerful Regular Labs Extension Manager
      Note: When updating Dummy Content, you do not need to uninstall it first. The package will update all the files automatically.
      Keep in mind that when you update to a major new version (or uninstall first), you might lose some configuration settings</p>
      <h3>Q: How can I install/upgrade Dummy Content?</h3>
      <p>If you have problems installing Dummy Content, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension</p>
      <h3>Q: How can I uninstall Dummy Content?</h3>
      <p>You can either uninstall Dummy Content by using the core extension manager available in the Joomla! Administrator Control Panel, or by using the powerful Regular Labs Extension Manager.
        If you no longer use any Regular Labs extensions, you can also uninstall the Regular Labs Library plugin by using the Joomla! core extension manager.</p>
      <h3>Q: What are the minimum requirements?</h3>
      <p>Dummy Content will only work correctly if your setup meets these requirements:</p>
      <ul>
        <li>Up-to-date version of Joomla:</li>
        <li>PHP 5.6 or higher</li>
        <li>MySQL 5 or higher</li>
      </ul>
      <p>Important: I can only provide support for setups that:</p>
      <ul>
        <li>meet the above requirements;</li>
        <li>do not have extension files or Joomla! core files which have been altered in any way.</li>
      </ul>
      <h3>Q: Where can I download earlier versions?</h3>
      <p>You have access to all previous free versions of all extensions on this website.
        If you have a subscription to an extension, you can also download any previous pro version of that extension.
        If you do not have a valid subscription, you can download any pro version that is older than 1 year
        You can find old versions in the changelog.
        Note: Please note that I am unable to provide support on old versions! (whether you have a subscription or not).</p>
        <h2>Still I cannot find an answer to my question</h2>
        <p>If you still can't resolve your issue,For more specific questions and feedbacks, Please send us a support ticket and Our technician will get back you as soon as possible.</p>
        <?php
        if(isset($_SESSION["usersId"])){
          echo "<button><a href='../support/supportticket.php'>Support ticket</a></button>";
          
        }
        else{
          echo "<button><a href='../login/login.php'>Support ticket</a></button>";  
        }
        ?>
      </div>
  </body>
</html>