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
                <li class='li-menu-1'> <a href="index.php">Home</a> </li>
                <li class='li-menu-1'> <a href="planning.php">Planning</a> </li>
                <?php if(isset($_SESSION['user'])){echo'<li class="li-menu-1"> <a href="reservation-form.php">Reservations</a> </li>';}?>
                <?php if(isset($_SESSION['user'])){echo'<li class="li-menu-1"> <a href="my-res.php">Mes Reservations</a> </li>';}?>
                <li class='li-menu-1'> <a href="profil.php">Profil</a> </li>
                <?php if(!empty($_SESSION['user'])){if($_SESSION['user']['id_droits'] == '13'){echo ('<li class="li-menu-1"><a href="admin.php" class="linkHeader">Admin</a></li>');}} ?>
            </ul>
            <?php
            if(!isset($_SESSION['user'])){
                echo '
                <ul class ="ul-menu-2">
                    <li class="li-menu-2"> <a href="connexion.php">Connexion</a> </li>
                    <li class="li-menu-2"> <a href="inscription.php">Inscription</a> </li>
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