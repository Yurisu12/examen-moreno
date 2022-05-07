<?php
include_once 'header.php';
?>
<head>
    <meta charset="UTF-8">
  
    <title>reserveren</title>
    <div name="nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-page.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" href="medewerker-login.php">LOGIN</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</head>
<br><br>
<section class="signup-form">
        <h2>Sign Up</h1>
        <form action="includes/signup.inc.php" method= "post">
            <input type="text" name="name" placeholder="Full name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdrepeat" placeholder="Repeat Password">
            <button type= "submit" name= submit>Sign Up</button>
        </form>
        <?php
    if (isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
      echo "<p>Fill in all fields</p>";
      }
      else if($_GET["error"] == "invaliduid"){
      echo "<p>Choose a normale username</p>";
      }
      else if($_GET["error"] == "invalidemail"){
      echo "<p>Choose a normale email</p>";
      }
      else if($_GET["error"] == "notcorrect"){
      echo "<p>Password doesn't match</p>";
      }
      else if($_GET["error"] == "usernameexist"){
      echo "<p>Username already exist</p>";
      }
      else if($_GET["error"] == "stmtfailed"){
      echo "<p>something went wrong, try again</p>";
      }
      else if($_GET["error"] == "none"){
      echo "<p>you signed in</p>";
      }
    }
    ?>
    </section>

   