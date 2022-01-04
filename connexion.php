<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/inscription.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Login"/>
        <input type="password" name="password" placeholder="Mot de passe"/>
        <button type="submit" name="connexion">Connexion</button>
        <p class="message">Vous n'avez pas de compte? <a class="aa" href="inscription.php">Creez un compte</a></p>
    </form>
    </main>
    <?php require ('footer.php');?>
</body>
</html>
<?php
if(isset($_POST['connexion'])){
    $User->connect($_POST['login'],$_POST['password']);
}
if(isset($_SESSION['user']['login'])){
    $User->isntConnected();
}
?>