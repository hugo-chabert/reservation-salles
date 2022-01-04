<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/inscription.css" rel="stylesheet">
    <title>Inscription</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Login"/>
        <input type="password" name="password" placeholder="Mot de passe"/>
        <input type="password" name="Cpassword" placeholder="Confirmez le mot de passe"/>
        <button type="submit" name="inscription">Creer un compte</button>
        <p class="message">Vous avez déjà un compte ? <a class="aa" href="connexion.php">Connectez vous</a></p>
    </form>
    </main>
    <?php require ('footer.php');?>
</body>
</html>
<?php
if(isset($_POST['inscription'])){
    $User->register($_POST['login'],$_POST['password'],$_POST['Cpassword']);
}
if(isset($_SESSION['user']['login'])){
    $User->isntConnected();
}
?>