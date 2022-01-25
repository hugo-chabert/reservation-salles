<?php

require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../database/Database.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Planning.php');
require_once(__DIR__ . '/../model/Planning_model.php');
session_start();


$planning = new Planning();
$resultat = $planning->planning();
if(isset($_GET['week']) && !empty($_GET['week'])){
    $currentPage = (int) strip_tags($_GET['week']);
    if(isset($_POST['moins'])){
        $currentPage--;
        if($currentPage == 0){
            $currentPage = 1;
            header('Location: planning.php?week='.$currentPage);
            exit();
        }
        else{
            header('Location: planning.php?week='.$currentPage);
            exit();
        }
    }
    if(isset($_POST['plus'])){
        $currentPage++;
        header('Location: planning.php?week='.$currentPage);
        exit();
    }
}
else{
    $currentPage = date('W');
    header('Location: planning.php?week='.$currentPage);
    exit();
}
$week_start = new DateTime();
$week_start->setISODate(2022,$currentPage);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/planning.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Planning</title>
</head>

    <body>
        <?php require('header_spe.php'); ?>
    <main>
        <p>
            Semaine du Lundi <?php echo $week_start->format('d/m/Y')?>
        </p>
        <form action="" method="post" class="pagination">
            <button class='button' type="submit" name="moins">-</button>
            <button class='button' type="submit" name="plus">+</button>
        </form>
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
                $heure = 8;
                $heure2 = $heure+1;
                while ($heure < 19) {
                    $jour = 1;
                    echo '<tr>';
                    while ($jour < 6) {
                        $userLogin = $heure;
                        foreach ($resultat as $Date) {
                            $value =  new DateTime($Date['debut']);
                            if (date_format($value, 'G') == $heure && date_format($value, 'N') == $jour && date_format($value, 'W') == $currentPage) {
                                $req = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id";
                                $stmt = Database::connect_db()->prepare($req);
                                $stmt->execute(array(
                                    ":id" => $Date['fk_id_utilisateur']
                                ));
                                $resultat2 = $stmt->fetchAll();
                                foreach($resultat2 as $user){
                                    $userLogin = $user['login'];
                                    $reservationTitre = $Date['titre'];
                                    $reservationId = $Date['id'];
                                    break;
                                }
                            }
                        }
                        if ($userLogin != $heure) {
                            echo '<td><a class="reservationTD" href=./reservation.php?id='.$reservationId.'>' .'Utilisateur : '.$userLogin .'</br>Titre : '. $reservationTitre . '</a></td>';
                        } else {
                            echo '<td>' . $heure .'-'. $heure2 . 'h</td>';
                        }
                        $jour++;
                    }
                    echo '</tr>';
                    $heure++;
                    $heure2++;
                }
                ?>
            </tbody>
        </table>
        <?php require_once(__DIR__ . '/gestion_erreur.php'); ?>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>