<?php

require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../database/Database.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/ReservationClass.php');
session_start();


if (isset($_POST['reserver'])) {
    if (!empty($_POST['title']) && !empty($_POST['desc'])) {
        $datetime = new DateTime($_POST['datetime']);
        $datetime->setTime($_POST['horaires'], 0);
        $datetimeEnd = new DateTime($_POST['datetime']);
        $datetimeEnd->setTime($_POST['horaires'], 0);
        $datetimeEnd->add(new DateInterval('P0Y0M0DT1H0M0S'));
        $datetime = $datetime->format('Y-m-d H:i');
        $datetimeEnd = $datetimeEnd->format('Y-m-d H:i');
        $_SESSION['objet_reservation']->create($_POST['title'], $_POST['desc'], $datetime, $datetimeEnd);
    } else {
        Toolbox::ajouterMessageAlerte("Remplir tous les champs.", Toolbox::COULEUR_ROUGE);
    }
}


if (!Securite::estConnecte()) {
    header('Location:../index.php');
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Reservation Salle</title>
</head>

<body>
    <?php require('header_spe.php'); ?>
    <main>
        <div class="container_profil">

            <form action="" method="post">
                <p>Reservez une salle dès maintenant &#128197; </p>
                <input class="input-form" type="text" name="title" placeholder="Titre" />
                <input class="input-form" type="text" name="desc" placeholder="Description" />
                <input class="input-form" type="date" name="datetime" />
                <select class="input-form" name="horaires" size="1">
                    <option value="8">8h - 9h
                    <option value="9">9h - 10h
                    <option value="10">10h - 11h
                    <option value="11">11h - 12h
                    <option value="12">12h - 13h
                    <option value="13">13h - 14h
                    <option value="14">14h - 15h
                    <option value="15">15h - 16h
                    <option value="16">16h - 17h
                    <option value="17">17h - 18h
                    <option value="18">18h - 19h
                </select>
                <button class="button" type="submit" name="reserver">Reserver</button>

            </form>
        </div>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>