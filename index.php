<?php
session_start();
require_once(__DIR__ . '/controller/Securite.php');
require_once(__DIR__ . '/controller/User.php');
require_once(__DIR__ . '/database/Database.php');
require_once(__DIR__ . '/controller/Toolbox.php');
require_once(__DIR__ . '/controller/ReservationClass.php');
require_once(__DIR__ . '/model/Reservation_model.php');

if (isset($_SESSION['user'])) {
    $id_session = $_SESSION['user']['id'];

    $_SESSION['objet_utilisateur'] = new User($id_session);

    $_SESSION['objet_reservation'] = new ReservationClass($id_session);
}
var_dump($_SESSION['user']);
var_dump($_SESSION['objet_reservation']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Accueil</title>
</head>

<body>
    <?php require('./view/header.php'); ?>
    <main>
        <div class="container">
            <?php require_once(__DIR__ . '/view/gestion_erreur.php'); ?>
            <div class="pic-ctn">
                <img src="https://picsum.photos/200/300?t=1" alt="" class="pic">
                <img src="https://picsum.photos/200/300?t=2" alt="" class="pic">
                <img src="https://picsum.photos/200/300?t=3" alt="" class="pic">
                <img src="https://picsum.photos/200/300?t=4" alt="" class="pic">
                <img src="https://picsum.photos/200/300?t=5" alt="" class="pic">
            </div>
        </div>
    </main>
    <?php require('./view/footer.php'); ?>
</body>

</html>