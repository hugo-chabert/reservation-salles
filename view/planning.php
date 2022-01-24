<?php

require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../database/Database.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Planning.php');
require_once(__DIR__ . '/../model/Planning_model.php');
session_start();


$currentPage = (int) strip_tags($_GET['week']);
$planning = new Planning();
$resultat = $planning->planning();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

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
                            if (date_format($value, 'G') == $i && date_format($value, 'N') == $j && date_format($value, 'W') == $currentPage) {
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