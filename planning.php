<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Planning</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
    <table>
        <thead>
            <tr>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $Reservation->planning();
    ?>
        </tbody>
    </table>
    </main>
    <?php require ('footer.php');?>
</body>
</html>