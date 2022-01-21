<?php

require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../database/Database.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/ReservationClass.php');
require_once(__DIR__ . '/../model/Reservation_model.php');
session_start();


$resultat = $_SESSION['objet_reservation']->planning();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <title>Planning</title>
</head>

<body>
    <?php require('header_spe.php'); ?>
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
        $i = 8;
        while ($i < 19) {
            $j = 1;
            echo '<tr>';
            while ($j < 6) {
                $k = $i;
                foreach ($resultat as $Date) {
                    $value =  new DateTime($Date['debut']);
                    if (date_format($value, 'G') == $i && date_format($value, 'N') == $j && date_format($value, 'W') == 3) {
                        $k = $Date['titre'];
                        break;
                    }
                }
                if ($k != $i) {
                    echo '<td>' . $k . '</td>';
                } else {
                    echo '<td>' . $i . 'h</td>';
                }
                $j++;
            }
            echo '</tr>';
            $i++;
        }
        ?>
            </tbody>
        </table>
        <?php require_once(__DIR__ . '/gestion_erreur.php'); ?>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>