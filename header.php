<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>
<title>Home</title>
     <nav>   
        <div class="wrapper">
            <a href="index.php"><img src="img\logo.png" width="120" height="80">
            <<ul class="navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="r-klant.php">reserveren</a></li>
                <?php 
                if (isset($_SESSION["useruid"])) {
                    echo "<li><a href='logout.inc.php'>Log in</a></li>";
                }
                else {
                    echo "<li><a href='login.php'>Log in</a></li>";
                    echo "<li><a href='signup.php'>sign in</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav> 
