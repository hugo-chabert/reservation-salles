<?php

require_once(__DIR__ . '/../controller/ReservationClass.php');

if (isset($_POST['deconnexion'])) {
    $User->disconnect();
}
?>

<header>
    <nav>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo" width="60px"></a>
        </div>
        <div class="menu">
            <ul>
                <li> <a href="./index.php">Home</a> </li>
                <li> <a href="./view/planning.php">Planning</a> </li>
                <?php if (isset($_SESSION['user'])) {
                    echo '<li> <a href="./view/reservation-form.php">Reservations</a> </li>';
                } ?>
                <li> <a href="./view/profil.php">Profil</a> </li>
            </ul>
            <?php
            if (!isset($_SESSION['user'])) {
                echo '
                <ul>
                    <li> <a href="./view/connexion.php">Connexion</a> </li>
                    <li> <a href="./view/inscription.php">Inscription</a> </li>
                </ul>';
            } else {
                echo '
                <form action="" method="post">
                    <button class = "deco" type = "submit" name = "deconnexion" value ="Deconnexion">Déconnexion</buttton>
                </form>';
            }
            ?>
        </div>
    </nav>
</header>