<?php
include_once 'header.php';
require_once 'r-procces.php';
?>
<body>
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM klanten") or die($mysqli->error);
    //pre_r($result);
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
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
                <?php $row = $result->fetch_assoc(); ?>
                <tr>
                    <td><?php echo $row['r_periode_in']; ?></td>
                    <td><?php echo $row['r_periode_out']; ?></td>
                    <td><?php echo $row['klant_id']; ?></td>
                    <td><?php echo $row['naam']; ?></td>
                    <td><?php echo $row['adres']; ?></td>
                    <td><?php echo $row['plaats']; ?></td>
                    <td><?php echo $row['postcode']; ?></td>
                    <td><?php echo $row['telefoon']; ?></td>
                </tr>
            </table>
            <form action="r-procces.php" method="post">
                <div class="form-group col-md-2">
                    <input type='submit' name='export' value='Export to excel file' />
                </div>
            </form>
        </div>
        <br><br>
        <form action="r-procces.php" method="post">

            <div class="from-group row">
                <div class="form-group col-md-6">
                    <label>Check In</label>
                    <input type="date" name="startid" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Check Out</label>
                    <input type="date" name="endid" class="form-control">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Naam</label>
                <input type="text" class="form-control" name="naam">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Adres</label>
                    <input type="text" class="form-control" name="adres">
                </div>
                <div class="form-group col-md-4">
                    <label>Plaats</label>
                    <input type="text" class="form-control" name="plaats">
                </div>
                <div class="form-group col-md-2">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="postcode">
                </div>
                <div class="form-group col-md-2">
                    <label>Telefoon</label>
                    <input type="text" class="form-control" name="telefoon">
                </div>
            </div>
            <div class="form-group">
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Reserver</button>
            </div>
        </form>
    </div>
</body>

</html>