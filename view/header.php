<?php
require_once(__DIR__ . '/../controller/ReservationClass.php');
require_once(__DIR__ . '/../controller/User.php');

if (isset($_POST['deconnexion'])) {
    $_SESSION['objet_utilisateur']->deconnexion();
}
?>

<header>
    <nav>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo" width="60px"></a>
        </div>
        <div class="menu">
            <ul class='ul-menu-1'>
                <li> <a href="./index.php">Home</a> </li>
                <li> <a href="./view/planning.php">Planning</a> </li>
                <?php if (isset($_SESSION['user'])) { ?>
                    <li> <a href="./view/reservation-form.php">Reservations</a> </li>;
                    <li> <a href="./view/profil.php">Profil</a> </li>
                    <li> <a href="./view/deconnexion.php">Deconnexion</a> </li>
                <?php  } ?>
                <?php if (isset($_SESSION['user']['id_droits'])) { ?>
                    <li> <a href="./view/admin.php">Admin</a> </li>
                <?php } ?>
            </ul>
            <?php
            if (!isset($_SESSION['user'])) { ?>

                <ul class="ul-menu-2">
                    <li> <a href="./view/connexion.php">Connexion</a> </li>
                    <li> <a href="./view/inscription.php">Inscription</a> </li>
                </ul>
            <?php } ?>
        </div>
    </nav>
</header>