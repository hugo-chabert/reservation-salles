<?php
include ('User.php');
include ('ReservationClass.php');
?>
<link href="css/header.css" rel="stylesheet">
<header>
    <nav>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo" width="60px"></a>
        </div>
        <div class = "menu">
            <ul class ='ul-menu-1'>
                <li> <a href="index.php">Home</a> </li>
                <li> <a href="planning.php">Planning</a> </li>
                <?php if(isset($_SESSION['user'])){echo'<li> <a href="reservation-form.php">Reservations</a> </li>';}?>
                <li> <a href="profil.php">Profil</a> </li>
            </ul>
            <?php
            if(!isset($_SESSION['user'])){
                echo '
                <ul class ="ul-menu-2">
                    <li> <a href="connexion.php">Connexion</a> </li>
                    <li> <a href="inscription.php">Inscription</a> </li>
                </ul>';
            }
            else{
                echo '
                <form action="" method="post">
                    <button class = "deco" type = "submit" name = "deconnexion" value ="Deconnexion">Déconnexion</buttton>
                </form>';
            }
            ?>
        </div>
    </nav>
</header>
<?php
if(isset($_POST['deconnexion'])){
    $User->disconnect();
}
?>