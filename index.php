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
    $email_session = $_SESSION['user']['email'];
    $password_session = $_SESSION['user']['password'];
    $_SESSION['objet_utilisateur'] = new User($email_session, $id_session, $password_session);

    $_SESSION['objet_reservation'] = new ReservationClass($id_session);
}
var_dump($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
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