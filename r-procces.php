<?php
include_once 'header.php';

$mysqli = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($mysqli));

$klant_id = 0;
$update = false;
$checkin = "";
$checkout = "";
$name = "";
$adres = "";
$plaats = "";
$postcode = "";
$telefoon = "";

if (isset($_POST["submit"])) {

    // Hier hal ik de data van r-klant.php.
    $checkin = $_POST["startid"];
    $checkout = $_POST["endid"];
    $name = $_POST["naam"];
    $adres = $_POST["adres"];
    $plaats = $_POST["plaats"];
    $postcode = $_POST["postcode"];
    $telefoon = $_POST["telefoon"];

    $mysqli->query("INSERT INTO klanten (r_periode_in, r_periode_out, naam, adres, plaats, postcode, telefoon) VALUES('$checkin', '$checkout', '$name', '$adres', '$plaats', '$postcode', '$telefoon')") or die($mysqli->error);

    $_SESSION['message'] = "Record is opgeslagen!";
    $_SESSION['msg_type'] = "success";

    header("location: medewerker-login.php");
}
//delete knop functie
if (isset($_GET['delete'])) {
    $klant_id = $_GET['delete'];
    $mysqli->query("DELETE FROM klanten WHERE klant_id=$klant_id") or die($mysqli->error());

    $_SESSION['message'] = "Record is verwijderd!";
    $_SESSION['msg_type'] = "danger";

    header("location: medewerker-login.php");
}

//edit data functie
if (isset($_GET['edit'])) {
    $klant_id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM klanten WHERE klant_id=$klant_id") or die($mysqli->error());
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $checkin = $row['r_periode_in'];
        $checkout = $row['r_periode_out'];
        $name = $row['naam'];
        $adres = $row['adres'];
        $plaats = $row['plaats'];
        $postcode = $row['postcode'];
        $telefoon = $row['telefoon'];
    }
}

//update data functie
if (isset($_POST['update'])) {
    $klant_id = $_POST['klant_id'];
    $checkin = $_POST['r_periode_in'];
    $checkout = $_POST['r_periode_out'];
    $name = $_POST['naam'];
    $adres = $_POST['adres'];
    $plaats = $_POST['plaats'];
    $postcode = $_POST['postcode'];
    $telefoon = $_POST['telefoon'];

    $mysqli->query("UPDATE klanten SET r_periode_in='$checkin', r_periode_out='$checkout', naam='$name', adres='$adres', plaats='$plaats', postcode='$postcode', telefoon='$telefoon'  WHERE klant_id=$klant_id") or die($mysqli->error);

    $_SESSION['message'] = "Data is geupdate!";
    $_SESSION['msg_type'] = "warning";

    header("location: medewerker-login.php");
}


//excel export klant
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT * FROM klanten";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
   <thead>
   <tr>
       <th>Check In</th>
       <th>Check Out</th>
       <th>Kamer Nummer</th>
       <th>Naam</th>
       <th>Adres</th>
       <th>Plaats</th>
       <th>Postcode</th>
       <th>Telefoon</th>
   </tr>
   </thead>
  ';
        $row = $result->fetch_assoc(); {
            $output .= '
   <tr>
   <td>' . $row['r_periode_in'] . '</td>
   <td>' . $row['r_periode_out'] . '</td>
   <td>' . $row['klant_id'] . '</td>
   <td>' . $row['naam'] . '</td>
   <td>' . $row['adres'] . '</td>
   <td>' . $row['plaats'] . '</td>
   <td>' . $row['postcode'] . '</td>
   <td>' . $row['telefoon'] . '</td>
   </tr>      
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Reservering.xls');
        echo $output;
    }
}

//excel export medewerker
$output = '';
if (isset($_POST["export1"])) {
    $query = "SELECT * FROM klanten";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
   <thead>
   <tr>
       <th>Check In</th>
       <th>Check Out</th>
       <th>Kamer Nummer</th>
       <th>Naam</th>
       <th>Adres</th>
       <th>Plaats</th>
       <th>Postcode</th>
       <th>Telefoon</th>
   </tr>
   </thead>
  ';
        while ($row = $result->fetch_assoc()); {
            $output .= '
   <tr>
   <td>' . $row['r_periode_in'] . '</td>
   <td>' . $row['r_periode_out'] . '</td>
   <td>' . $row['klant_id'] . '</td>
   <td>' . $row['naam'] . '</td>
   <td>' . $row['adres'] . '</td>
   <td>' . $row['plaats'] . '</td>
   <td>' . $row['postcode'] . '</td>
   <td>' . $row['telefoon'] . '</td>
   </tr>      
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Reservering Lijst.xls');
        echo $output;
    }
}
