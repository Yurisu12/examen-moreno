<?php
include_once 'header.php';
?>
<section class="signup-form">
        <h2>log in</h1>
        <form action="includes/login.inc.php" method= "post">
            <input type="text" name="uid" placeholder="Username/Email">
            <input type="password" name="pwd" placeholder="Password">
            <button type= "submit" name= submit>log in</button>
        </form>
        <?php
    if (isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
      echo "<p>Fill in all fields</p>";
      }
      else if($_GET["error"] == "wronglogin"){
      echo "<p>your infomation is wrong</p>";
      }
    }
    ?>
    </section>