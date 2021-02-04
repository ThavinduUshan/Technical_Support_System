<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
</head>
<body>
  <?php
    echo "<h1>Hello " . $_SESSION ["usersName"]  . "</h1>"
  ?>
  <section>
      <form name="supform" action="../includes/support.inc.php" method="post">
        <label>Subject</label></br>
        <input type="text" name = "subject" id = subject placeholder="subject"></br></br>
        <label>Describe issue</label></br>
        <textarea name="description" rows="20" cols="75">please descrbe your issue here</textarea></br></br>
        <select name="status">
          <option selected="selected">Pending</option>
          <option disabled>Solved</option>
        </select></br></br>
        <button type="submit" name="submit">Send</button>
      </form>
  </section>
  <?php
    if(isset($_GET["error"])) {
      if($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all feilds!</p>";
      }
      else if($_GET["error"] == "stmtfailed"){
        echo "<p>Something went wrong!</p>";
      }
      else if($_GET["error"] == "none"){
        echo "<p>Message Sent!</p>";
      }
    }
  ?>
</body>
</html>