<?php
require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../database/Database.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/ReservationClass.php');
require_once(__DIR__ . '/../model/Reservation_model.php');

session_start();
ob_start();

if (isset($_POST['Delete_user'])) {
    $_SESSION['objet_utilisateur']->delete_user_as_admin($_POST['id_user']);
}

if (isset($_POST['Delete_reservation'])) {
    $_SESSION['objet_reservation']->delete($_POST['id_reservation']);
}

if (!Securite::estConnecte() && !Securite::estAdmin()) {
    header('Location:../index.php');
}

ob_end_flush();
/* $User->display_all_users(); */
$resultat_reservations = $_SESSION['objet_reservation']->display_all_reserv_admin();
$resultat_all_user = $_SESSION['objet_utilisateur']->info_all_user();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <?php require('header_spe.php'); ?>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>login</th>
                    <th>email</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultat_all_user as $value) { ?>
                    <tr>
                        <td> <?= $value['id_utilisateur'] ?> </td>
                        <td> <?= $value['login'] ?></td>
                        <td> <?= $value['email'] ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

        <form action="" method="post">
            <input type="text" name="id_user" placeholder="Entrez l'ID" />
            <button type="submit" name="Delete_user">Supprimer l'utilisateur</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Heure de début</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultat_reservations as $value) { ?>
                    <tr>
                        <td> <?= $value['id'] ?> </td>
                        <td> <?= $value['titre'] ?></td>
                        <td> <?= $value['debut'] ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
        <form action="" method="post">
            <input type="text" name="id_reservation" placeholder="Entrez l'ID" />
            <button type="submit" name="Delete_reservation">Supprimer la reservation</button>
            <?php require_once(__DIR__ . '/gestion_erreur.php'); ?>
        </form>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>