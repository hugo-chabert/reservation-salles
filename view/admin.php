<?php
require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../database/Database.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/ReservationClass.php');
require_once(__DIR__ . '/../model/Reservation_model.php');

session_start();
ob_start();

if (isset($_POST['Delete'])) {
    $User->deleteUserAsAdmin($_POST['ID']);
}

if (isset($_POST['DeleteR'])) {
    $_SESSION['objet_reservation']->delete($_POST['IDR']);
}

ob_end_flush();
/* $User->display_all_users(); */
$resultat = $_SESSION['objet_reservation']->display_all_reserv();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
</head>

<body>
    <?php require('header.php'); ?>
    <main>

        <form action="" method="post">
            <input type="text" name="ID" placeholder="Entrez l'ID" />
            <button type="submit" name="Delete">Supprimer l'utilisateur</button>
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
                foreach ($resultat as $value) { ?>
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
            <input type="text" name="IDR" placeholder="Entrez l'ID" />
            <button type="submit" name="DeleteR">Supprimer la reservation</button>
        </form>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>