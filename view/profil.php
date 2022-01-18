<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/inscription.css" rel="stylesheet">
    <title>Profil</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
    <form action="" method = "POST" class="decoButton">
        <button class = "deco2" type = "submit" name = "deconnexion" value ="Deconnexion">DECONNEXION</button>
    </form>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Nouveau Login"/>
        <button type="submit" name="changeLogin">Changer le Login</button>
    </form>
    <form action="" method="post">
        <input type="password" name="password" placeholder="Ancien mot de passe"/>
        <input type="password" name="Npassword" placeholder="Nouveau mot de passe"/>
        <input type="password" name="CNpassword" placeholder="Confirmez le nouveau mot de passe"/>
        <button type="submit" name="changePassword">Changer le mot de passe</button>
    </form>
    </main>
    <?php require ('footer.php');?>
</body>
</html>
<?php
if(!isset($_SESSION['user']['login'])){
    $User->isConnected();
}
if(isset($_POST['changeLogin'])){
    $User->updateLogin($_POST['login']);
}
if(isset($_POST['changePassword'])){
    $User->updatePassword($_POST['password'], $_POST['Npassword'], $_POST['CNpassword']);
}
?>