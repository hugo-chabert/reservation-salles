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
                <th></th>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
            </tr>
        </thead>
        <tbody>
            
    <?php
    $Reservation->planning(date('W'));
    ?>
        </tbody>
    </table>
    </main>
    <?php require ('footer.php');?>
</body>
</html>