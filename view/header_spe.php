<?php

require_once(__DIR__ . '/../controller/ReservationClass.php');

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
            <ul>
                <li> <a href="../index.php">Home</a> </li>
                <li> <a href="planning.php">Planning</a> </li>
                <?php if (isset($_SESSION['user'])) {
                    echo '<li> <a href="reservation-form.php">Reservations</a> </li>';
                } ?>
                <li> <a href="profil.php">Profil</a> </li>
                <?php if (Securite::estAdmin()) { ?>
                    <li> <a href="admin.php">admin</a> </li>
                <?php } ?>
            </ul>
            <?php
            if (!isset($_SESSION['user'])) {
                echo '
                <ul>
                    <li> <a href="connexion.php">Connexion</a> </li>
                    <li> <a href="inscription.php">Inscription</a> </li>
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